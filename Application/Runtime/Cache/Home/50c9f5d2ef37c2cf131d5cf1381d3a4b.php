<?php if (!defined('THINK_PATH')) exit();?>﻿

<!doctype html>
<script type="text/javascript">
<!--
	var ctx = "";
//-->
</script>

<html>
	<head>
	    <title>登录页</title>
	    <meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
	    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=2.0" />
	    <meta property="wb:webmaster" content="ad4bded55c6a7395" />
	    <base href="/Public/home/">
	    <link media="all" type="text/css" href="css/style.css" rel="stylesheet" />
	    
	</head>
	<body>
		<div class="nav-banner pr">
		    <div class="nav-back"><a href="javascript:history.go(-1)">返回</a></div>
		    <div class="nav-invitation"></div>
		</div>
		<div class="login-news">
		    <div class="title2_n1"><a href="<?php echo U('Login/login');?>" class="on">登录</a> <span>|</span> <a class="zc" href="<?php echo U('Login/regist');?>">注册</a></div>
		    <div class="loginErrMsg" id="loginErrMsg"></div>
		    <div class="loginbox">
		        <form class="form" method="post"  id="formLogin" action="<?php echo U('Login/login');?>">
		        
		        		<div class="logininputs mb">
			                <p class="cl newal"><span class="fl">邮　箱：</span>
			                <input type="text" name="uname" class="u_name"  id="pin" />
			                <span class='pin'></span>
			               </p>			             
			                <p class="cl newbl"><span class="fl ">密　码：</span>
		                   	<input type="password" id="pwd_pwd" name="upwd" class="u_pwd" />
		                   	<span class='t_pwd'></span>
			                </p>
			            </div>
			            
			           	<div class="cl Verification_new">
			           		<p class="cl newal"><span class="fl">验证码：</span>
			                <input type="text" id="idenCode" name="idenCode" class="fl"  />
			                <span class="yz fl"><img src="<?php echo U('Login/verify');?>" id="img_code" width="80" height="30"></span>
			               
			            </div> 
		                
		                <div class="cl new_dl">
			            	<span class="fl"><input type="checkbox" name="rmb_pin" id="rmb_pin"/>记住账号</span>
			                <span class="fl"><input type="checkbox" name="auto_login" id="auto_login"/>七天免登录</span>
			            </div>
			            
			            <div class="sub">
			                <input name="login_btn" type="submit" value="登录" class="sub_na">
			            </div> 
		        </form>
		    </div>
		</div>
		 <input id="login_flag" type="hidden" value="0-0-0"/>
	</body>
	<script src="js/jquery-1.7.2.min.js"></script>
	<script type="text/javascript">


$('.u_name').blur(function(){
var uname=$('.u_name').val();
if(uname=='')
{
$('.pin').html('<font color="red">用户名不能为空</font>');

}
else
{
$('.pin').html('<font color="green">√</font>');

}

})
$('.u_pwd').blur(function(){
var upwd=$('.u_pwd').val();
if(upwd=='')
{
$('.t_pwd').html('<font color="red">密码不能为空</font>');

}
else
{
$('.t_pwd').html('<font color="green">√</font>');

}

})

/*表单提交事件*/
$('#formLogin').submit(function(){
var uname=$('.u_name').val();
var upwd=$('.u_pwd').val();
if(uname==''&& upwd=='')
{

return false;
}

var reg= /^[a-zA-Z0-9_-]{3,16}$/;
if(!reg.test(uname))
{
 $('.pin').html('<font color="red">用户名长度至少四个,最多十六个</font>');
 return false;	
}
if(upwd.length<3||upwd.length>6)
{
               
$('.t_pwd').html("<font color='red'>密码长度需要保证在3---6位之间</font>");
return false;
}
})

	/*验证码生成*/
	$('#img_code').click(function(){
		//把当前时间戳拼接到URL地址后
		var time =new Date().getTime();
		var url="<?php echo U('Login/verify');?>"
		$('#img_code').attr({
			'src':url+'?'+time
		})
	})
	/*验证码校验*/
	$('#idenCode').blur(function(){
var idenCode=$('#idenCode').val();
if(idenCode=='')
{
alert('验证码不能为空');
return;
}
$.ajax({
url:"<?php echo U('Login/check_verify');?>",
type:'post',
data:{idenCode:idenCode},
success:function(data){
if (data == true) {
//验证码输入正确
alert("验证码输入正确");
} else {
//验证码输入错误
alert("验证码输入错误");
return;
}
}
})
})

	</script>
</html>