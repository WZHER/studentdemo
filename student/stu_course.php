<?session_start();
$user=$_SESSION['username'];?>
<?php require_once('../test.php');?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>学生资料</title>
		<link rel="icon" href="1F604.png">
	</head>	
	<body >
	<center>
		<table width="400" border="1" style="border-collapse: collapse;">
		<h1 style="text-align: center;color: #ffcccc;"><?=$user?>本学期课程 &#127881;</h1> 
		<tr>
			<th>学分</th>
			<th>科目</th>
		</tr>
	<?php
	
    $conn = new mysqli("localhost", "root", "root","stu");

	//isset判断为不为空，只返回ture或者false。
		$term=$_POST["termtype"];
		$sql = "select * from course WHERE cterm = '大二下'";
		$result = mysqli_query($conn,$sql);
		echo "<br>";
		// 输出数据
		foreach($result as $row)
		{	
			//while($row=mysqli_fetch_row($result)){}
			echo "<tr>";
			echo "<td>{$row['ccredit']}</td>";
			echo "<td>{$row['coursename']}</td>";
			echo "</br>";
		}
	
	?>
		</body>
		</table>
		<form form method="post" action="student.php">
		<input type="submit" value="返回上一级"></input>
	</form>
	<center>
</html>