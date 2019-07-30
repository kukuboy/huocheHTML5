 <?php
header("Content-type:text/html;charset=utf-8");
session_start();
//error_reporting(0);
?>
<html>
<meta charset="utf-8">
</html>
<?php
		$conn=mysqli_connect("120.79.179.80","map","123","map") or die("连接数据库失败");
		mysqli_query($conn,"set names utf8");
		$user=$_POST['user'];
		echo $user;
		$result_chk=mysqli_query($conn,"select * from car where user='".$user."';");
		if(!mysqli_fetch_array($result_chk)){
			echo "<script language='javascript'>alert('账号不存在');</script>";	
		}else{
		$user=$_POST['user'];
		$name=$_POST['name'];
		$size=$_POST['size'];
		$width=$_POST['width'];
		$weight=$_POST['weight'];
		$height=$_POST['height'];
		$que="UPDATE car set name='".$name."',size='".$size."',width='".$width."',weight='".$weight."',height='".$height."' where user='".$user."';";
		$result=mysqli_query($conn,$que);
		if($result){
			echo "<script language='javascript'>localStorage.setItem('gaicarstate',1);</script>";	
		}else{
			echo "<script language='javascript'>localStorage.setItem('gaicarstate',0);</script>";		
 //printf("Error: %s\n", mysqli_error($conn));
 //exit();
		}
	}
	

$mysqli->close();
echo $_GET['callbackparam']."(".json_encode($result).")";
?>