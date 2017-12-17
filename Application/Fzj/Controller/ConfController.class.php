<?php
namespace Fzj\Controller;
use Think\Controller;
define("TOKEN", "weixin");

class ConfController extends Controller {
    public function index(){
		$access_token = $this->getToken();
		echo $access_token;
	}
	public function get_moban(){
	    $access_token = $this->getToken();
	    
	 
	    $json='{
	        "template_id_short":"OPENTM406628251"
	    }';
	    
	    $url="https://api.weixin.qq.com/cgi-bin/template/api_add_template?access_token=".$access_token;
	    
	    $ch=curl_init();
	    curl_setopt($ch, CURLOPT_URL, $url);
	    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
	    curl_setopt($ch, CURLOPT_POST, 1);
	    curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	    $out=curl_exec($ch);
	    curl_close($ch);
	    var_dump($out);
	}
	
	public function send(){
	    $realname = "符智精";
	    $access_token = $this->getToken();
	    $url="https://api.weixin.qq.com/cgi-bin/message/template/send?access_token=".$access_token;
	    
	    $json = array(
	        'touser'=>"oEORvxABet1M0SNuQlUn2GojtLEs",
	        'template_id'=>"I-gIPqVvzQu5CUapL329Bl2u9eCg_LSRNXnSMNNDxcI",
	        'url'=>"http://www.yudw.com/login/login.php?back_action=query",
	        'data'=>array(
	            'first'=>array(
	                'value'=>"代拿下单成功！",
	                'color'=>"#DC143C"
	            ),
	            'keyword1'=>array(
	                'value'=>$realname,
	                'color'=>"#DC143C"
	            ),
	            'remark'=>array(
	                'value'=>"如有问题，请咨询客服：15813439851",
	                'color'=>"#DC143C"
	            )
	        )
	    );
	    
	    $json = json_encode($json);
	    
	    /*
	      $json='{
	        "touser":"oEORvxABet1M0SNuQlUn2GojtLEs",
	        "template_id":"I-gIPqVvzQu5CUapL329Bl2u9eCg_LSRNXnSMNNDxcI",
	        "url":"http://www.yudw.com/login/login.php?back_action=query",
	        "data":{
	        "first": {
	        "value":"代拿下单成功！",
	        "color":"#DC143C"
	        },
	        "keyword1":{
	        "value":"12345678",
	        "color":"#173177"
	        },
	        "keyword2": {
	        "value": "$realname" ,
	        "color":"#173177"
	        },
	        "keyword3": {
	        "value":"2017-04-20 20:47:25",
	        "color":"#173177"
	        },
	        "keyword4": {
	        "value":"宿舍：一饭三",
	        "color":"#173177"
	        },
	        "keyword5": {
	        "value":"今晚9点后送",
	        "color":"#173177"
	        },
	        "remark":{
	        "value":"如有问题，请咨询客服：15813439851",
	        "color":"#DC143C"
	        }
	    }
	    }';
	    */
	      
	      $ch=curl_init();
	      curl_setopt($ch, CURLOPT_URL, $url);
	      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	      curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
	      curl_setopt($ch, CURLOPT_POST, 1);
	      curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
	      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	      $out=curl_exec($ch);
	      curl_close($ch);
	      var_dump($out);
	      
	    
	}
	
	
	public function send_no(){
	    $access_token = $this->getToken();
	    $url="https://api.weixin.qq.com/cgi-bin/message/template/send?access_token=".$access_token;
	     
	    $json='{
	        "touser":"oEORvxAac5gypn23G7r0OrOwZC6g",
	        "template_id":"I-gIPqVvzQu5CUapL329Bl2u9eCg_LSRNXnSMNNDxcI",
	        "url":"http://www.yudw.com/login/login.php?back_action=query",
	        "data":{
	        "first": {
	        "value":"亲爱的，由于你宿舍没人，无法派送！",
	        "color":"#DC143C"
	        },
	        "keyword1":{
	        "value":"12345678",
	        "color":"#173177"
	        },
	        "keyword2": {
	        "value":"RainyAndSunny",
	        "color":"#173177"
	        },
	        "keyword3": {
	        "value":"2017-04-20 20:47:25",
	        "color":"#173177"
	        },
	        "keyword4": {
	        "value":"宿舍：27栋506",
	        "color":"#173177"
	        },
	        "keyword5": {
	        "value":"今晚9点后送",
	        "color":"#173177"
	        },
	        "remark":{
	        "value":"如有问题，请咨询客服：15813439851",
	        "color":"#DC143C"
	        }
	    }
	    }';
	     
	     
	    $ch=curl_init();
	    curl_setopt($ch, CURLOPT_URL, $url);
	    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
	    curl_setopt($ch, CURLOPT_POST, 1);
	    curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	    $out=curl_exec($ch);
	    curl_close($ch);
	    var_dump($out);
	     
	     
	}
	
	
	
	
public function hangye(){
    $access_token = $this->getToken();
    
    $json=' {
          "industry_id1":"1",
          "industry_id2":"13"
       }';
    
    

$url="https://api.weixin.qq.com/cgi-bin/template/api_set_industry?access_token=".$access_token;

$ch=curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$out=curl_exec($ch);
curl_close($ch);
var_dump($out);

}
	
	public function create_menu() {
	    $access_token = $this->getToken();
	    
	   
		$json=' {
     "button":[
     {    
          "type":"view",
          "name":"商城",
          "url":"http://152.yudw.com/mobile"
      },
      
      {
           "name":"其他",
           "sub_button":[
           {    
               "type":"view",
               "name":"抽奖1",
               "url":"http://cjm.yudw.com/v"
            },
		    {    
               "type":"view",
               "name":"抽奖2",
               "url":"http://152.yudw.com/cj"
            },
            {
               "type":"view",
               "name":"客服",
               "url":"http://152.yudw.com/mobile/card/kefu"
            },
            {
               "type":"view",
               "name":"购物车",
               "url":"http://152.yudw.com/mobile/Cart/cart.html"
            }]
       }]
 }';
	
		$url="https://api.weixin.qq.com/cgi-bin/menu/create?access_token=".$access_token;

		$ch=curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		$out=curl_exec($ch);
		curl_close($ch);
		var_dump($out);		

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
