<?php
	//用id去取相关数据	
	//连接数据库
	$conn = @mysql_connect("localhost","root", "123456");

	//选择数据库
	mysql_select_db("test");

	// 选择字符集
	mysql_query("set names utf8");	
	//SQL语句
	$sql = "select * from t2 where id = {$_GET['id']}";
	$rst = mysql_query($sql);
	$row = mysql_fetch_assoc($rst);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
</head>
<body>
	<center>
		<h2>用户修改</h2>
		<form action="updata.php?id=<?php echo $_GET['id'];?>" method="post">
			用户:<input type="text"	 name="username" id="" value="<? echo $row['username']; php?>">
			<br>
			密码:<input type="password" name="password" id="" value="<? echo $row['password']; php?>">
			<br> 
			<input type="hidden" name="id" value="<?php echo $_GET['id'];  ?>">
			<input type="submit" name="" value="提交">
			<input type="reset" name="" value="重置">
		</form>
	</center>
</body>
</html>
