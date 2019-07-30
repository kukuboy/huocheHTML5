<?php
header("Content-type:text/html;charset=utf-8");
session_start();
require_once('lib/Ucpaas.class.php');
require_once('serverSid.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
	<link href="../css/mui.min.css" rel="stylesheet" />
		<link href="../css/style.css" rel="stylesheet" />
		<script src="../js/mui.min.js"></script>
<script src="lib/js/qrcode.js"></script>
<script src="lib/js/qart.min.js"></script>
<script src="lib/js/jquery-1.8.3.min.js" type="text/javascript"></script>
<script src="lib/js/jquery.cookie.js"></script>
<title>注册</title>
<style>

		input[type=file] {
			display: block;
			width: 380px;
			height: 30px;
			margin: 0 auto;
		}
			body {
			width: 100%;
			height: 100%;
			padding: 0;
			background-image:url(image/34007169a67996554ec20b1e472ad68c.jpeg);
			background-size:14  0%;
			background-repeat:no-repeat;
		}

input,#button{
  box-sizing: border-box;
  text-align:center;
  height:10%;
  border-radius:8px;
  border:1px solid #c8cccf;
  color:#06F;
  -web-kit-appearance:none;
  -moz-appearance: none;
  display:block;
  outline:0;
  padding:0.1em;
  text-decoration:none;
  margin:auto;
  width:90%;
  font-size:30px;
}
 .one{
	        height:70%;
			border-width:3px;
			border-radius:10px;
			background-color:#FFF;
			margin-left:15%;
			margin-right:15%;
			margin-top:10%;
			font-size:10px;
			margin-bottom:10%;
			}
    
input[type="text"]:focus{
  border:1px solid #ff7496;
  font-size: 30px;
  width: 80%;
}
input[type="password"]:focus{
  border:1px solid #ff7496;
  font-size: 30px;
  width: 80%;
}
input[type="button"]{
	width:75%;
	height:12%;
	margin-left: 12.5%;
	background-color:#CFC;
	}
</style>
<script type="text/javascript">
var m=1,n=1,x=0;
var ss;
function suiji(){
var s1=parseInt(Math.random()*10);
	var s2=parseInt(Math.random()*100);
	var s3=parseInt(Math.random()*1000);
	var s4=parseInt(Math.random()*10000);
	var s5=parseInt(Math.random()*100000);
	var s6=parseInt(Math.random()*900000);
	 ss=s1+s2+s3+s4+s5+s6;
	var yan3=document.getElementById('yzm'); 
	 yan3.value=ss;
}
	//alert(ss);
function banduan1() {
	//alert("banduan");
	var psw=document.getElementById('psw').value;
	var phone=document.getElementById('phone').value;
	var regx =/^(?![0-9]+$)(?![a-zA-Z]+$)[0-9A-Za-z]{8,16}$/;
    var regx1=/^((13[0-9])|(14[5|7])|(15([0-3]|[5-9]))|(18[0,5-9]))\d{8}$/   
	if(psw.match(regx)==null){
   document.getElementById('demo1').innerHTML="密码格式错误";
   m=0;
    return;
	}
else{
	 document.getElementById('demo1').innerHTML="";
	m=1;
	return;
	}
}

	
	function banduan2() {
	//alert("banduan");
	var name=document.getElementById('name').value;
	var phone=document.getElementById('phone').value;
	var psw=document.getElementById("psw").value;
 localStorage.setItem("phone1",phone);
 localStorage.setItem("name",name);
	var regx =/^(?![0-9]+$)(?![a-zA-Z]+$)[0-9A-Za-z]{8,16}$/;
    var regx1=/^((13[0-9])|(14[5|7])|(15([0-3]|[5-9]))|(18[0,5-9]))\d{8}$/   
	if(phone.match(regx1)==null){
   document.getElementById('demo2').innerHTML="手机格式错误";
     n=0;
    return false;

}
else{
	 document.getElementById('demo2').innerHTML="";
	localStorage.setItem("phone2",phone);
	 n=1;
	 return true;
	}
 
	}
   function banduan3(){
	   	var phone=document.getElementById('phone').value;
	var psw=document.getElementById("psw").value;
 localStorage.setItem("phone1",phone);
	   if(x==1){
	   if(m==1||n==1)
	   {
		   return true;
	   }
	   else{
		   return false;
		   }
	   }
	   else {
		   alert("验证码错误");
	   return false;}
   }
	   function  banduan4(){
		 var yan=document.getElementById('yanz').value; 
if (yan==ss){
	x=1;
	return;
}else{
	x=0;
	return;
}		 
	   }

function yanzhen() {
   banduan2();
   if(n==1){
	suiji();
	alert( $("form").serialize());
	  $.ajax({
    type: "POST",//方法
    url: "smsyzm.php",//表单接收url
    data: $("form").serialize(),
    success: function () {
     //提交成功的提示词或者其他反馈代码
    	//x=1;
   $("#yan").addClass("on");
   var time = 60;
   $("#yan").attr("disabled",true );
   var timer = setInterval(function() {
    if (time == 0) {
     clearInterval(timer);
     $("#yan").attr("disabled", false);
     $("#yan").val("获取验证码");
     $("#yan").removeClass("on");
    } else {
     $("#yan").val(time + "秒后可再获取");
     time--;
    }
   }, 1000);

    }
   });
}
  }
  				function ab2(){
				var cPage = plus.webview.currentWebview();
   var cPage = plus.webview.currentWebview();
    //获取上一级页面（B页面）
    var bPage = cPage.opener();
    //获取上一级页面的上一级页面（A页面）
    cPage.close();
    bPage.close();
			}
</script>
</head>
<body>
			<header class="mui-bar mui-bar-nav">
			<a class="mui-action-back mui-icon mui-icon-left-nav mui-pull-left"></a>
			<h1 class="mui-title">注册</h1><a style="float: right; margin-top: 3%;" onclick="ab()">首页</a>
		</header>
<div class="one">
<form action="../sessions/POST/regist_ok.php" name="form" id="form" value="form" METHOD="POST" onsubmit="return banduan3()">
	<br />
<a style="margin-left:40%; font-size:35px;">姓名</a><label for="name"></label><input type="text" name="name" id="name" placeholder="请输入姓名" autocomplete="on"  required="required"/>
<br />
<a style="margin-left:40%; font-size:35px;">密码</a><label for="password"></label><input type="password" name="psw" id="psw"  autocomplete="on" placeholder="8到16位数字字母组合" onblur="banduan1()" required="required" /><p style="font-size:38px; color:#F00;" id="demo1"></p>
<br />
<a style="margin-left:40%; font-size:35px;">手机号</a><label for="phone"></label><input type="text" name="phone" id="phone" autocomplete="on"  placeholder="请输入11位手机号" onblur="banduan2()" required="required" /><p  style="font-size:38px; color:#F00"; id="demo2"></p>
<input type="hidden" name="yzm" value="" id="yzm" />
<input type="button" onclick="yanzhen()"  id="yan" style="font-size:30px;"  value="获取验证码"/>
<br /><input id="yanz" type="text" onblur="banduan4()" required="required" />

<button id="ok" name="ok"  value="确认" type="submit" style="margin-left:35%; font-size:30px;">注册</button>
</form>
</div>
</body>
</html>


