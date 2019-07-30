
<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: now 0020
 * Time: 13:51
// */
// 	$page = isset($_POST['page']) ? intval($_POST['page']) : 1;
//	$rows = isset($_POST['rows']) ? intval($_POST['rows']) : 20;
//   $admin = isset($_POST['admin']) ? $_POST['admin'] : $_POST['admin'] ;
//	$itemid = isset($_POST['itemid']) ? $_POST['itemid'] : '';
//	$itemid1 = isset($_POST['itemid1']) ? $_POST['itemid1'] : '';
//	$itemid2 = isset($_POST['itemid2']) ? $_POST['itemid2'] : '';
//	$itemid3 = isset($_POST['itemid3']) ? $_POST['itemid3'] : '';
//		$churu = isset($_POST['churu']) ? $_POST['churu'] : '';
//		$dd = isset($_POST['dd']) ? $_POST['dd'] : '';
	$phone=$_POST['phone'];
//		$where = "user_phone_num like '$itemid%' and churu like '$churu%' and time1 like '$dd%' and admin_user like '$admin%' and admin_son_location like '$itemid2%' and user_name like '$itemid1%' and admin_son_user like '$itemid3%';";
//		$offset = ($page-1)*$rows;
header("Access-Control-Allow-Origin:*");
header('Content-Type:application/json');
	$result = array();
	
$mysql_conf = array(
    'host'    =>'120.79.179.80:3306',
    'db'      =>'map',
    'db_user'=>'map',
    'db_pwd' =>'123',
);
$mysqli=new mysqli($mysql_conf['host'],$mysql_conf['db_user'],$mysql_conf['db_pwd']);
if($mysqli->connect_errno){
    die("could not connect to the database:\n" . $mysqli->connect_errno);//诊断连接错误
}
$mysqli->query("set names 'utf8';");//编码转换
$select_db = $mysqli->select_db($mysql_conf['db']);
if(!$select_db){
    die("could not connect to the db:/n" . $mysql->error);
}

	$res =$mysqli->query("select * from car where user='".$phone."';");//limit $offset,$rows");
if(!$res){
    die("sql error:/n" . $mysqli->error);
}

while ($row = $res->fetch_assoc()){
    /*var_dump($row);*/
    array_push($result,$row);
//  echo json_encode($row);
}

$mysqli->close();
echo $_GET['callbackparam']."(".json_encode($result).")";