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

$sql = "DELETE FROM `bill` where id=$id";

if (mysql_query($sql) === TRUE) {
    die("true");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

mysql_close($conn);
?>