var protocol = (("https:" == document.location.protocol) ? "https://" : "http://");
var scsso = {};
scsso.initstatus = false;
scsso.loginboxstatus = false;
scsso.baseurl = protocol + "www.sinacloud.com/";
scsso.ticket = null;
scsso.user = 0;
scsso.crossdomainproxy = null;
scsso.loginurl = "?m=sso";
scsso.logouturl = "?m=sso&a=logout";
scsso.pagelistener = "?m=sso&a=pagelistener";
scsso.checkloginviajs = "?m=sso&a=chkloginviajs";
scsso.browser = null;

scsso.logincallback = function(){};
scsso.logoutcallback = function(){};

scsso.logincallbackurl = null;
scsso.logoutcallbackurl = null;

//初始化
scsso.init = function(opt){
 
    scsso.browser = scsso.getbrowser();

    //用来做跨域交互的本地代理页，必须
    if(opt.crossdomainproxy){
        scsso.crossdomainproxy = opt.crossdomainproxy;
    }else{
        alert('(sso)请提供设置项：crossdomainproxy');
        return;
    }

    if(opt.baseurl){
        scsso.baseurl = opt.baseurl;
    }

    scsso.loginurl = scsso.baseurl + (opt.loginurl?opt.loginurl:scsso.loginurl);
    scsso.logouturl = scsso.baseurl + (opt.logouturl?opt.logouturl:scsso.logouturl);
    scsso.pagelistener = scsso.baseurl + (opt.pagelistener?opt.pagelistener:scsso.pagelistener);
    scsso.checkloginviajs = scsso.baseurl + (opt.checkloginviajs?opt.checkloginviajs:scsso.checkloginviajs);
    scsso.loginboxjs = scsso.baseurl + (opt.loginboxjs?opt.loginboxjs:scsso.loginboxjs);
    scsso.loginboxcss = scsso.baseurl + (opt.loginboxcss?opt.loginboxcss:scsso.loginboxcss);

    if(opt.logincallback){
        scsso.logincallback = opt.logincallback; 
    }

    if(opt.logoutcallback){
        scsso.logoutcallback = opt.logoutcallback;
    }

    if(opt.logincallbackurl){
        scsso.logincallbackurl = opt.logincallbackurl; 
    }

    if(opt.logoutcallbackurl){
        scsso.logoutcallbackurl = opt.logoutcallbackurl;
    }

    var url = scsso.pagelistener + "&url=" + encodeURIComponent(scsso.crossdomainproxy);
    scsso.iframeloader(url,'pagelistener_ifrm',0,0,'none',function(){});

    scsso.initstatus = true;
};

//微博登录框
scsso.login = function(callback){

    if(!scsso.initstatus){
        alert('初始化失败');
        return;
    }

    var cb = scsso.logincallbackurl?scsso.logincallbackurl:window.location.href;
    var logurl = scsso.loginurl + '&sccb=' + escape(cb);
    window.location.href = logurl;
    return ;

};

scsso.logout = function(rtn_url){

    window.location=scsso.logouturl+"&callback="+rtn_url;
};

//微博登录框
scsso.rebindlogin = function(rebind_sws_uid){

    if(!scsso.initstatus){
        alert('初始化失败');
        return;
    }

    var cb = escape(window.location.href);
    var logurl = scsso.loginurl + '&rbf=1&sccb=' + cb;
    window.location.href = logurl;
    return ;

};


//检查是否已经登录
scsso.checklogin = function(){
    if(!scsso.initstatus){
        alert('初始化失败');
        return;
    }
    scsso.jsloader(scsso.checkloginviajs + '&t=' + (new Date()).valueOf(),function(){
        if(scsso.ticket!=null){
            scsso.logincallback();
        }else{
            scsso.logoutcallback();
        }
    });
};

//通用工具方法
scsso.getCookie = function(l) {
    var i = "",
        I = l + "=";
    if (document.cookie.length > 0) {
        offset = document.cookie.indexOf(I);
        if (offset != -1) {
            offset += I.length;
            end = document.cookie.indexOf(";", offset);
            if (end == -1) end = document.cookie.length;
            i = unescape(document.cookie.substring(offset, end))
        }
    };
    return i
};
scsso.setCookie = function(O, o, l, I) {
    var i = "",
        c = "";
    if (l != null) {
        i = new Date((new Date).getTime() + l * 3600000);
        i = "; expires=" + i.toGMTString()
    };
    if (I != null) {
        c = ";domain=" + I
    };
    document.cookie = O + "=" + escape(o) + i + c
};
scsso.jsloader = function(path, callback) {
    try{
        var script = document.createElement('script');
        script.src = path;
        script.type = "text/javascript";
        document.getElementsByTagName("head")[0].appendChild(script);
        if( script.addEventListener ) {
            script.addEventListener("load", callback, false);
        } else if(script.attachEvent) {
            script.attachEvent("onreadystatechange", function(){
                if(script.readyState == 4 || script.readyState == 'complete' || script.readyState == 'loaded') {
                    callback();
                }
            });
        }
    }catch(e) {
        callback();
    }
};
scsso.cssloader = function(path,callback){
    try{
        var css = document.createElement('link');
        css.href = path;
        css.rel = 'stylesheet';
        css.type = 'text/css';
        document.getElementsByTagName("head")[0].appendChild(css);
        if( css.addEventListener ) {
            css.addEventListener("load", callback, false);
        } else if(css.attachEvent) {
            css.attachEvent("onreadystatechange", function(){
                if(css.readyState == 4 || css.readyState == 'complete' || css.readyState == 'loaded') {
                    callback();
                }
            });
        }
    }catch(e) {
        callback();
    }
};
scsso.iframeloader = function(path,id,w,h,display,callback){
    try{
        var iframe = document.createElement('iframe');
        iframe.src = path;
        iframe.scrolling="no";
        iframe.frameborder="no";
        iframe.width=w;
        iframe.height=h;
        iframe.style.display=display;
        document.getElementsByTagName("body")[0].appendChild(iframe);
        if( iframe.addEventListener ) {
            iframe.addEventListener("load", callback, false);
        }else if(iframe.attachEvent) {
            iframe.attachEvent("onreadystatechange", function(){
                if(iframe.readyState == 4 || iframe.readyState == 'complete' || iframe.readyState == 'loaded') {
                    callback();
                }
            });
        }
    }catch(e) {
        callback();
    }
};
scsso.getbrowser = function(){

    var ua = navigator.userAgent.toLowerCase();
    var browser = null;

    if(ua.match(/msie ([\d.]+)/)){
        browser = 'msie';
    }else if(ua.match(/firefox\/([\d.]+)/)){
        browser = 'firefox';
    }else if (s = ua.match(/chrome\/([\d.]+)/)){
        browser = 'chrome';
    }else if (s = ua.match(/opera.([\d.]+)/)){
        browser = 'opera';
    }else if (s = ua.match(/version\/([\d.]+).*safari/)){
        browser = 'safari';
    }

    return browser;

};
