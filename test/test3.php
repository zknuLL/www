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
		echo "<h2>mysql错误编码:".mysql_errno()."</h2>";
		echo "<h2>mysql 错误信息:".mysql_error()."</h2>";
		
	} else {
		//选择数据库
	mysql_select_db("test");
	//设置客户端和连接字符集
	mysql_query("set names utf-8");

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

	$result = mysql_query($sql);
	$row = mysql_fetch_assoc($result);

	//显示数据
	echo "<center>";
	echo "<h2>查看用户|<a href='add.php'>添加用户</a></h2>";
	echo "<table width = '700px' border = '1px'>";
	echo "<tr>";
	echo "<th>ID</th>";
	echo "<th>用户</th>";
	echo "<th>密码</th>";
	echo "<th>修改</th>";
	echo "<th>删除</th>";

	echo "</tr>";
	while ($row = mysql_fetch_assoc($result)) {
		 
		echo "<tr>";
		echo "<td>{$row['id']}</td>";
		echo "<td>{$row['username']}</td>";
		echo "<td>{$row['password']}</td>";
		echo "<td><a href ='edit.php?id={$row[id]}'>修改</a></td>";
		echo "<td><a href ='del.php?id={$row[id]}'>删除</a></td>"; 
		echo "</tr>";
	}
	echo "</table>";

	$prevpage =$pagenum-1;
	$nextpage =$pagenum+1;
	echo "<h2><a href='test3.php?page={$prevpage}'>上一页</a>|<a href='test3.php?page={$nextpage}'>下一页</a></h2>";

	echo "</center>";


	//释放连接资源
	mysql_close($conn);

	}
	




	
	
 ?>
