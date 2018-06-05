<?php
//表单处理
$price = $_POST['price'];
$num = $_POST['num'];
$msg = $_POST['msg'];
$state = 0;
if(isset($_COOKIE['LoginUser'])){
	$username = $_COOKIE['LoginUser'];	
}else{
	if(isset($_POST['username'])){
		$username = $_POST['username'];
	}else{
		die("未检测到登陆用户！");
	}
}
//表单验证
if($price == ""){
	die("请填写价格！");
}
if($num=="" || $num==null){
	$num = 1;
}
$addTime = date("Y-m-d H:i:s");

//数据库处理
$servername = "127.0.0.1";
$db_username = "root";
$db_password = "root";
$dbname = "db_gregbill";
 
// 创建连接
$conn = @mysql_connect($servername, $db_username, $db_password);;
mysql_select_db($dbname, $conn);

// 处理区域
$sql = "SELECT zone FROM user where username = '$username'";
$result = mysql_query($sql);
$row = mysql_fetch_row($result);
$zone = $row[0];

$sql = "INSERT INTO `bill` (`id`, `price`, `num`, `msg`, `addTime`, `username`, `zone`, `state`) VALUES (NULL, '$price', '$num', '$msg', '$addTime', '$username', '$zone', '$state')";

if (mysql_query($sql) === TRUE) {
    die("true");
} else {
    echo "Error: " . $sql . "<br>" . mysql_error();
}

mysql_close($conn);
?>