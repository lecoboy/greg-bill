<?php
$servername = "127.0.0.1";
$username = "root";
$password = "root";
$dbname = "db_gregbill";
 
// 创建连接
$conn = @mysql_connect($servername, $username, $password);
mysql_select_db($dbname, $conn);

//处理登陆记录
$lt = $_COOKIE['lt'];
$sql = "UPDATE ltime set state = -1 where lt = '$lt'";
if(mysql_query($sql) === false){
	die("error...");
}
//销毁cookie
setcookie("LoginUser", "", time()-3600,"/");
setcookie("lt", "", time()-3600,"/");
header("Location: ../login.html");
?>