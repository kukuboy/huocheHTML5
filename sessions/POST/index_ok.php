<?php
	header("Content-type:text/html;charset=utf-8");
	session_start();
?>
<html>
<meta charset="utf-8">
</html>
<?php
	if(isset($_POST['login']) && $_POST['login']=="登陆"){
    	/*echo "<script language='javascript'>alert('flag!!!!!!');</script>";*/
		$conn=mysqli_connect("120.79.179.80","map","123","map") or die("操作数据库失败");;
		mysqli_query($conn,"set names gbk");
		$phone=$_POST['phone'];
		$_SESSION['phone']=$phone;
		$password=$_POST['password'];
		$que="select * from user where phone='".$phone."' and password='".$password."';";
		$result=mysqli_query($conn,$que) or die("操作数据库失败");
		if(mysqli_fetch_array($result)){ 
					
			echo "<script language='javascript'>alert('登录成功!');localStorage.setItem('phone1',1);window.location.href='/huo/html/new-webview.html';</script>";
		}else{
	echo "<script language='javascript'>alert('登录失败,请输入正确账号和密码!');window.location.href='/huo/html/login.html';</script>";
	
		}
	}else {
		//  echo "<script language='javascript'>alert('登录失败,请勿直接输入网址!');window.location.href='/huo/html/login.html';</script>";
	}
?>