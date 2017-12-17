<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0">
    <title>PHP文件在线编辑 - 微网站开发课堂</title>
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
 <div id="container" class="container"><div class="zh_CN"><div class="weui-msg">





<h2>正在编辑&nbsp;&nbsp;&nbsp;<?php echo ($file_name); ?>&nbsp;&nbsp;&nbsp;修改后点右下方保存</h2>


<form action="/Home/Index/save" method="post">
<textarea name="file_contents" style="width:900px;height:600px;">
<?php echo ($text); ?>
</textarea>
 <div class="weui-msg__opr-area">
        <p class="weui-btn-area">
<input type="submit" value="保存代码" name="original_file_name" class="weui-btn weui-btn_primary"/>

        </p>
    </div>

<input type="hidden" value="<?php echo ($file_id); ?>" name="file_id" />
</form>
powered by <?php echo ($controller_name); ?>
</div></div></div>
</body>
</html>