<?php
$servername = "127.0.0.1";
$username = "root";
$password = "root";
$dbname = "db_gregbill";
 
// 创建连接
$conn = @mysql_connect($servername, $username, $password);
mysql_select_db($dbname, $conn);
// 表单处理
$username = $_POST['username'];
$password = $_POST['password'];
// var_dump($username);
setcookie("LoginUser",$username,0,'/');
// var_dump($_COOKIE['LoginUser']);
// sql处理
$sql = "SELECT * FROM user where username='$username'";
$result = mysql_query($sql);
try {
	$row = mysql_fetch_assoc($result);
} catch (Exception $e) {
	die("exception...........");
}

if($row['password'] == $password){
	// setcookie("LoginUser",$username,time()+7200);
	// setcookie("user", "Alex Porter", time()+3600);
	die("true");
}else{
	die("error..............");
}

die("end");