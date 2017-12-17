(function(){
    $('div[valid=true],form[valid=true]').each(function(){
        var inputs=$('input,textarea,select',this),topmax=0;
        $(window).resize(function(){
            for(var i=0,l=inputs.length;i<l;i++){
                inputs[i].err && ($(inputs[i].err).css(poTip(inputs[i],inputs[i].err)))
            }
        });

        $(this).data('valid',regValid);

        function regValid(){
            var inputs=$('input,textarea,select',this),
            i=inputs.length-1,
            ret=true;
            topmax=0;
            for(;i>=0;i--){
                if(!valid.call(inputs[i])){
                    ret=false;
                }
            }
            return ret
        }
        /*dele*/
        function dele(){
            $(this.err).remove();
            this.err=null;
        }
        /*验证*/
        function valid(){
            if(this.err){dele.call(this)}
            if(this.disabled || $(this).is(':hidden')){return true}
            if(this.rechecked&&this.value==this.rechecked.value){
                if(this.rechecked.err){dele.call(this.rechecked)}
            }
            var $this=$(this),
            pass=1,
            type=$this.attr('checktype')||'false',
            recheck=$this.attr('recheck')||'',
            err=$this.attr('errmsg')||'请输入正确信息',
            suc=$this.attr('sucmsg')||'验证通过',
            nul=$this.attr('nullmsg')||'请输入信息';
            if(recheck){
                for(var i=0,l=inputs.length;i<l;i++){
                    if(inputs[i].getAttribute('name')==recheck){
                        if(this.value!=inputs[i].value){
                            if(this.err){dele.call(this)}
                            this.err=showTip($this,err);
                            pass=0;
                        }
                        break
                    }
                }
            }
            if(type=='false'){return true}
            switch(type){
                case 'username':
                    if(this.value==''){
                        if(this.err){dele.call(this)}
                        this.err=showTip($this,nul);
                        pass=0;
                    }else if(!this.value.match(/^[a-zA-Z_]{1}[A-Za-z0-9_]{3,15}$/)){
                        if(this.err){dele.call(this)}
                        this.err=showTip($this,err);
                        pass=0;
                    }break;
                case 'mail':
                    if(this.value==''){
                        if(this.err){dele.call(this)}
                        this.err=showTip($this,nul);
                        pass=0;
                    }else if(!this.value.match(/^\w+((-\w+)|(\.\w+))*\@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z0-9]+$/)){
                        if(this.err){dele.call(this)}
                        this.err=showTip($this,err);
                        pass=0;
                    }break;
                case 'psw':
                    if(this.value==''){
                        if(this.err){dele.call(this)}
                        this.err=showTip($this,nul);
                        pass=0;
                    }else if(this.value.match(/[^A-Za-z0-9\.]/)||this.value.length<6||this.value.length>18){
                        if(this.err){dele.call(this)}
                        this.err=showTip($this,err);
                        pass=0;
                    }break;
                case 'phone':
                    if(this.value==''){
                        if(this.err){dele.call(this)}
                        this.err=showTip($this,nul);
                        pass=0;
                    }else if(!this.value.match(/^1(?:[34578]\d|4[57]|5[01256789])\d{8}$/)){
                        if(this.err){dele.call(this)}
                        this.err=showTip($this,err);
                        pass=0;
                    }break;
                case 'id':
                    var iSum=0,info="",aCity={11:"北京",12:"天津",13:"河北",14:"山西",15:"内蒙古",21:"辽宁",22:"吉林",23:"黑龙江 ",31:"上海",32:"江苏",33:"浙江",34:"安徽",35:"福建",36:"江西",37:"山东",41:"河南",42:"湖北 ",43:"湖南",44:"广东",45:"广西",46:"海南",50:"重庆",51:"四川",52:"贵州",53:"云南",54:"西藏 ",61:"陕西",62:"甘肃",63:"青海",64:"宁夏",65:"新疆",71:"台湾",81:"香港",82:"澳门",91:"国外 "};
                    if(this.value==''){
                        if(this.err){dele.call(this)}
                        this.err=showTip($this,nul);
                        pass=0;
                    }
                    if(!/^\d{17}(\d|x)|\d{15}$/i.test(this.value)){
                        if(this.err){dele.call(this)}
                        this.err=showTip($this,err);
                        pass=0;
                    }
                    if(this.value.length > 18){
                        if(this.err){dele.call(this)}
                        this.err=showTip($this,err);
                        pass=0;
                    }
                    var txt=this.value.replace(/x$/i,"a");
                    if(aCity[parseInt(txt.substr(0,2))]==null){
                        if(this.err){dele.call(this)}
                        this.err=showTip($this,err);
                        pass=0;
                    };
                    sBirthday=txt.length==15?txt.substr(6,2)+","+Number(txt.substr(8,2))+","+Number(txt.substr(10,2)):txt.substr(6,4)+"-"+Number(txt.substr(10,2))+"-"+Number(txt.substr(12,2));
                    var d=new Date(sBirthday.replace(/-/g,"/"));
                    if(txt.length==15){
                        if(d.getYear()!=parseInt(txt.substr(6,2))||d.getMonth()!=parseInt(txt.substr(8,2))-1||d.getDate()!=parseInt(txt.substr(10,2))){
                            if(this.err){dele.call(this)}
                            this.err=showTip($this,err);
                            pass=0;
                        }
                    }else{
                        if(sBirthday!=(d.getFullYear()+"-"+ (d.getMonth()+1) + "-" + d.getDate())){
                            if(this.err){dele.call(this)}
                            this.err=showTip($this,err);
                            pass=0;
                        }
                        for(var i=17;i>=0;i--){
                            iSum+=(Math.pow(2,i)%11)*parseInt(txt.charAt(17-i),11);
                        }
                        if(iSum%11!=1){
                            if(this.err){dele.call(this)}
                            this.err=showTip($this,err);
                            pass=0;
                        }
                    }break;
                case 'null':
                    if(this.value=='' || !(/[^\s]/.test(this.value))){
                        if(this.err){dele.call(this)}
                        this.err=showTip($this,nul);
                        pass=0;
                    }
                    break;
                default:
                    var flags=type.match(/[gim]*$/)[0];
                    type=type.replace(/[gim]*$/,'').replace(/^\/|\/$/g,'').replace(/[gim]*$/,'');
                    var reg=new RegExp(type,flags);
                    if(this.value==''){
                        if(this.err){dele.call(this)}
                        this.err=showTip($this,nul);
                        pass=0;
                    }else if(!reg.test(this.value)){
                        if(this.err){dele.call(this)}
                        this.err=showTip($this,err);
                        pass=0;
                    }break;
            }
            
            if(this.tagName.toLowerCase()=='input'&&(this.getAttribute('type')=='radio'||this.getAttribute('type')=='checkbox')){
                var iame=this.getAttribute('type')=='radio'?this.getAttribute('name'):this.getAttribute('type')=='checkbox'?this.getAttribute('checkname'):'';
                var chec=0,arr=[];
                inputs.each(function(){
                    if(this.tagName.toLowerCase()=='input'&&(this.getAttribute('type')=='radio'&&this.getAttribute('name')==iame)||(this.getAttribute('type')=='checkbox'&&this.getAttribute('checkname')==iame)){
                        arr.push(this);
                        if(this.checked==true){chec=1}
                    }
                });
                if(!chec){
                    if(this.err){dele.call(this)}
                    this.err=showTip($this.parent(),nul);
                    for(var l=arr.length-1;l>=0;l--){
                        arr[l].err=this.err;
                    }
                    pass=0;
                }
            }
            if(pass){return true}else{return false}
        }
        /*提示*/
        function showTip(con,txt){
            //var tip=$('<div class="tip_info">'+txt+'<span class="dec"><span class="dec1"></span><span class="dec2"></span></span></div>').appendTo('body');
            var tip = $('<div class="popover fade right in">\n<div class="arrow">\n</div>\n<div class="popover-content">\n<p>'+txt+'</p>\n</div>\n</div>\n').appendTo('body');
            tip.show();
            tip.css(poTip(con,tip));
            topmax = topmax==0 ? top : topmax;
            tip.on('click',function(){$(this).remove()});
            //if(top <= topmax){ $("html,body").animate({scrollTop: top},{queue:false});topmax = top;}
            con.focus();
            return tip
        }
        /*提示定位*/
        function poTip(con,tip){
            var con=$(con),align=con.attr('infoAlign'),
            dec=tip.find('.dec'),
            top=con.offset().top+(con[0].offsetHeight-tip[0].offsetHeight)/2,
            left=con.offset().left+con[0].offsetWidth+20;
            switch(true){
                case align==='left':left=con.offset().left-tip[0].offsetWidth-20;dec.addClass('dec_right');break;
                case align==='top':left=con.offset().left+(con[0].offsetWidth-tip[0].offsetWidth)/2;top=con.offset().top-tip[0].offsetHeight-10;dec.addClass('dec_bottom');break;
                case align==='bottom':left=con.offset().left+(con[0].offsetWidth-tip[0].offsetWidth)/2;top=con.offset().top+con[0].offsetHeight+10;dec.addClass('dec_top');break;
                default:dec.addClass('dec_left');break;
            }
            return {'left':left,'top':top}
        }
        inputs.each(function(){
            var $this=$(this),val=$(this).val(),place=$this.attr('placeholde');
            if(place){
                /*默认提示*/
                var ndiv=$('<div style="position:absolute;color:#afafaf;top:0;left:0;"></div>');
                $('body').append(ndiv);
                function abs(){
                    if(this.tagName.toLowerCase()=='input'){
                        ndiv.html($this.attr('placeholde'));
                        ndiv.css({'left':$this.offset().left+parseInt($this.css('padding-left'))+4+'px','top':$this.offset().top+($this[0].offsetHeight-ndiv.height())/2+'px'});
                    }
                    if(this.tagName.toLowerCase()=='textarea'){
                        ndiv.html($this.attr('placeholde'));
                        ndiv.css({'left':$this.offset().left+parseInt($this.css('padding-left'))+4+'px','top':$this.offset().top+parseInt($this.css('padding-top'))+'px'});
                    }
                    
                }
                abs.call(this);
                
                ndiv.bind('click',function(){
                    $this.focus();
                });
                $this.bind('input',function(){
                    (this.value !== '' && (ndiv.hide())) || (ndiv.show())
                });
                $this.bind('blur',function(){
                    if(this.value==''){
                        ndiv.show();
                    }
                });
                
                function hidePlace(){$this.val()!=''&&(ndiv.hide())}
                this.sIntervalCheckInputAlways = setInterval(hidePlace,500);
                $(window).resize(function(){abs.call($this[0])});
            }
            
            if(this.getAttribute('recheck')){
                for(var l=inputs.length-1;l>=0;l--){
                    if(inputs[l].getAttribute('name')==this.getAttribute('recheck')){
                        inputs[l].rechecked=this;
                    }
                }
            }
            
            $this.bind('change',function(){
                valid.call(this);
            });
        });
    });
})();
