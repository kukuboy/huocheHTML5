<?php
		//header('Content-Type:application/json');
		//$id=$data->id;
		//$jieshouzhe=$data->jieshouzge;
		$id=$_POST['id'];
		$jieshouzhe=$_POST['jieshouzhe'];
		$fabuzhe=$_POST['fabuzhe'];
		$huowutime=$_POST['huowutime'];
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
$res =$mysqli->query("INSERT INTO dingdan (huowuid,huowufabuzhe,huowujieshouzhe,time)VALUES('".$id."','".$fabuzhe."','".$jieshouzhe."','".$huowutime."')");
if(!$res){
    die("sql error:/n" . $mysqli->error);
}
	//$rs = mysql_query("select * from tb_regist where " . //$where . " limit $offset,$rows");
	
	//$items = array();
	//while($row = mysql_fetch_object($rs)){
		//array_push($items, $row);
	////}
	//$result["rows"] = $items
else{
	echo true;
}
$res->free();
$mysqli->close();
