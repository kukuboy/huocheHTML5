<?php
header("Content-type:text/html;charset=utf-8");
session_start();
//error_reporting(0);
?>
<html>
<meta charset="utf-8">
</html>
<?php
	if(isset($_POST['ok']) && $_POST['ok']=="确认"){
		$conn=mysqli_connect("120.79.179.80","map","123","map") or die("连接数据库失败");
		mysqli_query($conn,"set names utf8");
		$phone=$_POST['phone'];
		$result_chk=mysqli_query($conn,"select * from user where phone='".$phone."';");
		if(!mysqli_fetch_array($result_chk)){
			echo "<script language='javascript'>alert('账号不存在');window.location.href='gaimi.php';</script>";	
		}else{
		$name=$_POST['name'];
		$_SESSION['name']=$name;
		$phone=$_POST['phone'];
		$_SESSION['phone']=$phone;
		$psw=md5(trim($_POST['psw']));
		$que="UPDATE user set name='".$name."',password='".$psw."' where phone='".$phone."';";
		$result=mysqli_query($conn,$que);
		if($result){
			$_SESSION['phone']=$phone;
				$_SESSION['name']=$name;
					$_SESSION['psw']=$psw;
			echo "<script language='javascript'>alert('修改成功，去登陆');window.location.href='/huo/html/login.html';</script>";	
		}else{
			echo "<script language='javascript'>alert('修改失败!');window.location.href='/huo/html/gaimi.php';</script>";		
 //printf("Error: %s\n", mysqli_error($conn));
 //exit();
		}
	}
	}

?>