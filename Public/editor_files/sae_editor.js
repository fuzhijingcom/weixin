//SAE editor 
var cm_list = [];
var sae_glvar={
    "tabbar_margin":0,
    'exmenu_maxheight':140,
    'isCtrl':false,
    'isAlt':false,
    'ctrlDownTime':0,
    'leaveconfirm':false,
    'cur_tab_i':0
};

$(function() {
    autoSize();
    $(document).click(function(e) {
        if(!$(e.target).is('div.name')){
            $("#exmenu").hide();
        }
    });

    // 检查是否设置了编辑器字体大小
    if ($.cookie('editor-fontSize')) {
        $('#codearea').css('font-size', $.cookie('editor-fontSize') + 'px');
    }

    $(window).resize(function() {
        autoSize();
    });

    // 调整shell终端的大小
    function resize_iframe()
    {
        var w = $('.content').width();
        var h = $('#sdk_console_container').height() - $('#sdk-toolbar').height();
        $('#web-terminal').height(h);
        $('#web-terminal').width(w);
        return true;
    }
    
    // 拖拽
    // 如果存在web终端
    if ($('#sdk_console_container').length) {
        resize_iframe();
        var oBox = document.getElementById('eright'), oBottom = document.getElementById("sdk_console_container"), oLine = document.getElementById("sdk-line");  
        var codearea = document.getElementById('codearea');
        oLine.onmousedown = function(e) {  
            var disY = (e || event).clientY;  
            oLine.top = oLine.offsetTop;  
            //oBottom.height = $(window).height() - e.clientY;
            //autoSize();
            document.onmousemove = function(e) {  
                var iT = oLine.top + ((e || event).clientY - disY); 
                //var maxT = oBox.clientHeight - oLine.offsetHeight;  
                var maxT = 700;  
                oLine.style.margin = 0;  
                iT < 0 && (iT = 0);
                iT < 250 && (iT = 250);
                iT > maxT && (iT = maxT);  
                //oLine.style.top = oBottom.style.top = iT + "px";
                codearea.style.height = (iT - 4 - $('#naviarea').position().top) + 'px';
                oLine.style.top = iT + "px";
                oBottom.style.height = ($(window).height() - iT) + 'px';
                resize_iframe();
                return false  
            };  
            document.onmouseup = function() {  
                document.onmousemove = null;  
                document.onmouseup = null;  
                oLine.releaseCapture && oLine.releaseCapture()  
            };  
            oLine.setCapture && oLine.setCapture();  
            return false;
        };       
    }

    //前一个文件
    $("#prefile").click(function(){
        var tabs = $(".tab").size();
        var tabw = $(".tab").width()+1;
        var max_margin = (tabs-1)  * tabw;
        sae_glvar.tabbar_margin -= tabw;
        sae_glvar.tabbar_margin = sae_glvar.tabbar_margin < (-1 * max_margin)?-1 * max_margin:sae_glvar.tabbar_margin;
        $("#tabbar").animate({'margin-left': sae_glvar.tabbar_margin+'px'}, "slow");
    });

    //下一个文件
    $("#nextfile").click(function(){
        var tabw = $(".tab").width()+1;
        sae_glvar.tabbar_margin += tabw;
        sae_glvar.tabbar_margin = sae_glvar.tabbar_margin>0?0:sae_glvar.tabbar_margin;
        $("#tabbar").animate({'margin-left': sae_glvar.tabbar_margin+'px'}, "slow");
    });

    $("#show_hide_filelist").click(function(){
        var txt = $.trim($(this).text());
        if(txt=='《'){
            $(".eleft").hide();
            $(".eright").width($(".eright").width()+230);
            $(this).text('》');
        }else{
            $(".eright").width($(".eright").width()-230);
            $(".eleft").show();
            $(this).text('《');
        }

    });

    //更改应用
    $("#select_applist").change(function() {
        var appname = $(this).val();
        if(appname!=sae_glvar.appname){
            $("#newapplink").attr("href","index.php?appname="+appname).click();
            window.open("index.php?appname="+appname);
            $(this).val(sae_glvar.appname);
        }
    });

    //更改版本
    $("#select_versionlist").change(function() {
        var version = $(this).val();
        $("span#title_version span").text(version);
        $("#pathlist").html('<option value="'+version+'/">'+'/'+'</option>');
        getDir(version+'/','/');
    });

    //更改目录
    $("#pathlist").change(function() {
        var path = $(this).val();
        var name = $(this).find('option:selected').text();
        getDir(path,name);
    });

    //初始化对话框
    $( "#dlg1" ).dialog({
        autoOpen: false,
        height: 140,
        modal: true
    });

    //创建文件夹
    $("#createfolder_icon").click(function(){
        createDir();
    });

    //创建文件
    $("#createfile_icon").click(function(){
        createFile();
    });

    //上传文件
    $("#uploadfile_icon").click(function(){
        uploadFile();
    });

    //快捷键
    $(document).keyup(function(e){

        if(e.which == 17 || e.which== 224){
            sae_glvar.isCtrl = false;
        }

    }).keydown(function(e){


        if(e.which == 17 || e.which== 224){
            sae_glvar.isCtrl = true;
            sae_glvar.ctrlDownTime = Date.parse(new Date());
            return false;
        }

        //Ctrl + s
        if(sae_glvar.isCtrl==true){
            var curtime = Date.parse(new Date());
            var timedf = curtime-sae_glvar.ctrlDownTime;
            if(e.which == 83 && timedf<=2000){
                var tabi = $('#tabbar div.cur_tab').attr('tabi');
                saveFile(tabi);
                return false;
            }
        }
    });

    //未保存提示
    window.onbeforeunload = function (e) {

          e = e || window.event;

          if(!checksave() && !sae_glvar.leaveconfirm){
              // For IE and Firefox prior to version 4
              if (e) {
                  e.returnValue = '代码尚未保存。';
              }
              // For Safari
              return '代码尚未保存！';
          }
    };


});

function autoSize() {
    //高
    var win_h = $(window).height();
    var naviarea_pos = $('#naviarea').position();
    var h = win_h - naviarea_pos.top;
    //$('#naviarea').height(h);
    if ($('#sdk_console_container').length) {
        $('#codearea').height(h - $('#sdk_console_container').height() - 4);
    } else {
        $('#codearea').height(h);
    }
    $('#filelist').height(h-$('.applistbar').height());
    //$('#codearea').height(h);
    $('.codecontainer').height(h);
    //$("#tabbarcontainer").width($("#codearea").width()-39);

    //编辑器高度
    if(cm_list[sae_glvar.cur_tab_i]){
        var width = $(window).width() - $('.eleft').width();
        cm_list[sae_glvar.cur_tab_i].setSize(width, h);
        $('#codearea').width(width + 20);
        //$('#tabbarcontainer').width(width);
        if ($('#sdk_console_container').length) {
            $('#web-terminal').width(width);
        }
    }

    //宽
    var win_w = $(window).width();
    var right_width = win_w - $("div.eleft").width();
    $("div.eright").width(right_width);
    $("#tabbarcontainer").width(right_width - 50);
}

function getDir(path,name){
    //根目录取应用列表
    if(!path) path = "/";
    if(!name) name = "/";
    var pdata = {"appname":sae_glvar.appname,"path":path};
    $.post("svn.php?a=getdir",pdata,function(resp) {
        if(resp.status=='ok'){
            renderFileTree(resp.rs);
            if ($("#pathlist option").is("[value='" + path + "']")) {
                $("#pathlist option[value='" + path + "']").nextAll().remove();
            } else {
                $("#pathlist").append('<option value="' + path + '">' + name + '</option>');
            }
            $("#pathlist").val(path);
        }else{
            alert(resp.msg);
        }
    },'json');

}

function renderFileTree(data) {

    //清空当前列表和状态
    $("#filetree").empty();
    $("#selected_bg,#exmenu").hide();

    //生成列表
    for (var i = 0; i < data.length; i++) {
        var file = data[i];
        var li_class = "";
        if (file.type == 'file') {
            li_class = "file";
        } else {
            li_class = "dir_close";
        }
        var entry = $('<li class="' + li_class + '" title="'+file.name+'"><div class="name" path="' + file.fullpath + '" editable="'+file.editable+'" url="'+file.url+'">' + file.name + '</div></li>');
        $("#filetree").append(entry);
    }

    //加载事件
    //点击选中
    $("ul.tree li div").click(function(event) {
        event.stopPropagation();
        $("div.selected").removeClass("selected");
        $(this).addClass("selected");
        var pos = $(this).position();
        var offset = $(this).offset();
        $("#selected_bg").css("top", pos.top + "px").show();
        $("#exmenu").hide();
        return false;
    });
    //右键
    $("ul.tree li div").bind('contextmenu',function(event) {
    //$("ul.tree li div").click(function(event) {
        event.stopPropagation();
        $("div.selected").removeClass("selected");
        $(this).addClass("selected");
        var pos = $(this).position();
        var offset = $(this).offset();
        $("#selected_bg").css("top", pos.top + "px").show();
        $("#exmenu").empty();
        if ($(this).closest('li').not('.block')) {
            var path = $(this).attr("path");
            var editable = $(this).attr("editable");
            var url = $(this).attr("url");
            var filename = $(this).text();
            var exhtml = "";
            if ($(this).closest('li').is('.dir_close')) {
                exhtml += '<div class="entry" onclick="getDir(\'' + path + '\',\'' + filename + '\')">打开</div>';
                exhtml += '<div class="split"> <div class="line"></div> </div>';
                exhtml += '<div class="entry" onclick="delDir(\'' + path + '\')">删除</div>';
            } else if ($(this).closest('li').is('.file')){
                if(editable && editable=='true'){
                    exhtml += '<div class="entry" onclick="getFile(\'' + path + '\')">编辑</div>';
                }
                exhtml += '<div class="entry" onclick="visitFile(\'' + url + '\')">通过URL访问</div>';
                exhtml += '<div class="split"> <div class="line"></div></div>';
                exhtml += '<div class="entry" onclick="delFile(\'' + path + '\')">删除</div>';
            }
            $("#exmenu").html(exhtml);
            $("#exmenu .entry").mouseover(function() {
                $(this).addClass("selected");
            }).mouseout(function() {
                $(this).removeClass("selected");
            });
            var win_h = $(window).height();
            var exmenu_top = 0;
            var exmenu_left = event.pageX + 20;
            $("#exmenu").show();
            var exmenu_h = $("#exmenu").outerHeight();
            if(event.pageY+exmenu_h>win_h){
                exmenu_top = event.pageY - exmenu_h;
            }else{
                exmenu_top = event.pageY;
            }
            $("#exmenu").css("top", exmenu_top + "px").css("left", exmenu_left);
        }
        return false;

    });

    //双击打开文件夹
    $("ul.tree li.dir_close div").dblclick(function() {
        var name = $(this).text();
        var path = $(this).attr("path");
        getDir(path,name);
    });

    //文件双击
    $("ul.tree li.file div").dblclick(function() {
        var name = $(this).text();
        var path = $(this).attr("path");
        var editable = $(this).attr("editable");
        var url = $(this).attr("url");
        if(editable && editable=='true'){
            getFile(path);
        }else{
            visitFile(url);
        }
    });	
}

function createDir(){
    $("#dlg1").empty().dialog('option','title','请输入文件夹名');
    var newobj = $('<div style="margin-top:10px;"><input type="text" name="newname" />&nbsp;&nbsp;<input type="button" name="btn001" value=" 确定 "/>&nbsp;&nbsp;<img src="static/image/sae_editor/z.gif" width="16" height="16" class="loader" /></div>');
    newobj.find('input[name="newname"]').keydown(function(e){
        if(e.which==13){
            newobj.find('input[name="btn001"]').click();   
            newobj.find('img').focus();
        }
    });
    newobj.find('input[name="btn001"]').click(function(){
        var dirname = $.trim($(this).prev().val());
        var btn = this;
        if(checkname(dirname,'文件夹')!='ok'){
            alert(checkname(dirname,'文件夹'));
            newobj.find('input[name="newname"]').focus();
            return;
        }
        $(btn).attr("disabled","disabled").next('img.loader').addClass('loading_img');
        var fullpath = $("#pathlist").val()+"/"+dirname;
        var pdata = {"appname":sae_glvar.appname,"path":fullpath};
        $.post("svn.php?a=createDir",pdata,function(resp) {
            if(resp.status=='ok'){
                var path = $("#pathlist").val();
                var name = $("#pathlist").find('option:selected').text();
                getDir(path,name);
                $("#dlg1").dialog('close');
            }else{
                alert(resp.msg);
                newobj.find('input[name="newname"]').focus();
            }
            $(btn).removeAttr("disabled").next('img.loader').removeClass('loading_img');
        },'json');
    
    });
    $("#dlg1").append(newobj).dialog('open');;
}

function delDir(path){
    $("#exmenu").hide();
    if(confirm('确认要删除"'+path+'"吗？')){
         var pdata = {"appname":sae_glvar.appname,"path":path};
         $.post("svn.php?a=deldir",pdata,function(resp) {
            if(resp.status=='ok'){
                var path = $("#pathlist").val();
                var name = $("#pathlist").find('option:selected').text();
                getDir(path,name);
                $("#dlg1").dialog('close');
            }else{
                alert(resp.msg);
            }
       },'json');
    }
}

// js加载文件
function jsRequire(url) {
    var ajax = new XMLHttpRequest();
    ajax.open( 'GET', url, false ); // <-- the 'false' makes it synchronous
    ajax.onreadystatechange = function () {
        var script = ajax.response || ajax.responseText;
        if (ajax.readyState === 4) {
            switch( ajax.status) {
                case 200:
                    eval.apply( window, [script] );
                    console.log("script loaded: ", url);
                    break;
                default:
                    console.log("ERROR: script not loaded: ", url);
            }
        }
    };
    ajax.send(null);
}

function getFile(path) {
    $("#exmenu").hide();
    var pdata = {"appname":sae_glvar.appname,"path":path};
    $.post("svn.php?a=getfile",pdata,function(resp) {
        if (resp.status!='ok') {
            alert(resp.msg);
        } else {
            var mode = resp.rs.mode;
            var mode_loaded = false;
            // 检查mode文件是否已经加载
            for (var t in CodeMirror.modes) {
                if (t == mode) {
                    mode_loaded = true;
                    break;
                }
            }
            if (!mode_loaded) {
                // 拼接文件路径
                var file = '/static/codemirror/mode/'+ mode +'/'+ mode +'.js';
                jsRequire(file);
            }
            if($("#tabbar div.tab").is("[path='"+path+"']")){
                var tabi = $("#tabbar div.tab[path='"+path+"']").attr('tabi');
                show_cm(tabi);
                return false;
            }
            var i = cm_list.length;
            var tab = $('<div class="tab bodr_r cur_tab" id="tab_' + i + '" path="'+path+'" tabi="'+i+'"> <span class="title">'+path+'</span> <span class="icon"><a href="#"><img src="static/image/sae_editor/z.gif" width="10" height="10" class="close_icon" /></a></span><div class="clr"></div></div>');
            tab.click(function() {
                var tabi = $(this).attr('tabi');
                show_cm(tabi);
            });
            tab.find("span.icon img").click(function() {
                var tabi = $(this).closest('div').attr('tabi');
                if ($(this).is(".close_icon")) {
                    cloaseFile(tabi);
                } else {
                    saveFile(tabi);
                }
            });
            $("#tabbar").prepend(tab);
            var codecontainer = $('<div class="codecontainer" id="codecontainer_' + i + '" tabi="'+i+'" style="display:block;"></div>');
            var h = $('#codearea').height();
            codecontainer.height(h);
            codecontainer.click(function() {
                var tabi = $(this).attr('tabi');
                ind = parseInt(tabi);
                cm_list[tabi].focus();
            });
            $("#codearea").prepend(codecontainer);
            cm_list[i] = CodeMirror(document.getElementById('codecontainer_' + i), {
                value: resp.rs.code,
                mode: resp.rs.mode,
                theme: "cobalt",
                indentUnit: 4,
                tabSize: 4,
                lineNumbers: true,
                enterMode : "keep",
                onChange: function(cm) {
                    $("#tabbar #tab_" + cm.tabi + " span.icon img").removeClass("close_icon").addClass("save_icon");
                    cm_list[i].savestatus = 'unsave';
                }
            });
            cm_list[i].on('change',function(cm){
                $("#tabbar #tab_" + cm.tabi + " span.icon img").removeClass("close_icon").addClass("save_icon");
                cm_list[i].savestatus = 'unsave';
            });
            cm_list[i].tabi = i;
            cm_list[i].savestatus = 'saved';
            cm_list[i].filepath = path;
            show_cm(i);
            cm_list[i].focus();
        }

    },'json');
}

function createFile(){
    $("#dlg1").empty().dialog('option','title','请输入文件名');
    var newobj = $('<div style="margin-top:10px;"><input type="text" name="newname" />&nbsp;&nbsp;<input type="button" name="btn001" value=" 确定 "/>&nbsp;&nbsp;<img src="static/image/sae_editor/z.gif" width="16" height="16" class="loader" /></div>');
    newobj.find('input[name="newname"]').keydown(function(e){
        if(e.which==13){
            newobj.find('input[name="btn001"]').click();   
            newobj.find('img').focus();
        }
    });
    newobj.find('input[name="btn001"]').click(function(){
        var dirname = $.trim($(this).prev().val());
        var btn = this;
        if(checkname(dirname,'文件')!='ok'){
            alert(checkname(dirname,'文件'));
            newobj.find('input[name="newname"]').focus();
            return;
        }
        var fullpath = $("#pathlist").val()+"/"+dirname;
        $(btn).attr("disabled","disabled").next('img.loader').addClass('loading_img');
        var pdata = {"appname":sae_glvar.appname,"path":fullpath};
        $.post("svn.php?a=createfile",pdata,function(resp) {
            if(resp.status=='ok'){
                var path = $("#pathlist").val();
                var name = $("#pathlist").find('option:selected').text();
                getDir(path,name);
                $("#dlg1").dialog('close');
            }else{
                alert(resp.msg);
                newobj.find('input[name="newname"]').focus();
            }
            $(btn).removeAttr("disabled").next('img.loader').removeClass('loading_img');
        },'json');

       
    
    });
    $("#dlg1").append(newobj).dialog('open');;
}

function renFile(path) {

    $("#exmenu").hide();
    $("#dlg1").empty().dialog('option','title','请输入文件名');
    var newobj = $('<div style="margin-top:10px;"><input type="text" name="newname" />&nbsp;&nbsp;<input type="button" name="btn001" value=" 确定 "/>&nbsp;&nbsp;<img src="static/image/sae_editor/z.gif" width="16" height="16" class="loader" /></div>');
    newobj.find('input[name="newname"]').keydown(function(e){
        if(e.which==13){
            newobj.find('input[name="btn001"]').click();   
            newobj.find('img').focus();
        }
    });
    newobj.find('input[name="btn001"]').click(function(){
        var filename = $.trim($(this).prev().val());
        var btn = this;
        if(checkname(filename,'文件')!='ok'){
            alert(checkname(filename,'文件'));
            newobj.find('input[name="newname"]').focus();
            return;
        }
        var newpath = $("#pathlist").val()+"/"+filename;
        $(btn).attr("disabled","disabled").next('img.loader').addClass('loading_img');
        var pdata = {"appname":sae_glvar.appname,"oldpath":path,"newpath":newpath};
        $.post("svn.php?a=renfile",pdata,function(resp) {
            if(resp.status=='ok'){
                var path = $("#pathlist").val();
                var name = $("#pathlist").find('option:selected').text();
                getDir(path,name);
                $("#dlg1").dialog('close');
            }else{
                alert(resp.msg);
                newobj.find('input[name="newname"]').focus();
            }
            $(btn).removeAttr("disabled").next('img.loader').removeClass('loading_img');
        },'json');
    });
    $("#dlg1").append(newobj).dialog('open');
}

function saveFile(tabi){
    if(cm_list[tabi].savestatus=="saved"){ 		
        return false;
    }
    var path = cm_list[tabi].filepath;
    var code = cm_list[tabi].getValue();
    var postdata = {'appname':sae_glvar.appname,'path':path,'code':code};
    $("#tab_" + tabi).find("span.icon img").removeClass("save_icon").addClass("loading_icon");
    $.ajax({
        type: 'POST',
        url: 'svn.php?a=savefile',
        data: postdata,
        dataType: 'json',
        success: function(resp){
            if(resp.status=='ok'){
                $("#tab_" + tabi).find("span.icon img").removeClass("loading_icon").addClass("close_icon");
                cm_list[tabi].savestatus = 'saved';
                $("#opmsg").html("保存成功！").fadeIn('slow').delay(2000).fadeOut();
            }else{
                $("#tab_" + tabi).find("span.icon img").removeClass("loading_icon").addClass("save_icon");
                if(resp.msg.indexOf('文件不存在')>=0){
                    if(confirm('您所操作的文件已被删除或重命名，是否创建文件？点取消将放弃保存！')){
                        var pdata = {"appname":sae_glvar.appname,"path":path};
                         $.post("svn.php?a=createfile",pdata,function(rsp1) {
                            if(rsp1.status=='ok'){
                                saveFile(tabi);
                            }else{
                                alert(rsp1.msg);
                            }
                        },'json');
                    }else{
                        cloaseFile(tabi);
                    }
                
                }else{
                    alert(resp.msg);
                
                }
            }
        } 
    });
}

function saveAll(){
    for(var i=0;i<cm_list.length;i++){
        if(cm_list[i]=="closed") continue;		
        if(cm_list[i].savestatus=="saved") continue;		
        saveFile(i);
    }
}

function delFile(path) {
    $("#exmenu").hide();
    if(confirm('确认要删除"'+path+'"吗？')){
        var pdata = {"appname":sae_glvar.appname,"path":path};
        $.post("svn.php?a=delfile",pdata,function(resp) {
            if(resp.status=='ok'){
                var path = $("#pathlist").val();
                var name = $("#pathlist").find('option:selected').text();
                getDir(path,name);
                $("#dlg1").dialog('close');
            }else{
                alert(resp.msg);
            }
        },'json');
    }
}


function visitFile(url) {
    $("#exmenu").hide();
    window.open(url);
}

// 设置编辑器的字体大小
function fontSize()
{
    $("#exmenu").hide();
    $("#dlg1").empty().dialog('option','title','高级设置');
    var html = '<div style="margin-top:10px;"><label for="number">选择编辑器字体大小</label><select name="number" id="number">';
    var c_size = $('.CodeMirror-line').css('font-size');
    c_size = parseInt(c_size);
    for (var i = 12; i < 23; i++) {
        if (i == c_size) {
            html += '<option selected="selected" value="'+i+'">'+i+'px</option>';
        } else {
            html += '<option selected="selected" value="'+i+'">'+i+'px</option>';
        }
    }
    html += '</select><br/><input type="button" name="btn001" value="设置"/></html>';
    var newobj = $(html);
    newobj.find('input[name="btn001"]').click(function(){
        var pix = $('#number').val();
        $('#codearea').css('font-size', pix + 'px');
        $.cookie('editor-fontSize', pix);
    });
    $("#dlg1").append(newobj).dialog('open');
}

function uploadFile()
{
    $("#exmenu").hide();
    $("#dlg1").empty().dialog('option','title','请选择文件');
    var newobj = $('<div style="margin-top:10px;"><input type="file" id="file1" name="file1" /><br/><input type="button" name="btn001" value=" 上传 "/></div>');

    newobj.find('input[name="btn001"]').click(function(){

        var path = $("#pathlist").val();
        var fmdata = {'path':path};

        $.ajaxFileUpload({
            url:'svn.php?appname='+sae_glvar.appname+'&a=uploadfile', 
            secureuri:false,
            fileElementId:'file1',
            dataType: 'json',
            data: fmdata,
            success: function(resp, status){

                if(resp.status=='ok'){
                    var path = $("#pathlist").val();
                    var name = $("#pathlist").find('option:selected').text();
                    getDir(path,name);
                    $("#dlg1").dialog('close');
                }else{
                    alert(resp.msg);
                }

            },
            error: function(data, status, e){
               alert(e);
            }
        });

    });

    $("#dlg1").append(newobj).dialog('open');

}

function show_cm(i){
    var tabi = parseInt(i);
    sae_glvar.cur_tab_i=tabi;
    $(".codecontainer").hide();
    $(".cur_tab").removeClass("cur_tab");
    $("#tab_"+tabi).addClass("cur_tab");
    $("#codecontainer_" + tabi).show();
    autoSize(); 
    cm_list[tabi].focus();
}

function cloaseFile(tabi){
    $("#tab_" + tabi).remove();
    $("#codecontainer_" + tabi).remove();
    cm_list[tabi] = 'closed';
}

function checkname(name,type){
    name = $.trim(name);
    if(name==''){
        return type+"名不能为空";
    }
    var reg = new RegExp("[/\\\\]");
    if(reg.test(name)){
        return type+"名不合法"
    }
    return 'ok';
}

function checksave(){

    for(var i=0;i<cm_list.length;i++){
        if(cm_list[i].savestatus=="unsave"){
            return false;
        }		
    }
    return true;
}

function logout(){
    if(checksave()||confirm("有文件未保存，确认离开？")){
        sae_glvar.leaveconfirm = true;
        window.location="logout.php";
    }else{
        return ;
    }

}

function new_tab(i){

}

function new_cm(i){

}

