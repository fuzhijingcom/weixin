<?php
namespace Home\Controller;
use Think\Controller;
define("TOKEN", "weixin");

$wechatObj = new wechatCallbackapiTest();
if (!isset($_GET['echostr'])) {
    $wechatObj->responseMsg();
}else{
    $wechatObj->valid();
}


class wechatCallbackapiTest
{
    //验证签名
    public function valid()
    {
        $echoStr = $_GET["echostr"];
        $signature = $_GET["signature"];
        $timestamp = $_GET["timestamp"];
        $nonce = $_GET["nonce"];
        $token = TOKEN;
        $tmpArr = array($token, $timestamp, $nonce);
        sort($tmpArr);
        $tmpStr = implode($tmpArr);
        $tmpStr = sha1($tmpStr);
        if($tmpStr == $signature){
            echo $echoStr;
            exit;
        }
    }
    //响应消息
    public function responseMsg()
    {
        $postStr = $GLOBALS["HTTP_RAW_POST_DATA"];
        if (!empty($postStr)){
            $this->logger("用户操作时间：".date('Y-m-d H:i:s')."\r接收内容：\n".$postStr);
            $postObj = simplexml_load_string($postStr, 'SimpleXMLElement', LIBXML_NOCDATA);
            $RX_TYPE = trim($postObj->MsgType);
             
            //消息类型分离
            switch ($RX_TYPE)
            {
                case "event":
                    $result = $this->receiveEvent($postObj);
                    break;
                case "text":
                    $result = $this->receiveText($postObj);
                    break;
                case "image":
                    $result = $this->receiveImage($postObj);
                    break;
                case "location":
                    $result = $this->receiveLocation($postObj);
                    break;
                case "voice":
                    $result = $this->receiveVoice($postObj);
                    break;
                case "video":
                    $result = $this->receiveVideo($postObj);
                    break;
                case "link":
                    $result = $this->receiveLink($postObj);
                    break;
                default:
                    $result = "unknown msg type: ".$RX_TYPE;
                    break;
            }
            $this->logger("回复内容：\n".$result."\n--------------------------------------");
            echo $result;
        }else {
            echo "";
            exit;
        }
    }
    //接收事件消息
    private function receiveEvent($object)
    {
        $content = "";
        switch ($object->Event)
        {
            case "subscribe":
                $content = "嗨！来了...
欢迎关注【驿源】";
                $content .= (!empty($object->EventKey))?("\n来自二维码场景 ".str_replace("qrscene_","",$object->EventKey)):"";
                break;
            case "unsubscribe":
                $content = "取消关注";
                break;
            case "SCAN":
                $content = "扫描场景 ".$object->EventKey;
                break;
            case "CLICK":
                switch ($object->EventKey)
                {
                    case "COMPANY":
                        $content = array();
                        $content[] = array("Title"=>"多图文1标题", "Description"=>"", "PicUrl"=>"http://discuz.comli.com/weixin/weather/icon/cartoon.jpg", "Url" =>"http://m.cnblogs.com/?u=txw1958");
                    break;
                 
                        
                   case "CISHU":
                            
                       $openid = $object->FromUserName;//获取微信号
                       $cishu = $this->get_cishu_by_openid($openid);
                       $access_token = $this->getToken();
                       
                       $openid_url = "https://api.weixin.qq.com/cgi-bin/user/info?access_token=".$access_token."&openid=".$openid;
                       $res = file_get_contents($openid_url); //获内容
                       $r = json_decode($res, true); //接受一个 JSON 格式的字符串并且把它转换为 PHP 变量
                       $nickname = $r['nickname'];

                      $content = "亲爱的（".$nickname."），你是第".$cishu."次点击";
                      break;
                            
                        
                    default:
                        $content = "点击菜单：".$object->EventKey;
                        break;
                }
                break;
            case "LOCATION":
                $content = "上传位置：纬度 ".$object->Latitude.";经度 ".$object->Longitude;
                break;
            case "VIEW":
                $content = "跳转链接 ".$object->EventKey;
                break;
            case "MASSSENDJOBFINISH":
                $content = "消息ID：".$object->MsgID."，结果：".$object->Status."，粉丝数：".$object->TotalCount."，过滤：".$object->FilterCount."，发送成功：".$object->SentCount."，发送失败：".$object->ErrorCount;
                break;
            default:
                $content = "receive a new event: ".$object->Event;
                break;
        }
        if(is_array($content)){
            if (isset($content[0])){
                $result = $this->transmitNews($object, $content);
            }else if (isset($content['MusicUrl'])){
                $result = $this->transmitMusic($object, $content);
            }
        }else{
            $result = $this->transmitText($object, $content);
        }
        return $result;
    }






    //接收文本消息
    private function receiveText($object)
    {
        $keyword = trim($object->Content);
        //多客服人工回复模式
        if (strstr($keyword, "这段内容是进入客服过滤词语")){
            $content = "进入客服？但是我是机器人啊";
        }
        else {
            //自动回复模式
            if (strstr($keyword, "符智精") ||strstr($keyword, "精") ||strstr($keyword, "精精") || strstr(strtolower($keyword), "superman"))
            {
                $content = "/:heart符智精/:heart
/:<O>是一个很帅的小伙子";
            }



            else if (strstr(strtolower($keyword), "一卡通") || strstr($keyword, "饭卡"))
            {
                $content = array();
                $content[] = array("Title"=>"一卡通百科", "Description"=>"", "PicUrl"=>"http://www.yudw.com/data/attachment/forum/201610/12/125354f9roopr2pp782r9p.jpg", "Url" =>"http://www.yudw.com/forum.php?mod=viewthread&tid=8821");
                $content[] = array("Title"=>"现金充值机操作指南", "Description"=>"", "PicUrl"=>"http://www.yudw.com/data/attachment/forum/201610/12/125354f9roopr2pp782r9p.jpg", "Url" =>"http://mp.weixin.qq.com/s?__biz=MjM5MTcyNzU3Ng==&mid=200954850&idx=6&sn=442329eb4e9cd2daef6143ce85319ca2#wechat_redirect");
                $content[] = array("Title"=>"【点我】进行网上校园卡挂失，转账，网上充值", "Description"=>"", "PicUrl"=>"http://www.yudw.com/data/attachment/forum/201610/12/125354f9roopr2pp782r9p.jpg", "Url" =>"http://ecard.gdqy.edu.cn/homeLogin.action");
                $content[] = array("Title"=>"一卡通充值的方式、时间说明", "Description"=>"", "PicUrl"=>"http://www.yudw.com/data/attachment/forum/201610/12/125354f9roopr2pp782r9p.jpg", "Url" =>"http://www.yudw.com/forum.php?mod=viewthread&tid=8822");
                $content[] = array("Title"=>"支付宝充值广轻一卡通教程 ", "Description"=>"", "PicUrl"=>"http://www.yudw.com/data/attachment/forum/201610/12/125354f9roopr2pp782r9p.jpg", "Url" =>"http://www.yudw.com/forum.php?mod=viewthread&tid=8823");


            }



            else if (strstr(strtolower($keyword), "图") || strstr($keyword, "图片"))
            {
                $content = array();
                $content[] = array("Title"=>"全站工程师首页",  "Description"=>"全端工程师首页---这是主人设计的网站", "PicUrl"=>"http://121.42.196.145/weixin/xxn.jpg", "Url" =>"http://www.yuyuhu.com/show/m/index.php");
            }else if (strstr(strtolower($keyword), "news") || strstr($keyword, "新闻"))
            {
                $content = array();
                $content[] = array("Title"=>"主人的站点", "Description"=>"", "PicUrl"=>"http://blog.79kg.com/front/front3.png", "Url" =>"http://site.79kg.com");
                $content[] = array("Title"=>"主人的博客", "Description"=>"", "PicUrl"=>"http://blog.79kg.com/front/front4.png", "Url" =>"http://blog.79kg.com");
                $content[] = array("Title"=>"主人的简介", "Description"=>"", "PicUrl"=>"http://blog.79kg.com/front/front2.png", "Url" =>"http://about.79kg.com");
            }else if (strstr(strtolower($keyword), "平凡之路"))
            {
                $content = array();
                $content = array("Title"=>"平凡之路", "Description"=>"歌手：朴树", "MusicUrl"=>"http://mp3hot.9ku.com/hot/2014/07-16/642431.mp3", "HQMusicUrl"=>"http://mp3hot.9ku.com/hot/2014/07-16/642431.mp3");
            }else if (strstr(strtolower($keyword), "杀阡陌"))
            {
                $content = array();
                $content = array("Title"=>"杀阡陌", "Description"=>"歌手：马健涛", "MusicUrl"=>"http://mp3tuijian.9ku.com/tuijian/2015/07-06/665486.mp3", "HQMusicUrl"=>"http://mp3tuijian.9ku.com/tuijian/2015/07-06/665486.mp3");
            }else if (strstr(strtolower($keyword), "小苹果"))
            {
                $content = array();
                $content = array("Title"=>"小苹果", "Description"=>"歌手：筷子兄弟", "MusicUrl"=>"http://mp3hot.9ku.com/hot/2014/05-29/637791.mp3", "HQMusicUrl"=>"http://mp3hot.9ku.com/hot/2014/05-29/637791.mp3");
            }else if(strstr($keyword, "您好") || strstr($keyword, "你好") || strstr($keyword, "在吗") || strstr($keyword, "谁"))
            {
                $content = "您好，我是小晶晶/:heart 当然您可以叫我 仙女姐姐 /::>,有什么可以为您效劳的.
";
            }
            else if(strstr($keyword, "音乐") || strstr($keyword, "来一首") || strstr($keyword, "music"))
            {
                $content = "请回复歌曲名称：【平凡之路】、【杀阡陌】、【小苹果】";
            }else if(strstr($keyword, "网络") || strstr($keyword, "网络152") || strstr($keyword, "152"))
            {
                $content = "网络152的口号是：
加油
加油
加油";
            }else if(strstr($keyword, "书籍"))
            {
                $content = "回复【开发】获取《微信公众平台开发实战》
回复【运营】获取《21本互联网运营书籍》
发送 【更多】 可以获得更多服务。";
            }


             

            else if(strstr($keyword, "下载"))
            {
                $content = "【不要停下来！八分音符酱！】（电脑版，无需安装，解压就能玩）

 下载链接：
http://pan.baidu.com/s/1gfIDJlL

密码：eqkb
                    ";
            }



            else if(strstr($keyword, "开发"))
            {
                $content = "《微信公众平台开发实战》   下载地址：
http://yunpan.cn/cLLbUjXBKYwCI  访问密码 e77f   （建议把地址复制到电脑上下载）
发送 【更多】 可以获得更多服务。
";
            }else if(strstr($keyword, "运营"))
            {
                $content = "21本互联网运营书籍，一次性送给你。
下载地址：
http://yunpan.cn/cF5MaWcVEZiLU
访问密码 43ed
（建议把地址复制到电脑上下载）
发送 【更多】 可以获得更多服务。
";
            }

            else if(strstr($keyword, "建议"))
            {
                $content = "
您的建议,我会虚心接受的,当然不接受,您也不能打我.
";
            }else if(strstr($keyword, "全端") || strstr($keyword, "全栈"))
            {
                $content = "
全端工程师？您可以去这个网站了解下 http://79kg.com.
";
            }else if(strstr($keyword, "/:"))
            {
                $content = "
您发送的是表情吗？我不理解人类的表情...您可以输入 【帮助】 来获取与我沟通的技巧.
";
            }else if(strstr($keyword, "微信") || strstr(strtolower($keyword), "qq"))
            {
                $content = "微信和QQ是一种聊天工具.";
            }else if(strstr($keyword, "笨") || strstr($keyword, "傻") || strstr($keyword, "呆") )
            {
                $content = "我是小仙女/:heart.人类才是笨蛋,傻瓜,呆子";
            }else if(strstr(strtolower($keyword), "sb") || strstr($keyword, "滚") || strstr($keyword, "妈的") )
            {
                $content = "好孩子都是不说脏话的,您应该向我学习.";
            }

            else{




                $openid = $object->FromUserName;//获取微信号

                //echo $openid;


                $openid_url = "https://api.weixin.qq.com/cgi-bin/user/info?access_token=".ACCESS_TOKEN."&openid=".$openid;
                $res = file_get_contents($openid_url); //获内容
                $r = json_decode($res, true); //接受一个 JSON 格式的字符串并且把它转换为 PHP 变量
                $nickname = $r['nickname'];
                	


                $headimgurl = $r['headimgurl'];






                $key=$object->Content;








                $wxid = $object->ToUserName;//获取微信号
                $msgid = $object->MsgId;//消息ID
                $time = date('Y-m-d');

                $verify = md5(md5($wxid).$msgid.$time);


                //  $OpenID = $object->FromUserName;
                //OPENID
                $content = array();
                $content[] = array("Title"=> $nickname."：点这里查看",  "Description"=>"亲爱的" .$nickname."，请注意别人隐私保护。（广轻APP查询系统）", "PicUrl"=>"$headimgurl", "Url" =>"http://heart.net.cn/qy/app.php?key=".$key."&verify=".$verify."&msgid=".$msgid."&time=".$time."&wxid=".$wxid );
            }

            if(is_array($content)){
                if (isset($content[0]['PicUrl'])){
                    $result = $this->transmitNews($object, $content);
                }else if (isset($content['MusicUrl'])){
                    $result = $this->transmitMusic($object, $content);
                }
            }else{
                $result = $this->transmitText($object, $content);
            }
        }
        return $result;
    }


    //接收图片消息
    private function receiveImage($object)
    {
        $content = array("MediaId"=>$object->MediaId);
        $result = $this->transmitImage($object, $content);
        return $result;
    }
    //接收位置消息
    private function receiveLocation($object)
    {
        $content = "哦！原来您在这！您发送的是位置，纬度为：".$object->Location_X."；经度为：".$object->Location_Y."；缩放级别为：".$object->Scale."；位置为：".$object->Label;
        $result = $this->transmitText($object, $content);
        return $result;
    }
    //接收语音消息
    private function receiveVoice($object)
    {
        if (isset($object->Recognition) && !empty($object->Recognition)){
            $content = "你刚才说的是：".$object->Recognition;
            $result = $this->transmitText($object, $content);
        }else{
            $content = array( "MediaId"=>$object->MediaId);
            $result = $this->transmitVoice($object, $content);
        }
        return $result;
    }
    //接收视频消息
    private function receiveVideo($object)
    {
        $content = array("MediaId"=>$object->MediaId, "ThumbMediaId"=>$object->ThumbMediaId, "Title"=>"", "Description"=>"");
        $result = $this->transmitVideo($object, $content);
        return $result;
    }
    //接收链接消息
    private function receiveLink($object)
    {
        $content = "你发送的是链接，标题为：".$object->Title."；内容为：".$object->Description."；链接地址为：".$object->Url;
        $result = $this->transmitText($object, $content);
        return $result;
    }
    //回复文本消息
    private function transmitText($object, $content)
    {
        $xmlTpl = "<xml>
<ToUserName><![CDATA[%s]]></ToUserName>
<FromUserName><![CDATA[%s]]></FromUserName>
<CreateTime>%s</CreateTime>
<MsgType><![CDATA[text]]></MsgType>
<Content><![CDATA[%s]]></Content>
</xml>";
        $result = sprintf($xmlTpl, $object->FromUserName, $object->ToUserName, time(), $content);
        return $result;
    }
    //回复图片消息
    private function transmitImage($object, $imageArray)
    {
        $itemTpl = "<Image>
    <MediaId><![CDATA[%s]]></MediaId>
</Image>";
        $item_str = sprintf($itemTpl, $imageArray['MediaId']);
        $xmlTpl = "<xml>
        <ToUserName><![CDATA[%s]]></ToUserName>
        <FromUserName><![CDATA[%s]]></FromUserName>
        <CreateTime>%s</CreateTime>
        <MsgType><![CDATA[image]]></MsgType>
        $item_str
        </xml>";
        $result = sprintf($xmlTpl, $object->FromUserName, $object->ToUserName, time());
        return $result;
    }
    //回复语音消息
    private function transmitVoice($object, $voiceArray)
    {
        $itemTpl = "<Voice>
    <MediaId><![CDATA[%s]]></MediaId>
</Voice>";
        $item_str = sprintf($itemTpl, $voiceArray['MediaId']);
        $xmlTpl = "<xml>
        <ToUserName><![CDATA[%s]]></ToUserName>
        <FromUserName><![CDATA[%s]]></FromUserName>
        <CreateTime>%s</CreateTime>
        <MsgType><![CDATA[voice]]></MsgType>
        $item_str
        </xml>";
        $result = sprintf($xmlTpl, $object->FromUserName, $object->ToUserName, time());
        return $result;
    }
    //回复视频消息
    private function transmitVideo($object, $videoArray)
    {
        $itemTpl = "<Video>
    <MediaId><![CDATA[%s]]></MediaId>
    <ThumbMediaId><![CDATA[%s]]></ThumbMediaId>
    <Title><![CDATA[%s]]></Title>
    <Description><![CDATA[%s]]></Description>
</Video>";
        $item_str = sprintf($itemTpl, $videoArray['MediaId'], $videoArray['ThumbMediaId'], $videoArray['Title'], $videoArray['Description']);
        $xmlTpl = "<xml>
        <ToUserName><![CDATA[%s]]></ToUserName>
        <FromUserName><![CDATA[%s]]></FromUserName>
        <CreateTime>%s</CreateTime>
        <MsgType><![CDATA[video]]></MsgType>
        $item_str
        </xml>";
        $result = sprintf($xmlTpl, $object->FromUserName, $object->ToUserName, time());
        return $result;
    }
    //回复图文消息
    private function transmitNews($object, $newsArray)
    {
        if(!is_array($newsArray)){
            return;
        }
        $itemTpl = "    <item>
        <Title><![CDATA[%s]]></Title>
        <Description><![CDATA[%s]]></Description>
        <PicUrl><![CDATA[%s]]></PicUrl>
        <Url><![CDATA[%s]]></Url>
    </item>
";
        $item_str = "";
        foreach ($newsArray as $item){
            $item_str .= sprintf($itemTpl, $item['Title'], $item['Description'], $item['PicUrl'], $item['Url']);
        }
        $xmlTpl = "<xml>
        <ToUserName><![CDATA[%s]]></ToUserName>
        <FromUserName><![CDATA[%s]]></FromUserName>
        <CreateTime>%s</CreateTime>
        <MsgType><![CDATA[news]]></MsgType>
        <ArticleCount>%s</ArticleCount>
        <Articles>
        $item_str</Articles>
        </xml>";
        $result = sprintf($xmlTpl, $object->FromUserName, $object->ToUserName, time(), count($newsArray));
        return $result;
    }
    //回复音乐消息
    private function transmitMusic($object, $musicArray)
    {
        $itemTpl = "<Music>
    <Title><![CDATA[%s]]></Title>
    <Description><![CDATA[%s]]></Description>
    <MusicUrl><![CDATA[%s]]></MusicUrl>
    <HQMusicUrl><![CDATA[%s]]></HQMusicUrl>
</Music>";
        $item_str = sprintf($itemTpl, $musicArray['Title'], $musicArray['Description'], $musicArray['MusicUrl'], $musicArray['HQMusicUrl']);
        $xmlTpl = "<xml>
        <ToUserName><![CDATA[%s]]></ToUserName>
        <FromUserName><![CDATA[%s]]></FromUserName>
        <CreateTime>%s</CreateTime>
        <MsgType><![CDATA[music]]></MsgType>
        $item_str
        </xml>";
        $result = sprintf($xmlTpl, $object->FromUserName, $object->ToUserName, time());
        return $result;
    }
    //回复多客服消息
    private function transmitService($object)
    {
        $xmlTpl = "<xml>
<ToUserName><![CDATA[%s]]></ToUserName>
<FromUserName><![CDATA[%s]]></FromUserName>
<CreateTime>%s</CreateTime>
<MsgType><![CDATA[transfer_customer_service]]></MsgType>
</xml>";
        $result = sprintf($xmlTpl, $object->FromUserName, $object->ToUserName, time());
        return $result;
    }
    //日志记录
    private function logger($log_content)
    {
        
        
        if(isset($_SERVER['HTTP_APPNAME'])){   //SAE
            sae_set_display_errors(false);
            sae_debug($log_content);
            sae_set_display_errors(true);
        }else if($_SERVER['REMOTE_ADDR'] != "127.0.0.1"){ //LOCAL
            $max_size = 10000000000000000000000000000000000000000000000000000000000;
            $log_filename = "log.txt";
            if(file_exists($log_filename) and (abs(filesize($log_filename)) > $max_size)){unlink($log_filename);}
            file_put_contents($log_filename, $log_content."\r\n", FILE_APPEND);
        }
        
        
        
        
        
    }
    
    
    public function get_cishu_by_openid($openid){

        /*
        $con = mysql_connect("localhost","root","abc123");
        if (!$con)
        {
            die('Could not connect: ' . mysql_error());
        }
        
        
        
        
        if($cishu == null){
           $sql = "INSERT INTO `weixin`.`pre_wx` ( `openid`, `cishu`) VALUES ( '".$openid."', '1');";
           mysql_query($sql,$con);
        }else{
            
            $sql = "UPDATE `weixin`.`pre_wx` ( `openid`, `cishu`) VALUES ( '".$openid."', '1');";
            mysql_query($sql,$con);
        }
        
        
        
        
        
        
        
        
        
        mysql_close($con);
        



 */





        $User = M("wx"); 
      
        
        $cishu = $User->where("openid='$openid'")->getField('cishu');
        
        if($cishu == null){
            $sql =  "INSERT INTO `weixin`.`pre_wx` ( `openid`, `cishu`) VALUES ( '".$openid."', '1');";
          $Model = new \Think\Model(); // 实例化一个model对象 没有对应任何数据表
            $Model->execute($sql);
        }else{
            $User -> where("openid='$openid'")->setInc('cishu',1); // 次数加1;
        }
        
       $cishu = $User->where("openid='$openid'")->getField('cishu');
        
        
       
        
        
        return $cishu;
        
    }
    

    private function getToken(){
        $token_file = THINK_PATH.'/Conf/access_token.txt';
    
        $conf_file = THINK_PATH.'/Conf/conf.txt';
        if(!$conf = json_decode(file_get_contents($conf_file))) {
            die("can not read file");
        }
        $appid = $conf->{'appid'};
        $appsecret = $conf->{'appsecret'};
        $file = file_get_contents($token_file,true);
        $result = json_decode($file,true);
        if (time() > $result['expires']){
            $data = array();
            $data['access_token'] = $this->getNewToken($appid,$appsecret);
            $data['expires']=time()+7000;
            $jsonStr =  json_encode($data);
            $fp = fopen($token_file, "w");
            fwrite($fp, $jsonStr);
            fclose($fp);
            return $data['access_token'];
        }else{
            return $result['access_token'];
        }
    }
    
    private function getNewToken($appid,$appsecret){
        $url = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=$appid&secret=$appsecret";
        $access_token_Arr =  $this->https_request($url);
        return $access_token_Arr['access_token'];
    }
    private function https_request ($url){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $out = curl_exec($ch);
        curl_close($ch);
        return  json_decode($out,true);
    }
    
    
    
}
?>		 