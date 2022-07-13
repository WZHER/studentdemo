<?session_start();
$user=$_SESSION['username'];
$name =$_GET['name'];
?>
<!DOCTYPE html>
<html>
<?php require_once('../test.php');?>
	<head>
		<meta charset="utf-8" />
		<title>学生资料</title>
		<link rel="icon" href="1F604.png">
	</head>	
	<body >
	<center>
		<table width="600" border="1" style="border-collapse: collapse;">
		<h1 style="text-align: center;color: #ffcccc;"><?=$name?>的成绩 &#127881;</h1>
		<tr>
			<th>学期</th>
			<th>科目</th>
			<th>成绩</th>
		</tr>
		<a href="teacher.php">返回上一级</a>
<?php

    $conn = new mysqli("localhost", "root", "root","stu");

	//isset判断为不为空，只返回ture或者false。
		$sql = "select * from grade WHERE sname = '$name'";
		$result = mysqli_query($conn,$sql);
		echo "<br>";
		// 输出数据

		while($row=mysqli_fetch_assoc($result))
		{	
			//while($row=mysqli_fetch_row($result)){}
			echo "<tr>";
			echo "<td>{$row['term']}</td>";
			echo "<td>{$row['coursename']}</td>";
			echo "<td>{$row['grade']}</td>";
			echo "</br>";
		}

?>