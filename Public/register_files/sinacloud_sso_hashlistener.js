var t = Date.parse(new Date());
setInterval(function(){
    var hash = self.location.hash;
    hash = hash.replace('#','');
    if(hash.indexOf('|')>0){
        var hashlist = hash.split("|");
        var tt = parseInt(hashlist[0]);
        var jscode = hashlist[1];
        if(tt>t && (jscode == 'checklogin' || jscode == 'logoutcallback')){
            eval("window.top.scsso."+jscode+"()");
        }
        t = tt;
    }
},500);
