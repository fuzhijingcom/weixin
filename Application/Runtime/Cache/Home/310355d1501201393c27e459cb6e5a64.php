<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html>
<html lang="zh-cn" data-lang="zh-cn" data-template="default" class="lang-zh-cn">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="author" content="SAE Group">
    <meta name="keywords" content="">
        <meta name="description" content="">
        <title><?php echo ($title); ?></title>
    <link rel="shortcut icon" href="https://sae.sina.com.cn/static/favicon.ico">
    <link rel="stylesheet" type="text/css" href="/Public/controller_files/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="/Public/controller_files/page-common.css">    
    <link rel="stylesheet" type="text/css" href="/Public/controller_files/sidebar.css">    
    <link rel="stylesheet" type="text/css" href="/Public/controller_files/home.css">        
    <style type="text/css">
        #page-breadcrumb{display:none;}
    </style>
<link rel="stylesheet" type="text/css" href="/Public/controller_files/saved_resource">        
  
 <script src="/Public/jquery-1.7.1.js" type="text/javascript"></script>

    <!--[if IE 9]>
    <link rel="stylesheet" href="/static/css/v2/ie9.css"/>
    <![endif]-->
    <!--[if IE 8]>
    <link rel="stylesheet" href="/static/css/v2/ie8.css"/>
    <![endif]-->
    <!--[if IE 7]>
    <link rel="stylesheet" href="/static/css/v2/ie7.css"/>
    <![endif]-->
    <!--[if lte IE 6]>
    <link rel="stylesheet" href="/static/css/v2/ie6.css"/>
    <![endif]-->

</head>
<body id="body" class="vermng">


<!--头部导航-->
<div id="top_header"><!-- 公共顶导：这个文件的静态文件、链接等，必须写成绝对路径，否则可能出现无效链接 -->
<style>
@charset 'utf-8';
 
/*************************************************/
.page-head{min-width:1280px;height:64px;background-color:#148CCA;font-family:"hiragino sans gb","microsoft yahei"}

.page-head  i.head-icon{display:inline-block;width:30px;height:20px;vertical-align:middle;}


.page-head .logo-area{float:left;width:200px;height:64px;position:relative;}
.page-head .page-logo{display:inline-block;margin:10px 0 0 22px;}

.page-head .dashboard{float:left;margin-left:1px;width:110px;height:64px;position:relative;text-align:center;}
.page-head .dashboard .db-title{display:inline-block;margin:22px 0;padding:0 20px;color:#fff;border-left:1px solid #38ACE7;border-right:1px solid #38ACE7;text-decoration:none;}
.page-head .dashboard .db-title i.u-arrow{width:20px;height:15px;background:url("//static.sinacloud.com/.app-stor/static/sinacloud/dashboard_header_icon.png") 9px 2px no-repeat;}
.page-head .dashboard:hover .db-title i.u-arrow{width:20px;height:15px;background:url("//static.sinacloud.com/.app-stor/static/sinacloud/dashboard_header_icon.png") -34px -179px no-repeat;}
.page-head .dashboard .db-dropdown-list{position:absolute;top:64px;left:-9999px;width:110px;margin:0;padding:0;list-style-type:none;z-index:1999;background:#fff;border:1px solid #eee;}
.page-head .dashboard .db-dropdown-list ul{margin:0;padding:0;list-style-type:none;}
.page-head .dashboard .db-dropdown-list ul li{line-height:38px;text-align:center;}
.page-head .dashboard .db-dropdown-list ul li:hover{background:#ebebeb;}
.page-head .dashboard .db-dropdown-list ul li a{display:inline-block;width:108px;color:#686868;text-decoration:none;}
.page-head .dashboard:hover{background:#fff;}
.page-head .dashboard:hover a.db-title{color:#686868;}
.page-head .dashboard:hover a.db-title{border-color:#fff;}
.page-head .dashboard:hover .db-dropdown-list{left:0;right:auto;}

.page-head .useri{float:right;display:inline-block;height:64px;color:#999;}
.page-head .useri .u-consult{float:left;display:inline-block;width:135px;height:64px;margin:0;padding:23px 0;color:#fff;}
.page-head .useri .u-consult i.phone{display:inline-block;width:17px;height:17px;vertical-align:middle;background:url("//static.sinacloud.com/.app-stor/static/sinacloud/phone.png") -1px -1px no-repeat;}
.page-head .useri ul.dashboard-nav{display:inline-block;margin:0;padding:0;list-style-type:none;}
.page-head .useri ul li{margin:0 0 0 0;padding:0;float:left;height:64px;}
.page-head .useri ul li.nav-li:hover{background-color:#fff;border-bottom:1px solid #eee;}
.page-head .useri ul li.nav-li:hover a{color:#585757;}
.page-head .useri ul li.nav-li:hover a{border-color:#fff;}
.page-head .useri ul li a{display:inline-block;margin:22px 0;padding:0 20px;border-left:1px solid #38ACE7;text-decoration:none;color:#fff;}
.page-head .useri li.mobile-dropdown{width:155px;position:relative;}
.page-head .useri li.mobile-dropdown a{padding:0 0 0 15px;}
.page-head .useri ul.mobile-dropdown-list{position:absolute;top:64px;left:-9999px;width:390px;height:152px;list-style-type:none;margin:0;padding:0;z-index:1000;border:1px solid #eee;border-top:none;background:#fff;-webkit-box-shadow:1px 1px 1px #ccc;-moz-box-shadow: 2px 2px 2px #ccc;box-shadow: 2px 2px 2px #ccc;}
.page-head .useri ul.mobile-dropdown-list li{float:left;height:100px;margin:0;}
.page-head .useri ul.mobile-dropdown-list li.mobile-tip{width:240px;padding:20px 0px 0 10px;border:none;}
.page-head .useri ul.mobile-dropdown-list li.mobile-qrcode{padding:22px 10px 10px 0;text-align:center;}
.page-head .useri ul.mobile-dropdown-list li.mobile-qrcode img{width:100px;height:100px;}
.page-head .useri ul.mobile-dropdown-list li.mobile-qrcode p{line-height:25px;}
.page-head .useri li:hover ul.mobile-dropdown-list{left:auto;}

.page-head .useri ul li a i.mobile{height:22px;background:url("//static.sinacloud.com/.app-stor/static/sinacloud/dashboard_header_icon.png") 5px -205px no-repeat;}
.page-head .useri ul li:hover a i.mobile{height:25px;background:url("//static.sinacloud.com/.app-stor/static/sinacloud/dashboard_header_icon.png") -38px -205px no-repeat;}
.page-head .useri ul li a i.cost{background:url("//static.sinacloud.com/.app-stor/static/sinacloud/dashboard_header_icon.png") -1px -24px no-repeat;}
.page-head .useri ul li:hover a i.cost{background:url("//static.sinacloud.com/.app-stor/static/sinacloud/dashboard_header_icon.png") -45px -24px no-repeat;}
.page-head .useri ul li a i.iprice{background:url("//static.sinacloud.com/.app-stor/static/sinacloud/dashboard_spt_icon.png") -9px -58px no-repeat;}
.page-head .useri ul li:hover a i.iprice{background:url("//static.sinacloud.com/.app-stor/static/sinacloud/dashboard_spt_icon.png") -43px -58px no-repeat;}
/*.page-head .useri ul li a i.ms{background:url("//static.sinacloud.com/.app-stor/static/sinacloud/dashboard_header_icon.png") -1px -102px no-repeat;}
.page-head .useri ul li:hover a i.ms{background:url("//static.sinacloud.com/.app-stor/static/sinacloud/dashboard_header_icon.png") -45px -102px no-repeat;}
.page-head .useri ul li a #ms-tip{display:none;font-size:12px;border-radius:45%;padding-right:4px;vertical-align:top;background:#FF6574;}*/
.page-head .useri ul li a i.spt{background:url("//static.sinacloud.com/.app-stor/static/sinacloud/dashboard_header_icon.png") -1px -143px no-repeat;}
.page-head .useri ul li:hover a i.spt{background:url("//static.sinacloud.com/.app-stor/static/sinacloud/dashboard_header_icon.png") -45px -143px no-repeat;}
.page-head .useri ul li i.u-arrow{margin-top:26px;width:15px;height:15px;vertical-align:top;background:url("//static.sinacloud.com/.app-stor/static/sinacloud/dashboard_header_icon.png") 3px 2px no-repeat;}
.page-head .useri ul li.account-dropdown i.u-arrow{margin-top:26px;width:15px;height:15px;vertical-align:top;background:url("//static.sinacloud.com/.app-stor/static/sinacloud/dashboard_header_icon.png") -2px 2px no-repeat;}
.page-head .useri ul li:hover i.u-arrow{width:15px;height:15px;background:url("//static.sinacloud.com/.app-stor/static/sinacloud/dashboard_header_icon.png") -40px -179px no-repeat;}
.page-head .useri ul li.account-dropdown:hover i.u-arrow{width:15px;height:15px;background:url("//static.sinacloud.com/.app-stor/static/sinacloud/dashboard_header_icon.png") -45px -179px no-repeat;}
.page-head .useri li.spt-dropdown{width:140px;position:relative;}
.page-head .useri li.spt-dropdown a{padding:0 0 0 15px;}
.page-head .useri ul.spt-dropdown-list{position:absolute;top:64px;left:-9999px;width:260px;height:160px;list-style-type:none;margin:0;padding:0;z-index:1000;border:1px solid #eee;border-top:0;background:#fff;-webkit-box-shadow:1px 1px 1px #ccc;-moz-box-shadow: 2px 2px 2px;box-shadow: 2px 2px 2px #ccc;}
.page-head .useri ul.spt-dropdown-list li ul{overflow:hidden;margin:15px 0;padding:0;list-style-type:none;}
.page-head .useri ul.spt-dropdown-list li ul li{width:129px;height:42px;float:left;text-align:center;}
.page-head .useri ul.spt-dropdown-list li ul li:hover{border-bottom:0 !important;background-color:#fff;}
.page-head .useri ul.spt-dropdown-list li ul li.spt-doc{border-right:1px solid #bfbfbf;}
.page-head .useri ul.spt-dropdown-list li ul li a{margin:0;padding:0;border:none;text-decoration:none;color:#686868;}
.page-head .useri ul.spt-dropdown-list li ul li a i{display:inline-block;width:25px;height:25px;vertical-align:middle;}
.page-head .useri ul.spt-dropdown-list li ul li.spt-doc a i{background:url("//static.sinacloud.com/.app-stor/static/sinacloud/dashboard_spt_icon.png") -9px -3px no-repeat;}
.page-head .useri ul.spt-dropdown-list li ul li.spt-question a i{background:url("//static.sinacloud.com/.app-stor/static/sinacloud/dashboard_spt_icon.png") -9px -29px no-repeat;}
.page-head .useri ul.spt-dropdown-list li ul li a:hover i.doc-icon{background:url("//static.sinacloud.com/.app-stor/static/sinacloud/dashboard_spt_icon.png") -34px -3px no-repeat;}
.page-head .useri ul.spt-dropdown-list li ul li a:hover i.question-icon{background:url("//static.sinacloud.com/.app-stor/static/sinacloud/dashboard_spt_icon.png") -35px -29px no-repeat;}
.page-head .useri ul.spt-dropdown-list li ul li a:hover p{color:#6dc4f3;}
.page-head .useri ul.spt-dropdown-list li ul li a p{font-size:12px;margin:0;padding:0;}
.page-head .useri ul.spt-dropdown-list li.spt-btn{padding-top:16px;text-align:center;}
.page-head .useri ul.spt-dropdown-list li.spt-btn a.btn{width:225px;height:35px;margin:0;padding:0;line-height:35px;color:#fff;background-color:#5bc0de;border-radius:20px;background-image:none;border: 1px solid transparent;}
/*.page-head .useri ul.spt-dropdown-list li.spt-btn a.btn:hover{background-color:#39aae7;border-color:#39aae7;}*/
.page-head .useri ul.spt-dropdown-list li.spt-btn a.btn i{display:inline-block;width:30px;height:25px;vertical-align:middle;background:url("//static.sinacloud.com/.app-stor/static/sinacloud/dashboard_spt_icon.png") -13px -88px no-repeat;}
.page-head .useri ul.spt-dropdown-list li.spt-btn a.all-workorder{margin:10px 0;padding:0;border:none;font-size:12px;color:#56bbf1;}
.page-head .useri ul.spt-dropdown-list li.spt-btn a.all-workorder:hover{color:#337ab7;}
.page-head .useri li:hover ul.spt-dropdown-list{left:auto;right:0;}



.page-head .useri li.account-dropdown{width:168px;position:relative;}
.page-head .useri li.account-dropdown a.user-center{display:inline-block;margin:20px 0;height:26px;line-height:26px;padding:0 0 0 20px;text-overflow:ellipsis;overflow:hidden;white-space:nowrap;}
.page-head .useri li.account-dropdown i#ms-tip{display:none;font-size:12px;border-radius:50%;margin-top:15px;margin-left:-23px;padding:0px 3px;vertical-align:top;background:#FF6574;font-style:normal;color:#fff;}
.page-head .useri a.user-center i.level{display:inline-block;width:45px;height:26px;vertical-align:top;}
.page-head .useri a.user-center i.level1{background:url("//static.sinacloud.com/.app-stor/static/sinacloud/level_icon0.png") -3px -5px no-repeat;}
.page-head .useri a.user-center i.level5{background:url("//static.sinacloud.com/.app-stor/static/sinacloud/level_icon0.png") -3px -90px no-repeat;}
.page-head .useri a.user-center i.level6{background:url("//static.sinacloud.com/.app-stor/static/sinacloud/level_icon0.png") -3px -48px no-repeat;}
.page-head .useri a.user-center i.level7{background:url("//static.sinacloud.com/.app-stor/static/sinacloud/level_icon0.png") -3px -133px no-repeat;}
.page-head .useri a.user-center i.level8{background:url("//static.sinacloud.com/.app-stor/static/sinacloud/level_icon0.png") -3px -175px no-repeat;}
.page-head .useri a.user-center i.level99{background:url("//static.sinacloud.com/.app-stor/static/sinacloud/level_icon0.png") -3px -215px no-repeat;}
.page-head .useri a.user-center span{display:inline-block;width:55px;text-overflow:ellipsis;overflow:hidden;white-space:nowrap;}
.page-head .useri ul.account-dropdown-list{position:absolute;top:64px;left:-9999px;width:168px;list-style-type:none;margin:0;padding:0;z-index:1000;outline:1px solid #eee;background:#fff;}
.page-head .useri ul.account-dropdown-list li{float:none;height:38px;line-height:38px;margin:0;}
.page-head .useri ul.account-dropdown-list li span.red{color:#f00;}
.page-head .useri ul.account-dropdown-list li:hover{background:#ebebeb;}

.page-head .useri ul.account-dropdown-list li a{width:150px;max-width:150px;margin:0;padding:0 0 0 20px;color:#686868;border:0;text-decoration:none;}
.page-head .useri ul.account-dropdown-list li a i.twelve-icon{display:inline-block;width:60px;height:20px;margin-left:3px;background:url("//static.sinacloud.com/.app-stor/static/sinacloud/double12.jpg") 0 0 no-repeat;vertical-align:middle;}
.page-head .useri ul.account-dropdown-list li a img.level-up{padding:0 0 3px 5px;}
.page-head .useri li:hover ul.account-dropdown-list{left:auto;}
.page-head .useri li.account-dropdown:hover i.u-arrow{width:15px;height:15px;background:url("//static.sinacloud/.app-stor/static/sinacloud/dashboard_header_icon.png") -40px -179px no-repeat;}




.shade
{  
    position:absolute;
    top:0%; /**遮罩全屏top,left都为0,width,height为100%**/
    left:0%; 
    width:100%; 
    height:100%; 
    filter:alpha(opacity=50);
    opacity: 0.5; 
    -moz-opacity:0.5; 
    -khtml-opacity: 0.5;  
    background-color:black;
    z-index: 1001;  
    display:none;
}

#div_show
{
    position: absolute;
    width: 300px;
    height:150px;
    background: #CCCCCC; 
    z-index: 1002; 
    display:none;   
    text-align:center;
}

.content
{
    width:278px;  
    height: 88px; 
    margin:10px 0px 0px 10px;
    background-color: #DDDDDD; 
    border: 1px solid silver;
}

.content div
{
    margin-top:31px;
}

.content div input
{
    width:140px;
}

.footer
{
    height:50px;
    margin-top: 12px;
}

.footer #btnCancel
{
    margin-left:15px;
}
</style>


<!-- 公共顶导：这个文件的静态文件、链接等，必须写成绝对路径，否则可能出现无效链接 -->
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

<script type="text/javascript">
$(function () {
    $("#txtShow").click(function () {
        $("#divShade").show();
        funShowDivCenter("#div_show");
        $("#txtSiteID").focus();
    });
    $("#btnCancel").click(function () {
        $("#divShade").hide();
        $("#div_show").hide();
    });
    
    $("#btnOK").click(function(){
        var filename = $("input[name='filename']").val();
        location.href = "addfile?filename="+filename;//location.href实现客户端页面的跳转 
      
    });   
});

//让指定的DIV始终显示在屏幕正中间
function funShowDivCenter(div) {
    var top = ($(window).height() - $(div).height()) / 2;
    var left = ($(window).width() - $(div).width()) / 2;
    var scrollTop = $(document).scrollTop();
    var scrollLeft = $(document).scrollLeft();
    $(div).css({ position: 'absolute', 'top': top + scrollTop, left: left + scrollLeft }).show();
}
</script>
<div id="divShade" class="shade"></div>
    
    <div id="div_show">
       <div class="content">
          <div><label>文件名：</label><input id="txtSiteID" type="text" name="filename"/>.php</div>
       </div>
       <div class="footer">
          <input id="btnOK" type="button" value="确定" /><input id="btnCancel" type="button" value="取消" />
       </div>
</div>
    
    
<div class="page-head clearfix">
    <div class="logo-area">
        <a href="http://weixin.yudw.com/home/index/controller" class="page-logo" title="新浪云">
        <img src="/Public/controller_files/sinacloud_logo.png"></a>
    </div>
    <div class="dashboard">
        <a class="db-title" href="javascript:void(0)">控制台<i class="head-icon u-arrow"></i></a>
        <div class="db-dropdown-list">
            <ul class="db-detail-list">
                <li><a href="http://weixin.yudw.com/home/index/controller">云应用 SAE</a></li>
                
  			</ul>
        </div>
    </div>
    <div class="useri">
        <!--<div class="u-consult">
            <i class="phone"></i>
            <span>400-823-1517</span>
        </div>-->
        <ul class="dashboard-nav">
           

            <li class="spt-li spt-dropdown nav-li">
                <a href="/Home/Index/index/support.html?from=topnav" title="用户中心" target="_blank">
                <i class="head-icon spt"></i>用户中心</a>
                <i class="head-icon u-arrow"></i>
                <ul class="spt-dropdown-list">
                    <li>
                        <ul>
                            <li class="spt-doc">
                                <a href="/Home/Index/">
                                    <i class="doc-icon"></i>
                                    <p>文档</p>
                                </a>
                            </li>
                            <li class="spt-question">
                            <a href="/Home/Index/">
                                    <i class="question-icon"></i>
                                    <p>常见问题</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="spt-btn">
                        <a href="/Home/Index/logout" class="btn btn-info"><i class="workorder"></i>退出登录</a>
                    </li>
                </ul>
            </li>
            
        </ul>
    </div>
</div>

<div id="page-contact-btn">
    <a id="delete-contact" href="javascript:void(0);"><img src="/Public/controller_files/close_contact.png"></a>
    <ul class="contact-ul">
               
        <li class="contact-li qrcode">
            <a class="contact-item qrcode-item" href="javascript:void(0);"></a>
            <div class="qrcode-box">
                <img src="/Public/me.jpg" alt="SinaAppEngine">
                <p>有问题？找TA</p>
            </div>
        </li>
        <li class="contact-li go-top" id="page-go-top" style="bottom: 100px; left: 1312.953125px; display: none;">
            <a class="contact-item go-top-item" href="javascript:void(0);"></a>
        </li>
    </ul>
</div>

</div>

<!-- 模块内容:开始 -->
<div class="row-fluid page-wrap" id="vermng-page">
    <!-- 侧边栏:开始 -->
    <div id="app-page">
    <div class="row">
       
       
       ﻿<!--侧边导航栏开始active  CSS活跃-->
<div class="span2" id="sidebar-wrap" style="height: 979px;">
        <div id="sidebar-new" class="sidebar">
            <ul class="dropTop"> 
            <a href="http://weixin.yudw.com/home/index/controller"><li class="main"><i class="sidebar-back"></i>返回</li> </a>
            <a href="http://weixin.yudw.com/home/index/controller"> <li class="main "><i class="sidebar-whole"></i>总览</li> </a> 
            <a href="http://weixin.yudw.com/home/index/controller"> <li class="main "><i class="sidebar-whole"></i>代码管理</li> </a> 
             <a href="http://weixin.yudw.com/home/index/images"> <li class="main "><i class="sidebar-whole"></i>图片管理</li> </a> 
             <a href="http://weixin.yudw.com/home/index/db"> <li class="main "><i class="sidebar-whole"></i>数据库管理</li> </a> 
            
            </ul>      
       </div>
</div>
       
       
       
       
        <div class="span10">
        <div class="title-box">
                   
        <ul class="app-choose">
            <li><a class="dropdown-toggle" data-toggle="dropdown" href="http://weixin.yudw.com/home/index/controller"><?php echo ($controller_name); ?></a>
            <ul class="dropdown-menu " role="menu" aria-labelledby="dropdownMenu">
                    <li class="first">我的应用</li>
                                                                                                </ul>
                            </li>
            <li>web应用</li>
        </ul>
        <ul class="app-profile">
                        <li class="modify"><span class="label label-success">正常（永久有效）</span></li>
                        <li class="introduction"></li>
        </ul>
        
    </div>
        </div>
        <!--侧边导航栏结束-->
        <script type="text/javascript" src="/Public/controller_files/sidebar.js"></script>


<!-- 右侧主要内容:开始 -->
<div class="span10" id="main">
    <div class="border-box">
        <div class="border-box-inner">
            <div class="svn-create">
                <strong> <a id="txtShow" class=" btn btn-primary" >+ 创建新文件</a>  </strong>
            </div>
                        <div class="row-fluid progress-bar">
                                <div class="span12  new-level">
                    <!-- progress   progress-success quota-l  -->
                    <div class="" id="disk-space">
                        <div class="bar bar-success quota-bar" style="width: 0%;"></div>
                        <span class="usage_hint" id="used">统统免费，不管用多少，永久免费！妈妈再也不担心我没有 云豆 啦！！！ 
                        </span>
                    </div>
                   
                    <div class="pay-ds" id="disk-space" style=" margin-top:-5px;">
                        <div class="bar bar-success quota-bar" style="width: 0%;"></div>
                        <div style="float:right;"> <a href="/Home/Index/public/intention.html?from=mysql&intention_level=5" target="_blank">升级企业版获得更大空间</a></div>
                    </div>
                </div>
                            </div>
            <table class="table table-bordered new-mem" id="version-table">
                <thead class="bread">
                    <tr>
                        <th class="set-default code1">文件名</th>
                        <th class="code2">文件最近修改时间</th>
                        <th class="app-url code3">文件链接</th>
                                                
                       
                        <!-- <th class="show-error code6">代码编辑</th>-->
                         <th class="extra-opt code7">操作</th>
                     </tr>
                </thead>
                <tbody>
                      <?php if(is_array($alltable)): foreach($alltable as $key=>$v): ?><tr data-id="2266551" data-xhprof="0" data-debug="1" data-appname="fu888" data-version="1">
                        <td>
                            <span><?php echo ($v["file_name"]); ?>.php</span>
                        </td>
                        <td>
                            <span><?php echo ($v["update_time"]); ?></span>
                        </td>
                        <td class="app-url">
                        <a class="app-url" href="http://weixin.yudw.com/uid/<?php echo ($controller_id); ?>/<?php echo ($v["file_name"]); ?>.php" target="_blank"><code>http://weixin.yudw.com/uid/<?php echo ($controller_id); ?>/<?php echo ($v["file_name"]); ?>.php</code></a>
                        </td>
                                                
                      
                       <td class="extra-opt">
                        <a href="/Home/Index/editor/file_id/<?php echo ($v["file_id"]); ?>" class="">编辑此文件代码</a>
                        </td>
                      </tr><?php endforeach; endif; ?>
                      
                      
                        </tbody>
        </table>
            </div>
</div>

<!--<h2>内容加速</h2>-->
<!--<div class="border-box" id="cdn_info">-->
    <div class="border-box-inner">
        <div class="alert clear-margin">
                        <p><i class="icon-info-sign"></i><span class="tip">这是盗版的。</span>
            请支持正版。
            </p>
                    </div>
    </div>
    <!-- 
<h2>SVN仓库信息</h2>
<div class="row">
    <div class="span4">
        <table class="table table-bordered">
            <tbody>
                <tr>
                    <td class="text-right">用户ID</td>
                    <td><?php echo ($controller_id); ?></td>
                </tr>
                <tr>
                    <td>用户名</td>
                    <td><?php echo ($controller_name); ?></td>
                </tr>
                <tr>
                    <td>密码</td>
                    <td>您的安全密码 <a href="/Home/Index/" target="_blank"><i class="icon-question-sign"></i>忘记密码?</a></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
 -->
 
 <h2>盗版新浪云系统公告及使用说明</h2>


<table class="table table-bordered new-mem" id="version-table">
                <thead class="bread">
                    <tr>
                        <th class="set-default code1">使用教程</th>
                        <th class="code2">代码在这里</th>
                        
                     </tr>
                </thead>
                <tbody>
                     
                      <tr>
                        <td>
                            <span>测试号的配置文件index.php代码</span>
                        </td>
                        <td>
                            <span><a href="http://weixin.yudw.com/wendang/index.txt" target="_blank">微信公众号后台的index.php代码</a></span>
                        </td>
                      </tr>
                      <tr>
                        <td>
                            <span>获取accesstoken代码</span>
                        </td>
                        <td>
                            <span><a href="http://weixin.yudw.com/wendang/accesstoken.txt" target="_blank">微信公众号获取accesstoken.php代码</a></span>
                        </td>
                      </tr>
                      <tr>
                        <td>
                            <span>创建测试号自定义菜单</span>
                        </td>
                        <td>
                            <span><a href="http://weixin.yudw.com/wendang/creatmenu.txt" target="_blank">微信公众号创建菜单的creatmenu.php代码</a></span>
                        </td>
                      </tr>
                      <tr>
                        <td>
                            <span>公众号访客点击统计结果</span>
                        </td>
                        <td>
                            <span><a href="http://weixin.yudw.com/wendang/tongji.txt" target="_blank">访客点击统计结果的tongji.php代码(文件命名随意)</a></span>
                        </td>
                      </tr>
                      
                      

             </tbody>
        </table>

   

</div>

</div>



</div>


</div></div>

</body></html>