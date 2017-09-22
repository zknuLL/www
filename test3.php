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
	//通过php连接MySQL数据库:
	$conn = @mysql_connect("localhost", "root", "123456");
	if (!$conn) {
		# code...
		echo "<h2>mysql错误编码:".mysql_errno()."</h2>";
		echo "<h2>mysql 错误信息:".mysql_error()."</h2>";
		
	} else {
		# code...
		//选择数据库
	mysql_select_db("test");
	//设置客户端和连接字符集
	mysql_query("set names utf-8");
	//从表单收的数据
	$username = "user1";
	$password = "123455";
	//通过php进行insert操作;
	//删除
	//$sql = "delete from t2 where id=10";

	//修改
	// $sql = "update t2 set username='user2',password = '87987' where id = 10";
	//插入
	// $sql = "insert into t2(username, password) values('{$username}','{$password}')";

	$length=11;
	$pagenum=$_GET['page']?$_GET['page']:1;
	//总行数
	$totsql = "select count(*)from t2";
	$totarr = mysql_fetch_row(mysql_query($totsql));
	$pagetot = ceil($totarr[0]/$length);
	//限制最大页数
	if ($pagenum>=$pagetot) {
		$pagenum = $pagetot;
	}

	$offset = ($pagenum-1)*$length;

	$sql ="select *from t2 order by id limit {$offset},{$length}";

	// //执行这条语句
	// var_dump(mysql_query($sql));
	$result = mysql_query($sql);
	// //$row = mysql_fetch_assoc($result);
	$row = mysql_fetch_assoc($result);
	echo "<center>";
	echo "<table width = '700px' border = '1px'>";
	
	while ($row = mysql_fetch_assoc($result)) {
		
		echo "<tr>";
		echo "<td>{$row['id']}</td>";
		echo "<td>{$row['username']}</td>";
		echo "<td>{$row['password']}</td>";
		echo "</tr>";
		
	}
	
	echo "</table>";

	$prevpage =$pagenum-1;
	$nextpage =$pagenum+1;
	echo "<h2><a href='test3.php?page={$prevpage}'>上一页</a>|<a href='test3.php?page={$nextpage}'>下一页</a></h2>";

	echo "</center>";


	//释放连接资源
	mysql_close($conn);
	// echo "</table>";
	// echo "<h2><a href = 'test3.php?page ={$prevpage}'>上一页< href = 'test3.php?page = {$nextpage}'>下一页</a></h2>";
	// echo "</center>";
	}
	




	
	
 ?>
