<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
        $this->assign('title','控制台');
        $controller_id = session('controller_id');
        if( $controller_id == null){
            $this->error('还没登录，正在跳转',U('login'),5);
        }
        
        $userModel = M('user');
        if($userModel->where("controller_id='$controller_id'")->find() == null){
            //echo "no exit";
            $controller_name = session('controller_name');
            if ($controller_name==null) {
                $controller_name = "用户".$controller_id;
            }
            $data['controller_id'] = $controller_id;
            $data['controller_name'] = $controller_name;
            $data['register_time'] = date('Y-m-d H:i:s');
            $userModel->data($data)->add();
        }
        $last_login = date('Y-m-d H:i:s');
        $userModel-> where("controller_id='$controller_id'")->setField('last_login',$last_login);
       
        $this->success('登录成功，正在进入控制台...',U('controller'),2);
        
       // $this->display();
    }
    public function controller(){
        
        $this->assign('title','控制台');
        if(session('controller_id') == null){
            $this->error('还没登录，正在跳转',U('login'),5);
        }

       
        $controller_id = session('controller_id');
        $this->assign('controller_id',$controller_id);
        $userModel = M('user');
        $controller_name = $userModel ->where("controller_id='$controller_id'")->getField('controller_name');
        
       
        $this->assign('controller_name',$controller_name);
        //找出当前用户的表
        
        $tableModel = M('table');
        $alltable = $tableModel ->where("controller_id='$controller_id'")->select();
        
        //dump($alltable);
        $appid = $userModel->where("controller_id='$controller_id'")->getField('appid');
        $appsecret = $userModel->where("controller_id='$controller_id'")->getField('appsecret');
        $this->assign('appid',$appid);
        $this->assign('appsecret',$appsecret);
        
        
        $this->assign('alltable',$alltable);
        $this->display();
    }
   
    public function register(){
    
        $this->display();
    }
    
    public function editor(){
        $this->assign('title','编辑器');
        $file_id = $_GET['file_id'];
        $tableModel = M('table');
        $controller_id = $tableModel ->where("file_id='$file_id'")->getfield('controller_id');
        $file_name = $tableModel ->where("file_id='$file_id'")->getfield('file_name');
        
        $fileName = "/home/wwwroot/".$_SERVER['SERVER_NAME']."/uid/".$controller_id."/".$file_name.".php";
        
        $this->assign('file_name',$file_name.".php");

        $this->assign('fileName',$fileName);
  
        $userModel = M('user');
        $controller_name = $userModel ->where("controller_id='$controller_id'")->getField('controller_name');
        $this->assign('controller_name',$controller_name);
        if(file_exists($fileName)){
            $fp = fopen($fileName,"a+");
            $text = fread($fp,filesize($fileName));//指定读取大小，这里把整个文件内容读取出来
           
        }

        $this->assign('file_id',$file_id);
        $this->assign('text',$text);

        $this->display();
        
        fclose($fileName);
    }
    
    public function editornew(){
        $file_id = $_GET['file_id'];
        $tableModel = M('table');
        $controller_id = $tableModel ->where("file_id='$file_id'")->getfield('controller_id');
        $file_name = $tableModel ->where("file_id='$file_id'")->getfield('file_name');
    
        $fileName = "/home/wwwroot/weixin.hapu.net/uid/".$controller_id."/".$file_name.".php";
    
        $this->assign('file_name',$file_name.".php");
    
        $this->assign('fileName',$fileName);
    
        if(file_exists($fileName)){
            $fp = fopen($fileName,"a+");
            $text = fread($fp,filesize($fileName));//指定读取大小，这里把整个文件内容读取出来
             
        }
    
        $this->assign('file_id',$file_id);
        $this->assign('text',$text);
    
        $this->display();
    
        fclose($fileName);
    }
    
    
    public function save(){

        $file_id = $_POST['file_id'];
        $tableModel = M('table');
        $controller_id = $tableModel ->where("file_id='$file_id'")->getfield('controller_id');
        $file_name = $tableModel ->where("file_id='$file_id'")->getfield('file_name');
        $fileName = "/home/wwwroot/weixin.hapu.net/uid/".$controller_id."/".$file_name.".php";
        
       //dump($fileName);
        
        $handle = fopen($fileName, "w"); 
        $text = $_POST['file_contents']; 
        
       // dump($text);
        
        
        if(fwrite($handle, $text) == FALSE){ 
            fclose($handle);
          $this->error('保存失败','', 2);
          
        }else{ 
            $this->success('保存成功，正在返回控制台...',U('controller'),2);
         } 
         
         
         
         
         fclose($handle); 

        
    }
    
    
    public function addfile(){
        $file_name = $_GET['filename'];
        if(preg_match("/^[0-9a-zA-Z]{3,12}$/",$file_name)){
            echo '正确，全部为英文或者字母！';
        }else{
            $this->error('创建失败，只能是英文字母或数字, 且长度必须是3-12','', 2);
        }
        $controller_id = session('controller_id');
        $tableModel = M('table');
        $map['controller_id'] = $controller_id;
        $map['file_name'] = $file_name;
        $file_exits = $tableModel ->where($map)->find();
        
        if($file_exits !== null){
            $this->error('创建文件失败，文件已存在，文件名不能重复','', 2);
        }
        
        $data['controller_id'] = $controller_id;
        $data['file_name'] = $file_name;
        $data['update_time'] = date('Y-m-d H:i:s');
        $tableModel->data($data)->add();
        
       // dump($file_exits);
        
        
        //echo $file_name.".php";
      $this->success('创建文件成功','', 2);
    }
    
    
    public function login(){
        $this->assign('title','登录');
        $uid = $_GET['uid'];
        $realname = $_GET['realname'];
       
        
        session('controller_id',$uid);
        session('controller_name',$realname);
        
       // dump(session());
        
       $path = 'uid/'.$uid;
        
        
            if (!file_exists($file_name)){ 
               mkdir($path,0777,true);
                //echo '创建文件夹test成功';
            }else{
                //echo '需创建的文件夹test已经存在';
            }

        //if($uid==null){
        
       // echo '<script type="text/javascript">window.location.href=\'' . 'http://yudw.com/login/weixin-yudw-com-home-index-login.php\';</script>';
       
        //}
        
            if($uid !== null){
                $this->success('登录成功，正在进入控制台...',U('index'),2);
                exit;
            }
            
        $this->display();
        
        
    }
    public function images() {
        $this->assign('title','图片管理');
        if(session('controller_id') == null){
            $this->error('还没登录，正在跳转',U('login'),5);
        }
        
         
        $controller_id = session('controller_id');
        $this->assign('controller_id',$controller_id);
        $userModel = M('user');
        $controller_name = $userModel ->where("controller_id='$controller_id'")->getField('controller_name');
        
         
        $this->assign('controller_name',$controller_name);
        //找出当前用户的表
        
        $imgModel = M('img');
        $allimg = $imgModel ->where("controller_id='$controller_id'")->select();
        
        //dump($alltable);
        
        $this->assign('allimg',$allimg);
        $this->display();
    }
    
    public function db() {
        $this->assign('title','数据库管理');
        if(session('controller_id') == null){
            $this->error('还没登录，正在跳转',U('login'),5);
        }
        $controller_id = session('controller_id');
        
        
        //连接数据库
        $con = mysql_connect("localhost","root","yourdnet%680111");
        if (!$con)
        {
            die('Could not connect: ' . mysql_error());
        }
        mysql_select_db("weixin", $con);
 
        $result = mysql_query("SELECT * FROM `pre_".$controller_id."`");
        //如果存在就不是false
        if($result==false){
           $product_table = 0;      
        }else{           
            $product_table =1;   

        }    
       
        mysql_close($con);
    
        $this->assign('product_table',$product_table);
        
        
        
        
        
        
        if(IS_POST){
            
            $Model = new \Think\Model(); // 实例化一个model对象 没有对应任何数据表
            $result = $Model->execute("CREATE TABLE `pre_".$controller_id."` (
	                       `id` INT NOT NULL AUTO_INCREMENT COMMENT '商品ID', 
	                       `name` VARCHAR(30) NOT NULL COMMENT '商品名称', 
	                     `description` VARCHAR(255) NOT NULL COMMENT '商品描述', 
	                      `price` DECIMAL(10, 2) NOT NULL DEFAULT '0.00' COMMENT '商品价格', 
	                    PRIMARY KEY (`id`)
                      ) ENGINE = MyISAM CHARACTER SET utf8 COLLATE utf8_general_ci;"
            );
        
            $this->success('创建你的商品数据表成功！<br>数据表名：pre_'.$controller_id.'');
            exit;
            
            }
        
        //INSERT INTO `weixin`.`pre_1` (`id`, `name`, `description`, `price`) VALUES (NULL, '笔', '好看的笔', '10.00');
        
        $controller_id = session('controller_id');
        $this->assign('controller_id',$controller_id);
        $userModel = M('user');
        $controller_name = $userModel ->where("controller_id='$controller_id'")->getField('controller_name');
    
         
        $this->assign('controller_name',$controller_name);
        //找出当前用户的表
    
        $imgModel = M('img');
        $allimg = $imgModel ->where("controller_id='$controller_id'")->select();
    
        //dump($alltable);
       
        $this->assign('allimg',$allimg);
        $this->display();
    }
    
    
    public function sql(){
        
        dump($result);
    }
    
    public function add(){
        $this->assign('title','数据库管理');
        if(session('controller_id') == null){
            $this->error('还没登录，正在跳转',U('login'),5);
        }
        $controller_id = session('controller_id');
        
        $this->assign('controller_id',$controller_id);
        
        $this->display();
    }
 
    

    public function logout(){
        session('controller_id',NULL);
        session('controller_name',NULL);
        $this->redirect('index');
    }
}