<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<!-- saved from url=(0043)https://www.sinacloud.com/sso/register.html -->
<html lang="zh-cn" data-lang="zh-cn" data-template="simple" class="lang-zh-cn"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta name="generator" content="VIM-7.0">
    <meta name="author" content="SINA Cloud">
    <!--<meta name="viewport" content="width=device-width, initial-scale=1.0"/>-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="keywords" content="新浪,云计算,SAE,SEC,SCS,公有云平台,弹性云,应用引擎,分布式,负载均衡,web服务器">        
        <meta name="description" content="">    
        <title>用户登录</title>
        <link rel="shortcut icon" href="https://www.sinacloud.com/favicon.ico">
    <link rel="stylesheet" type="text/css" href="/Public/register_files/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/Public/register_files/base.css">
    <link rel="stylesheet" type="text/css" href="/Public/register_files/index_base.css">
   
    
<link rel="stylesheet" type="text/css" href="/Public/register_files/register.css">
<link rel="stylesheet" type="text/css" href="/Public/register_files/jubao.css">
<link rel="stylesheet" type="text/css" href="/Public/register_files/register_guide.css">


<script src="/Public/register_files/saved_resource" type="text/javascript"></script></head>

<body class="">
    <div class="page">
        <!--header start-->
        <div class="page-head navbar-default">
    <div class="head">
        <div class="head-logo"><a class="logo" href="http://weixin.yudw.com/">
        <img src="/Public/register_files/sinacloud_logo.png"></a>
        </div>
        <div class="navbar">
            <ul class="nav navbar-nav">
                <li class="active"><a href="http://weixin.yudw.com/">首页</a></li>
                <li class="nav-dropdown ">
                    <a href="javascript:void(0);">产品</a>
                    <ul class="nav-dropdown-list">
                        <li><a href="http://weixin.yudw.com/home/index/controller">云应用 SAE</a></li>
                </li>
               
            </ul>
        </div>
        <!--<div class="head-consult">
            <i class="phone"></i><span>400-823-1517</span>
        </div>-->
        <div class="account-dropbox">
            <div class="db veral-top">
                <a class="db-nav" href="http://weixin.yudw.com/home/index/controller">控制台&nbsp;<i class="c-arrow"></i></a>
            </div>
           
                    </div>
    </div>
</div>
<!--通知组件-->

<!--/组件-->
<!--悬浮侧边栏组件-->
<!-- 公共顶导：这个文件的静态文件、链接等，必须写成绝对路径，否则可能出现无效链接 -->
<!--<link rel="stylesheet" type="text/css" href="https://www.sinacloud.com/static/common/css/page_contact.css?v=1.0.15.14">-->
<style>
@charset 'utf-8';
#page-contact-btn{position:fixed;bottom:100px;right:10px;z-index:100;}
#page-contact-btn a#delete-contact{display:none;position:absolute;top:-16px;right:-10px;}
#page-contact-btn a#delete-contact img{width:20px;}
#page-contact-btn:hover a#delete-contact{display:block;}
#page-contact-btn ul{list-style-type:none;margin:0;}
#page-contact-btn ul.contact-ul li.contact-li{position:relative;width:54px;height:54px;margin:5px auto;background:#41ade5;list-style-type:none;border-radius:3px;-webkit-border-radius:3px;-moz-border-radius:3px;}
#page-contact-btn ul.contact-ul li.thankful-li{position:relative;width:84px;margin:5px 0;list-style-type:none;}
#page-contact-btn ul.contact-ul li.thankful-li img{max-width:none;}
#page-contact-btn ul.contact-ul li.contact-li a.contact-item{display:inline-block;width:54px;height:54px;}
#page-contact-btn ul.contact-ul li.contact-li a.ent-item{background:url("//static.sinacloud.com/.app-stor/static/sinacloud/page_contact_icon.png") 7px 6px no-repeat;}
#page-contact-btn ul.contact-ul li.contact-li a.qrcode-item{background:url("//static.sinacloud.com/.app-stor/static/sinacloud/page_contact_icon.png") 6px -60px no-repeat;}
#page-contact-btn ul.contact-ul li.contact-li a.go-top-item{background:url("//static.sinacloud.com/.app-stor/static/sinacloud/page_contact_icon.png") 6px -126px no-repeat;}
#page-contact-btn ul.contact-ul li.contact-li .divider{margin:0 10px;width:310px;height:1px;border-top:1px dashed #999;}

#page-contact-btn ul.contact-ul li.contact-li .consult-box{position: absolute;top:-9999px;right:54px;width:350px;height:180px;color:#686868;background:url("//static.sinacloud.com/.app-stor/static/sinacloud/contact_consult_bg.png") no-repeat;}
#page-contact-btn ul.contact-ul li.contact-li .consult-box ul{padding:15px 10px 5px 10px;}
#page-contact-btn ul.contact-ul li.contact-li .consult-box ul li{line-height:23px;}
#page-contact-btn ul.contact-ul li.contact-li .consult-box .consult-btn{position:absolute;top:31px;right:47px;}
#page-contact-btn ul.contact-ul li.contact-li .consult-box .consult-btn a{display:inline-block;width:130px;height:54px;padding:18px 0 18px 18px;background:url("//static.sinacloud.com/.app-stor/static/sinacloud/page_contact_button.png") no-repeat;font-size:16px;color:#41ade5;letter-spacing:1px;text-align:center;text-decoration:none;}
#page-contact-btn ul.contact-ul li.contact-li .consult-box .consult-btn a:hover{color:#41ade5;}
#page-contact-btn ul.contact-ul li.contact-li .consult-box p.consult-level{margin-bottom:6px;padding:0 10px;}
#page-contact-btn ul.contact-ul li.contact-li .consult-box p.consult-level a{color:#75bfea;}
#page-contact-btn ul.contact-ul li.contact-li .consult-box p.consult-way{padding:4px 0 0 10px;}
#page-contact-btn ul.contact-ul li.contact-li .consult-box p.consult-way a{padding-right:15px;}
#page-contact-btn ul.contact-ul li.ent:hover .consult-box{top:-40px;}

#page-contact-btn ul.contact-ul li.contact-li .ent-box{position: absolute;top:-9999px;right:54px;width:350px;height:180px;color:#686868;background:url("//static.sinacloud.com/.app-stor/static/sinacloud/contact_consult_bg.png") no-repeat;}
#page-contact-btn ul.contact-ul li.contact-li .ent-box ul{padding:10px 10px 5px 10px;}
#page-contact-btn ul.contact-ul li.contact-li .ent-box ul li{line-height:23px;}
#page-contact-btn ul.contact-ul li.contact-li .ent-box ul li.qq a{font-size:13px;}
#page-contact-btn ul.contact-ul li.contact-li .ent-box ul li.qq a img{margin-top:-5px;}
#page-contact-btn ul.contact-ul li.contact-li .ent-box p.ent-level{margin-bottom:5px;padding:0 10px;color:#999;}
#page-contact-btn ul.contact-ul li.contact-li .ent-box p.ent-way{padding:4px 10px;}
#page-contact-btn ul.contact-ul li.contact-li .ent-box p.ent-way a{padding-right:15px;}
#page-contact-btn ul.contact-ul li.ent:hover .ent-box{top:-40px;}

#page-contact-btn ul.contact-ul li.contact-li .qrcode-box{position: absolute;top:-9999px;right:45px;;width:150px;height:170px;color:#686868;;background:url("//static.sinacloud.com/.app-stor/static/sinacloud/contact_qrcode_bg.png") no-repeat;}
#page-contact-btn ul.contact-ul li.contact-li .qrcode-box img{width:119px;height:119px;margin:1px 8px 0 1px;}
#page-contact-btn ul.contact-ul li.contact-li .qrcode-box p{margin-left:5px;}
#page-contact-btn ul.contact-ul li.qrcode:hover .qrcode-box{top:-45px;}
#page-contact-btn ul.contact-ul li.go-top{display:none;}

</style>




        <!-- header end-->
        <div class="page-container row-fluid">
            <!--模板开始-->
            
    <div class="main">
        <div class="register-inner">
            <div class="row">
                <div class="step-detail">
                    <ul class="steps">
                        <li class="step step-success">
                            <a href="https://www.sinacloud.com/sso/register.html#">1、微信授权</a>
                        </li>
                        <li class="step step-primary">
                            <a href="https://www.sinacloud.com/sso/register.html#">2、补充信息</a>
                        </li>
                        <li class="step">
                            <a href="https://www.sinacloud.com/sso/register.html#">3、登录完成</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div id="cfm-identity" class="col-md-8 reg_info reg_content">
                    <!--开始登录的分类-->
                    <div class="row">
                        <div class="col-md-6 col-md-offset-3">
                            <div class="register-type register-cur" id="register-personal"><a href="">微信登录</a></div>
                          
                           
                        </div>
                    </div>
                    <div class="row">
                        <div class="alert alert-info" role="alert" id="register-notice"><br>无需注册，微信登录。<br></div>
                    </div>
                    <!--结束登录的分类-->
                    <div class="row">
                        
                                                      

                           
                           
                            
                            <div class="form-group">
                                <div class="col-md-offset-3 col-md-8">
                                    <div class="checkbox">
                                        <br>
                                        <center>
  <a href="http://yudw.com/login/weixin-yudw-com-home-index-login.php" class="btn btn-base" type="submit">用微信登录</a>
  </center>
                                    </div>
                                </div>
                            </div>
                       
                    </div>
                </div>
                <div class="col-md-4 reg_content">
                    <div class="help">
                        <h4>有问题？请咨询</h4>
                        <ul>
                            <li><img src="/Public/me.jpg" ></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

            <!--模板结束-->
        </div>
       
    </div>


</body></html>