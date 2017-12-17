<?php
namespace Admin\Controller;
use Think\Controller;
class DaojiaController extends Controller {
    public function index(){
        if(session('admin_id') == null){
         $this->error('还没登录，正在跳转',U('login'),5);
      }
      $adminModel = M('admin.admin','admin_');
      $admin_id = session('admin_id');
      $admin_username = $adminModel->where("admin_id = '$admin_id'")->getField('admin_username');
     

      $this->assign('admin_username',$admin_username);
    $this->display();
       
   
    }
    
    
    public function login(){
        if($_POST){
            $admin_username = I('post.admin_username','','htmlspecialchars');
            $admin_password = I('post.admin_password','','htmlspecialchars');
            $adminModel = M('admin.admin','admin_');
            $admin_pw = $adminModel->where("admin_username = '$admin_username'")->getField('admin_password');
            $admin_id = $adminModel->where("admin_username = '$admin_username'")->getField('admin_id');
            if($admin_password==$admin_pw){
                session('admin_id',$admin_id);
                $this->success('登录成功，正在跳转',U('index'),5);
                exit;
            }else {
                $this->error('密码错误');
            }
        }
        $this->display();
    
    }
    
    public function logout(){
    
        session('admin_id',null);
        $this->success('退出成功，正在跳转',U('index'),5);
    
    }
    
    public function add(){
        if(session('admin_id') == null){
            $this->error('还没登录，正在跳转',U('login'),5);
        }
        
       
        $admin_productModel = M('admin.product','admin_');
        
        if($_POST['content']) {	
            $data['classify'] = I('classify');
            $data['name'] = I('name');
            $data['price'] = I('price');
            $data['tuijian'] = $_POST['content'];
            
            
           
                $upload = new \Think\Upload();// 实例化上传类
                $upload->maxSize   =     3145728 ;// 设置附件上传大小
                $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
                $upload->rootPath  =      './ueditor/'; // 设置附件上传根目录
                $upload->subName  = array('date','Ym');
                // 上传单个文件
                $info   =   $upload->uploadOne($_FILES['photo']);
                if(!$info) {// 上传错误提示错误信息
                    $this->error($upload->getError());
                    exit;
                }else{// 上传成功 获取上传文件信息
                   // echo $info['savepath'].$info['savename'];
                    $data['img'] = 'ueditor/'.$info['savepath'].$info['savename'];
                }
           
            
            
            
            $admin_productModel->add($data);
        }
        
        
        
        
        $adminModel = M('admin.admin','admin_');
        $admin_id = session('admin_id');
        $admin_username = $adminModel->where("admin_id = '$admin_id'")->getField('admin_username');
        $this->assign('admin_username',$admin_username);
        
        $this->display();
    }
}