$(function(){
    var $C = $SAETOOLS.getController();
    
    //禁用获取验证码按钮
    function set_sms_time(target){
        var sms_wait = 60;
        sms_has_time= function(target) {
            if (sms_wait == 0) {
                clearInterval(setSmsTime);
                $(target).removeAttr('disabled').text("获取验证码");
            } else {
                sms_wait --;
                $(target).attr('disabled','true').text(sms_wait+'秒');
            }
        }
        var setSmsTime = setInterval(function (){
             sms_has_time.apply(this,target);
        }, "1000");
    }

    function set_email_time(target){
        var email_wait = 60;
        email_has_time= function(target) {
            if (email_wait == 0) {
                clearInterval(setEmailTime);
                $(target).removeAttr('disabled').text("获取验证码");
            } else {
                email_wait --;
                $(target).attr('disabled','true').text(email_wait+'秒');
            }
        }
        var setEmailTime = setInterval(function (){
             email_has_time.apply(this,target);
        }, "1000");
    }
   
    /*$('#bind-mobile').blur(function(){
        var mobile = $('#bind-mobile').val();
            $.ajax({
                url:'/sso/checkMobile',
                type:'GET',
                data:{mobile:mobile},
                success:function(data){
                    if(data.code == 0){
                        $('#bind-mobile').popover('destroy');

                    }else{
                        $('#bind-mobile').popover('destroy');
                        $('#bind-mobile').popover({content: data.message,placement:'top'}).popover('show');
                    }
                }
            });
    });*/
    // 切换到个人注册
    $C.registerCmd('REGISTER-PERSONAL', function(e) {
        $('#register-official').removeClass('register-cur');
        if (!$('#register-personal').hasClass('register-cur')) {
            $('#register-personal').addClass('register-cur');
        }
        // 修改提示信息
        var notice = '注册后账号用于个人，如果用于非个人业务，建议您使用官方注册通道。';
        $('#register-notice').text(notice);
        // 隐藏单位名称
        if (!$('#official-name').hasClass('hide')) {
            $('#official-name').addClass('hide');
        }
        $SC['REGISTER-TYPE'] = 'personal';
    });
    // 切换到官方注册
    $C.registerCmd('REGISTER-OFFICIAL', function(e) {
        $('#register-personal').removeClass('register-cur');
        if (!$('#register-official').hasClass('register-cur')) {
            $('#register-official').addClass('register-cur');
        }
        // 修改提示信息
        var notice = '注册后账号用于单位、企业或者组织，如果用于个人业务，建议您使用个人注册通道。';
        $('#register-notice').text(notice);
        // 展示单位名称
        if ($('#official-name').hasClass('hide')) {
            $('#official-name').removeClass('hide');
        }
        $SC['REGISTER-TYPE'] = 'official';
    });

    //获取手机验证码
    $C.registerCmd('GET-SMS-VCODE', function(e){
        var target = $(e.target),
            mobile = $('#bind-mobile').val(),
            type = 'regMobile';
        $.ajax({
            url:'/home/ucenter/sendSmsVcode',
            type:'POST',
            data:{mobile:mobile,type:type},
            success:function(data){
                if(data.code == 0){
                    set_sms_time(target);
                    //$C.popup(data.message,data.title);
                }else{
                    $C.popup(data.message,data.title);
                }
            }
        });
    });

    /*$('#email').blur(function(){
        var email = $('#email').val();
        if(email.match(/^\w+((-\w+)|(\.\w+))*\@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z0-9]+$/)){
            $.ajax({
                url:'/sso/checkEmail',
                type:'GET',
                data:{email:email},
                success:function(data){
                    if(data.code == 0){
                        $('#email').popover('destroy');
                    }else{
                        $('#email').popover('destroy');
                        $('#email').popover({content: data.message,placement:'top'}).popover('show'); 
                    }
                }
            });
        }else{
            $('#email').popover('destroy');
            $('#email').popover({content:'邮箱格式不正确',placement:'top'}).popover('show');
        }
    });*/

    //获取邮箱验证码
    $C.registerCmd('GET-EMAIL-VCODE', function(e){
        var target = $(e.target),
            email = $('#email').val(),
            type = 'regEmail';
        $.ajax({
            url:'/home/ucenter/sendMailVcode',
            type:'POST',
            data:{email:email,type:type},
            success:function(data){
                if(data.code == 0){
                    set_email_time(target);
                    //$C.popup(data.message,data.title);
                }else{
                    $C.popup(data.message,data.title);
                }
            }
        });
    });

    //下一步
    $C.registerCmd('SUB', function(e){
        var mobile = $('#bind-mobile').val(),
            mvcode = $('#sms-vcode').val(),
            email = $('#email').val(),
            evcode = $('#email-vcode').val(),
            password = $('#pwd').val(),
            vcode = $('#vcode').val(),
            password_confirm = $('#cfm-pwd').val(),
            reg_source = [],
            agree = $('input[name="protocol"]:checked').val() || 'off',
            follow = $('input[name="weibo"]:checked').val() || 'off';
        // 企业名称
        var official_name = $('#bind-official-name').val();
        if ($SC['REGISTER-TYPE'] == 'official' && !official_name) {
            $C.popup('请填写您代表的单位、企业或组织名称。');
            return false;
        }
        $('input[name="reg-source"]:checked').each(function(){
            reg_source.push($(this).val());
        })
        if($('.form-horizontal').data('valid').call($('.form-horizontal'))){
            if(password == password_confirm){
                if(reg_source.length == 0){
                    $C.popup('请选择您是如何了解新浪云的');
                }else{
                    if(agree == 'off'){
                        $C.popup('请接受新浪云用户协议');
                    }else{
                        var param = {
                            'mobile':mobile,
                            'mvcode':mvcode,
                            'email':email,
                            'evcode':evcode,
                            'password':password,
                            'password_confirm':password_confirm,
                            'reg_source':reg_source,
                            'agree':agree,
                            'follow':follow,
                            'vcode':vcode
                        }
                        // 增加是个人还是官方
                        param.type = $SC['REGISTER-TYPE'];
                        if (param.type == 'official') {
                            param.official_name = official_name;
                        }
                        $.ajax({
                            url:'/home/sso/registered',
                            type:'POST',
                            data:param,
                            success:function(data){
                                if(data.code == 0){
                                    window.location.href = '/sso/registersuccess.html';
                                }else{
                                    $C.popup(data.message,data.title);
                                }   
                            }
                        });
                    }
                }
            }else{
                 $C.alert('两次密码输入不一致');
            }
        }
    });
});
