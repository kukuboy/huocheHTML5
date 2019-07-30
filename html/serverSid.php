<?php
//载入ucpass类
require_once('lib/Ucpaas.class.php');

//初始化必填
//填写在开发者控制台首页上的Account Sid
$options['accountsid']='6e1e5a931698d4c3f7b370c3aec4f612';
//填写在开发者控制台首页上的Auth Token
$options['token']='f033f1661a8c521d1977b7739dfac47b';

//初始化 $options必填
$ucpass = new Ucpaas($options);