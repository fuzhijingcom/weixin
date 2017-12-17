<?php
namespace Home\Controller;
use Think\Controller;
class WarnloginController extends Controller {
    public function index(){
        $uid = session('user.uid');
        if ($uid == null){
            echo '<script language="javascript">window.location= "http://www.yudw.com/yykddn/warnlogin.php";</script>';
            exit;
        }else {
             $this->redirect('Kd/order/xiadan', array('uid' => $uid), 1, '页面跳转中...');
        }
        
      
        
        
       // echo '<script language="javascript">window.location= "http://www.yudw.com/yykddn";</script>';
       
    $this->display();
  // $this->redirect('http://www.yudw.com/yykddn', array('cate_id' => 2), 1, '页面跳转中...');
 
    }
    
    
    public function logout(){
        session(null);
        echo header("Content-type: text/html; charset=utf-8");
        echo '退出成功';
    
    }
    
}