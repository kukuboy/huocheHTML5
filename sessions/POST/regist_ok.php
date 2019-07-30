<?php
header("Content-type:text/html;charset=utf-8");
session_start();
?>
<?php

	if(isset($_POST['ok']) && $_POST['ok']=="确认"){
		$conn=mysqli_connect("120.79.179.80","map","123","map") or die("连接数据库失败");
		mysqli_query($conn,"set names utf8");
		$phone=stripslashes(trim($_POST['phone']));
			$result_chk=mysqli_query($conn,"select * from car where user='".$phone."';");
		if($myrow=mysqli_fetch_array($result_chk)){
			echo "<script language='javascript'>alert('货车已存在');</script>";	
		}else{
		$phone=$_POST['phone'];
		echo ($phone);
					$que="INSERT INTO car (user)VALUES('".$phone."')";
			$result=mysqli_query($conn,$que);
		if($result){	
			echo "chenggoncar";
		}
		else{
			echo"$conn->error";
		}	
	}	
		$result_chk=mysqli_query($conn,"select * from user where phone='".$phone."';");
		if($myrow=mysqli_fetch_array($result_chk)){
			echo "<script language='javascript'>alert('账号已存在');window.location.href='zhuce.php';</script>";	
		}else{
		$password=$_POST['password'];
			echo ($password);
		$phone=$_POST['phone'];
		echo ($phone);
//		$email=$_POST['email'];
//			echo ($email);
		$name=$_POST['name'];
			echo ($name);
		$que="INSERT INTO user (phone,password,name)VALUES('".$phone."','".$password."','".$name."')";
		$result=mysqli_query($conn,$que);
		if($result){	
			echo "chenggon";
		  echo '<script language="javascript">';
    echo 'localStorage.setItem("name",JSON.stringify('.json_encode($name).'));';
    echo 'window.location.href="/huo/html/new-webview.html";';
    echo '</script>'; 
		}
		else{
			echo"$conn->error";
		}

	}
	}
?>