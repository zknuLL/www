<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
</head>
<body>

</body>
</html>
<?php

	$conn = @mysql_connect("localhost", "root", "123456");

	mysql_select_db("test");

	//设置客户端和连接字符集
	mysql_query("set names utf-8");

	$username = $_POST['username'];
	$password = $_POST['password'];
	$repassword = $_POST['repassword'];

	if ($repassword === $password) {

		$sql ="insert into t2(username,password) values('{$username}','{$password}')";

 		if (mysql_query($sql)) {
			echo "<script>alert('添加成功')</script>";
			echo "<script>location='test3.php'</script>";
		} else {
			echo "<script>alert('添加失败!')</script>";
			echo "<script>location='add.php'</script>";	
		}
	} else {
		# code...
		echo "<script>alert('两次密码不一致')</script>";
		echo "<script>location='add.php'</script>";
	}
	



  ?>