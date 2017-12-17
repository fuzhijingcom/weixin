<?php
namespace Daojia\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
       // $todaytime = date("Y-m-d");
       // $todaycondition['time'] = array('like','%'.$date.'%');->where($todaycondition)
     if($_GET['search']){
         $keyword = $_GET['search'];
         $condition['name'] = array('like','%'.$keyword.'%'); 
     }
     
     if($_GET['r']){
         $classify = $_GET['r'];
         $condition['classify'] = array('eq',$classify);
     }
     
     if($_GET['type']){
         $type = $_GET['type'];
         switch ($type) {
             case 9.9:
             $condition['price'] = array('lt','10');
             break;
             case jujia:
             $condition['classify'] = array('eq','10');
             break;

             default:
                 ;
             break;
         }
         
     }
     $admin_productModel = M('admin.product','admin_');
   
     $list =  $admin_productModel -> where($condition)->order('id desc')->select();
    $this->assign('list', $list);   
    $this->display();
    
    }
    
    
    public function item(){
        $id= I('get.id/d');
       $admin_productModel = M('admin.product','admin_');
        $item = $admin_productModel  ->where("id='$id'")->find();
        
        $click = $item['click'] + 1;
        $admin_productModel->where("id='$id'")->setField('click',$click);
        $this->assign('item', $item);
        //dump($_COOKIE);
         
        $this->display();
    
    }
}