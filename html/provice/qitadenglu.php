<?php
header("Content-type:text/html;charset=utf-8");
session_start();
?>
<?php

		$conn=mysqli_connect("120.79.179.80","map","123","map") or die("连接数据库失败");
		mysqli_query($conn,"set names utf8");
		$phone=$_POST['phone'];
		$name=$_POST['name'];
			$result_chk=mysqli_query($conn,"select * from user where phone='".$phone."';");
		if($myrow=mysqli_fetch_array($result_chk)){		
						$result_chk=mysqli_query($conn,"select * from user where phone='".$phone."' and name='".$name."';");
if($myrow=mysqli_fetch_array($result_chk)){	
			echo "chenggon";
			}
			else{
				$phone=$phone+1;
					$que="INSERT INTO user (name,phone,password)VALUES('".$name."','".$phone."','".$phone."')";
			$result=mysqli_query($conn,$que);
		if($result){	
			echo "chenggoncar";
		}
		else{
			echo"$conn->error";
		}	
			}
		}else{
		$que="INSERT INTO user (name,phone,password)VALUES('".$name."','".$phone."','".$phone."')";
			$result=mysqli_query($conn,$que);
		if($result){	
			echo "chenggoncar";
		}
		else{
			echo"$conn->error";
		}	
	}	
?>