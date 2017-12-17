<?php
namespace Home\Controller;
use Think\Controller;
define("TOKEN", "weixin");


class IndexController extends Controller {
    public function index(){
			
		}
	}





 class wechatCallbackapiTest
 {
     public function valid()
     {
         $echoStr = $_GET["echostr"];
         if($this->checkSignature()){
             echo $echoStr;
             exit;
         }
     }

     private function checkSignature()
     {
         $signature = $_GET["signature"];
         $timestamp = $_GET["timestamp"];
         $nonce = $_GET["nonce"];

         $token = TOKEN;
         $tmpArr = array($token, $timestamp, $nonce);
         sort($tmpArr, SORT_STRING);
         $tmpStr = implode( $tmpArr );
         $tmpStr = sha1( $tmpStr );

         if( $tmpStr == $signature ){
             return true;
         }else{
             return false;
         }
     }
 }
		 $wechatObj = new wechatCallbackapiTest();
		 if (isset($_GET['echostr'])) {
			 $wechatObj->valid();
			 
		 }
		 
		 
		 