<?php
	//页面字符集
	header("content-type:text/html;charset=utf-8");
	//通过php连接数据库
	$conn=@mysql_connect("localhost","root","123456");
	//选择数据库
	mysql_select_db("test");
	//设置客户端和连接字符集
	mysql_query("set names utf8");

	//准备sql语句
	$sql="delete from t2 where id={$_GET['id']}";
	
	if (mysql_query($sql)) {
		echo "<script>alert('删除成功')</script>";
		echo "<script>location='test3.php'</script>";

	} else {
		echo "<script>alert('删除不成功')</script>";
		echo "<script>location='test3.php'</script>";
	}

	echo $sql;

?>