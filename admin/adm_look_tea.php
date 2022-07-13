<?session_start();
$user=$_SESSION['username'];
?>
<?php require_once('../test.php');?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>	学生信息管理</title>
</head>
<body>
	<center>
		<table width="600" border="1" style="border-collapse: collapse;">
			<h1 style="text-align:center;">欢迎  &#10071;<?= $user?> &#128084;</h1>
            <caption>教师信息表</caption>
				<tr>
					<th>姓名</th>
					<th>性别</th>
					<th>年龄</th>
					<th>电话</th>
                    <th>操作</th>
				</tr>
				<?php
					//修改密码，录入成绩，成绩查询，任课查询
						//1.连接数据库
					$servername = "localhost";
					$username = "root";
					$password = "root";
						
					// 创建连接
					$conn = new mysqli($servername, $username, $password,"stu");
					//2.执行SQL查询，并解析与遍历
                    $sql = "SELECT * FROM teacher";
                    $result = mysqli_query($conn,$sql);
					echo "<br>";
					// 输出数据
				for($i=1;$i<11;$i=$i+1)
                {	
                    $row=mysqli_fetch_assoc($result);
                    //while($row=mysqli_fetch_row($result)){}
					echo "<tr>";
					echo "<td>{$row['tname']}</td>";
					echo "<td>{$row['tsex']}</td>";
					echo "<td>{$row['tage']}</td>";
					echo "<td>{$row['tphone']}</td>";
					echo "<td>
						<a href='adm_edit_tea.php?name={$row['tname']}'>修改</a>
					</td>";
					echo "</tr>";
                }
				?>
		</table>
		<a href="admin.php">返回上一级</a>
	</center>
</body>
</html>
