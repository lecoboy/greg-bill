<?php
$servername = "127.0.0.1";
$username = "root";
$password = "root";
$dbname = "db_gregbill";
 
// 创建连接
$conn = @mysql_connect($servername, $username, $password);
mysql_select_db($dbname, $conn);
$sql = "SELECT * FROM bill ORDER BY id DESC";
$result = mysql_query($sql);
$list = array();
$i=0;

while($row = mysql_fetch_assoc($result)) {
	// echo json_encode($row)."<br>";
	// $row['headImg'] = "<img style='width:100px;' src='server/upload/{$row['headImg']}'/>";
	$row['option'] = "<a href='javascript:;' onclick='delBill({$row['id']})'>删除</a>";
	$list[$i++] = $row;
}

$data = '{"data":'.json_encode($list).'}';

mysql_close($conn);

die($data);