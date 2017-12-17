

<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0">
    <title>提交成功</title>
    <link rel="stylesheet" href="http://cdn.yudw.com/weui/weui.css"/>
<style type="text/css">
body{background-color:#efeff4;-webkit-tap-highlight-color:transparent;-webkit-user-select:none;-moz-user-select:none;-ms-user-select:none;user-select:none
}

.container {
padding-bottom: 20px
}

.weui-cells_checkbox>.weui-cell>* {
pointer-events: none
}

.list__textarea-label_1IUds {
float: left;
color: #222;
margin-bottom: 10px
}

.list__no-arrow_1QzDq:after {
display: none!important
}

.list__warn_qnkn9 {
color: #e64340!important
}

a.weui-cell {
color: #222
}

.weui-cell__ft {
font-size: 0
}

.zh_CN .weui-cell__ft,.zh_HK .weui-cell__ft,.zh_TW .weui-cell__ft {
font-size: 17px}

.comment__textarea-label_3n9Pv{float:left;color:#222;margin-bottom:10px}

</style>
</head>
<body>
<?
$id = $_GET['id'];
?> 

     
    






<?php 
//session_start();
$id = $_GET['id'];



$filename = "/home/wwwroot/weixin.yudw.com/uid/1/index.php";


$handle = fopen($filename, "w"); 
$text = $_POST['file_contents']; 
if(fwrite($handle, $text) == FALSE){ 
  echo '<span class="redtxt">保存失败</span>'; 
}else{ 

?>

  <div id="container" class="container"><div class="zh_CN"><div class="weui-msg">
    <div class="weui-msg__icon-area">
        <i class="weui-icon-success weui-icon_msg"></i>
    </div>
    <div class="weui-msg__text-area">
        <h2 class="weui-msg__title">保存成功</h2>
        <p class="weui-msg__desc">你的代号是：<?php echo $id; ?></p>
    </div>
  
    <div class="weui-msg__opr-area">
        <p class="weui-btn-area">
	<a href="http://weixin.yudw.com/edit.php?id=<?php echo $id;?>" class="weui-btn weui-btn_primary" id="close">返回，继续编辑PHP文件</a>
        </p>
    </div>


<?php

} 
fclose($handle); 

?>

</div></div></div>
<div style="display:none">
<script type="text/javascript">var cnzz_protocol = (("https:" == document.location.protocol) ? " https://" : " http://");document.write(unescape("%3Cspan id='cnzz_stat_icon_3790269'%3E%3C/span%3E%3Cscript src='" + cnzz_protocol + "s19.cnzz.com/stat.php%3Fid%3D3790269%26show%3Dpic' type='text/javascript'%3E%3C/script%3E"));</script>
</div>
</body></html>