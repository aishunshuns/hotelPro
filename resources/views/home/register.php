<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>注册</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0;" />
        <meta content="yes" name="apple-mobile-web-app-capable" />
        <link href="css/bootstrap.min.css" rel="stylesheet" />
        <link href="css/NewGlobal.css" rel="stylesheet" />
        <script type="text/javascript" src="js/zepto.js"></script>
    </head>
    
    <body>
        <div class="header">
            <a href="index.html" class="home">
                <span class="header-icon header-icon-home"></span>
                <span class="header-name">主页</span></a>
            <div class="title" id="titleString">注册</div>
            <a href="javascript:history.go(-1);" class="back">
                <span class="header-icon header-icon-return"></span>
                <span class="header-name">返回</span></a>
        </div>
        <div class="container width80 pt20">
            <form name="aspnetForm" method="post" action="register_add" id="aspnetForm" class="form-horizontal" onsubmit="return check()">
            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                <div class="control-group">
                    <input name="username" type="text" onblur="fun()" id="username" class="input width100 " style="background: none repeat scroll 0 0 #F9F9F9;padding: 8px 0px 8px 4px" placeholder="请输入用户名" />
                    <span id='list'></span>
                </div>
                <div class="control-group">
                    <input name="password" type="password" onblur="fun1()" id="password" class="input width100 " style="background: none repeat scroll 0 0 #F9F9F9;padding: 8px 0px 8px 4px" placeholder="请输入密码" />
                    <span id='list1'></span>
                </div>
                <div class="control-group">
                    <input name="mobile_phone" type="text" onblur="fun2()" id="mobile_phone" class="input width100 " style="background: none repeat scroll 0 0 #F9F9F9;padding: 8px 0px 8px 4px" placeholder="请输入邮箱账号" />
                    <span id='list2'></span>
                </div>
                <div class="control-group">
                    <input name="id_card" type="text" id="id_card" onblur="fun3()" class="input width100 " style="background: none repeat scroll 0 0 #F9F9F9;padding: 8px 0px 8px 4px" placeholder="请输入身份证号" />
                    <span id='list3'></span>
                </div>
                
                <div class="control-group">
                    <button onclick="__doPostBack('ctl00$ContentPlaceHolder1$btnOK','')" id="ctl00_ContentPlaceHolder1_btnOK" class="btn-large green button width100">立即注册</button></div>
                <div class="control-group">已有账号？
                    <a href="Login" id="ctl00_ContentPlaceHolder1_RegBtn">立即登录</a></div>
                <div class="control-group">或者使用合作账号一键登录：
                    <br />
                    <a class="servIco ico_qq" href="qlogin.aspx"></a>
                    <a class="servIco ico_sina" href="default.htm"></a>
                </div>
            </form>
        </div>
        <div class="footer">
            <div class="gezifooter">
                <a href="Login" class="ui-link">立即登陆</a>
                <font color="#878787">|</font>
                <a href="Register" class="ui-link">免费注册</a>
                <font color="#878787">|</font>
                <a href="../www.gridinn.com/@display=pc" class="ui-link">电脑版</a></div>
            <div class="gezifooter">
                <p style="color:#bbb;">格子微酒店连锁 &copy; 版权所有 2012-2014</p></div>
        </div>
    </body>
<script>
    function fun(){
        var username = document.getElementById('username').value;
        $.get("register_shu",{'username':username},function(e){
            if(e==0){
                var reg =/^[a-zA-z]\w{3,15}$/;
                if (reg.test(username)) {
                    document.getElementById('list').innerHTML='用户名正确';
                    document.getElementById('list').style.color='green';
                    return true;
                }else{
                    document.getElementById('list').innerHTML='字母、数字、下划线组成，字母开头，4-16位';
                    document.getElementById('list').style.color='red';
                    return false;
                }
            }
            else{
                document.getElementById('list').innerHTML='已存在该用户，请重新输入';
                document.getElementById('list').style.color='red';
                return false;
            }
        })
        
    }
    function fun1(){
        var password = document.getElementById('password').value;
        var reg=/^[a-z | A-Z]\w{5,15}$/;
        if(reg.test(password)){
            document.getElementById('list1').innerHTML='密码正确';
            document.getElementById('list1').style.color='green';

            return true;
        }else{
            document.getElementById('list1').innerHTML='6-16位字符，字母开头';
            document.getElementById('list1').style.color='red';
            return false;
        }
    }
    function fun2(){
        var mobile_phone = document.getElementById('mobile_phone').value;
        $.get("register_shu",{'email':mobile_phone},function(e){
            if(e==0){
                var reg=/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
                if(reg.test(mobile_phone)){
                    document.getElementById('list2').innerHTML='邮箱正确';
                    document.getElementById('list2').style.color='green';
                    return true;
                }else{
                    document.getElementById('list2').innerHTML='您的电子邮箱不正确';
                    document.getElementById('list2').style.color='red';
                    return false;
                }
            }else{
                document.getElementById('list2').innerHTML='该邮箱已经注册过账号';
                document.getElementById('list2').style.color='red';
                return false;
            }
        })
        
    }
    function fun3(){
        var id_card = document.getElementById('id_card').value;
        $.get("register_shu",{'id_card':id_card},function(e){
            if(e==0){
                var reg=/^[1-9]{1}[0-9]{14}$|^[1-9]{1}[0-9]{16}([0-9]|[xX])$/;
                if(reg.test(id_card)){
                    document.getElementById('list3').innerHTML='身份证号正确';
                    document.getElementById('list3').style.color='green';
                    return true;
                }else{
                    document.getElementById('list3').innerHTML='请检查您输入的身份证号';
                    document.getElementById('list3').style.color='red';
                    return false;
                }
            }else{
                document.getElementById('list3').innerHTML='该身份证号已经注册过账号';
                document.getElementById('list3').style.color='reds';
                return false;
            }
        })
        
    }
    function check(){
        if(fun1() && fun2() && fun3()){
            return true;
        }else{
            return false;
        }
    }
</script>
</html>