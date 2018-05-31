<?php
//表单处理
$id = $_POST['id'];
$addTime = date("Y-m-d H:i:s");

//数据库处理
$servername = "127.0.0.1";
$username = "root";
$password = "root";
$dbname = "db_gregbill";
 
// 创建连接
$conn = @mysql_connect($servername, $username, $password);;
mysql_select_db($dbname, $conn);

// 不能删除其他角色添加的账单记录
$sql = "SELECT username from bill where id=$id";
$result = mysql_query($sql);
$row = mysql_fetch_row($result);
$addUser = $row[0];
$loginUser = $_COOKIE['LoginUser'];
if($loginUser != $addUser){
	die("不可以删除其他主人添加的账单哟~(╯°Д°)╯");
}

$sql = "DELETE FROM `bill` where id=$id";

if (mysql_query($sql) === TRUE) {
    die("true");
} else {
    echo "Error: " . $sql . "<br>" . mysql_error();
}

mysql_close($conn);
?>