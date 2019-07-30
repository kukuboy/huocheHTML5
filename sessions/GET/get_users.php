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
				$phone = isset($_POST['phone']) ? $_POST['phone'] : '';
		$dd = isset($_POST['dd']) ? $_POST['dd'] : '';
		$where = "time like '$dd%' and jieshouzhe like '$phone';";
//		$offset = ($page-1)*$rows;
	
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

//$res = $mysqli->query("select count(*) from tb_regist where " . $where);
	//$row = mysql_fetch_row($res);
	//$result["total"] = $row[0];
	$res =$mysqli->query("select * from huowu where ". $where ."");//limit $offset,$rows");
//$sql = "select * from tb_regist;";// .$where;
//$res = $mysqli->query($sql);
if(!$res){
    die("sql error:/n" . $mysqli->error);
}
	//$rs = mysql_query("select * from tb_regist where " . //$where . " limit $offset,$rows");
	
	//$items = array();
	//while($row = mysql_fetch_object($rs)){
		//array_push($items, $row);
	////}
	//$result["rows"] = $items;
$result = array();
while ($row = $res->fetch_assoc()){
    /*var_dump($row);*/
    array_push($result,$row);
}
echo json_encode($result);
$res->free();
$mysqli->close();
