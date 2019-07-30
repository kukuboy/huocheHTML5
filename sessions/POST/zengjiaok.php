<?php
header("Content-type:text/html;charset=utf-8");
session_start();
?>
<?php
	header("Content-type:text/html;charset=utf-8");
	if(isset($_POST['ok']) && $_POST['ok']=="确认"){
		$conn=mysqli_connect("120.79.179.80","map","123","map") or die("连接数据库失败");
		mysqli_query($conn,"set names utf8");
		$what=$_POST['what'];
			echo ($what);
		$where=trim($_POST['where']);
			echo ($where);
				$whereto=$_POST['whereto'];
			echo ($whereto);
		$money=$_POST['money'];
			echo ($money);
			$fabuzhe=$_POST['phone'];
		$how=$_POST['how'];
			echo ($how);
			$konjian=$_POST['konjian'];
			echo ($konjian);
				$jing=$_POST['jing'];
			echo ($jing);
				$wei=$_POST['wei'];
			echo ($wei);
				$time=$_POST['time'];
				echo($time);
		$que="INSERT INTO huowu (what,qidian,zhongdian,money,fabuzhe,how,konjian,time,jing,wei)VALUES('".$what."','".$where."','".$whereto."','".$money."','".$fabuzhe."','".$how."','".$konjian."','".$time."','".$jing."','".$wei."')";
		$result=mysqli_query($conn,$que);
		if($result){	 
			echo "chenggon";
		  echo '<script language="javascript">';
    echo 'localStorage.setItem("name",JSON.stringify('.json_encode($what).'));';
    echo 'window.location.href="/huo/html/dingdan.html";';
    echo '</script>'; 
		}
		else{
			echo"$conn->error";
		}
	}
	
?>