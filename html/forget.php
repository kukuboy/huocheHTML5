<?php
header("Content-type:text/html;charset=utf-8");
session_start();
?>
<?php
	if(isset($_POST['ok']) && $_POST['ok']=="确认"){
		$conn=mysqli_connect("120.79.179.80","map","123","map") or die("连接数据库失败");
		mysqli_query($conn,"set names utf8");	
		$phone=stripslashes(trim($_POST['phone']));	
		$result_chk=mysqli_query($conn,"select * from user where phone='".$phone."';");
		if($myrow=mysqli_fetch_array($result_chk)){
			$password=$_POST['password'];
			echo ($password);
		$phone=$_POST['phone'];
		echo ($phone);
		$que="UPDATE user set password='".$password."' where phone='".$phone."'";
		$result=mysqli_query($conn,$que);
		if($result){	
			echo "chenggon";
		  echo '<script language="javascript">';
    echo 'window.location.href="login.html";';
    echo '</script>'; 
		}
		else{
			echo"$conn->error";
		}
			
		}else{
		echo "<script language='javascript'>alert('账号不存在');window.location.href='forget_password.html';</script>";	
	}
	}
?>