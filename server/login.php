<?php
$servername = "127.0.0.1";
$db_username = "root";
$db_password = "root";
$dbname = "db_gregbill";
 
// 创建连接
$conn = @mysql_connect($servername, $db_username, $db_password);
mysql_select_db($dbname, $conn);
// 表单处理
$username = $_POST['username'];
$password = $_POST['password'];
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
	//添加登陆记录
	$lt = intval(time());
	$addTime = date("Y-m-d H:i:s");
	$state = 0;
	$sql = "INSERT INTO `ltime` (`lt`, `addTime`, `state`, `username`) VALUES ('$lt', '$addTime', '$state', '$username')";
	if(mysql_query($sql) === false){
		die("error...........223");
	}
	//设置cookie
	setcookie("LoginUser",$username,0,'/');
	setcookie("lt",$lt,0,'/');
	die("true");
}else{
	die("账号或密码错误~￣□￣｜｜");
}

die("end");