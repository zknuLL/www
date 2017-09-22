<?php  ?>
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
	$id = $_POST['id'];

		$sql ="update t2 set username='{$username}',password='{$password}' where id ={$id}";
 		if (mysql_query($sql)) {
			echo "<script>alert('添加成功')</script>";
			echo "<script>location='test3.php'</script>";
		} else {
			echo "<script>alert('添加失败!')</script>";
			echo "<script>location='edit.php'</script>";	
		}	



  ?>