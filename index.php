<?php

header('Access-Control-Allow-Origin: *');

//$link = mysql_connect('localhost','root','`m1nd1m4g3`');
//mysql_select_db('correntebellosub',$link);

$params = json_decode(file_get_contents('php://input'), true);

$pUsername = $params['username'];
$pPassword = $params['password'];

$username = "phelix";
$password = "pass";



$results = array('username' => $pUsername, 'password' => $pPassword);

print json_encode($results);

//return json_encode($results);
?>
