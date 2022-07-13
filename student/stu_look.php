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
		<table width="600" border="1" style="border-collapse: collapse;">
		<h1 style="text-align: center;color: #ffcccc;"><?=$user?>的成绩 &#127881;</h1>
		<form method="post" action="">
        请选择查看的学期:    
        	<select required="required" type="text" class="form-control" name="termtype" placeholder="Choose Accounttype">
				<option>大一上</option>
				<option>大一下</option>
				<option>大二上</option>
				<option>大二下</option>
			</select>
            <input type="submit" name="" id="" value="查看" />
        </form>
		<tr>
			<th>学期</th>
			<th>科目</th>
			<th>成绩</th>
		</tr>
	<?php
	
    $conn = new mysqli("localhost", "root", "root","stu");

	//isset判断为不为空，只返回ture或者false。
		$term=$_POST["termtype"];
		$sql = "select * from grade WHERE term = '$term' and sname = '$user'";
		$result = mysqli_query($conn,$sql);
		echo "<br>";
		// 输出数据
		foreach($result as $row)
		{	
			//while($row=mysqli_fetch_row($result)){}
			echo "<tr>";
			echo "<td>{$row['term']}</td>";
			echo "<td>{$row['coursename']}</td>";
			echo "<td>{$row['grade']}</td>";
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
