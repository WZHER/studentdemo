<?session_start();
$user=$_SESSION['username'];
?>
<?php require_once('../test.php');?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>	教师信息</title>
</head>
<body>
	<center>
		<table width="600" border="1" style="border-collapse: collapse;">
		<br>
			<h1 style="text-align:center;">欢迎  <?= $user?> &#129488; 老师</h1>
            <caption>学生信息表</caption>
				<tr>
					<th>学号</th>
					<th>姓名</th>
					<th>性别</th>
					<th>年龄</th>
					<th>班级</th>
					<th>成绩</th>
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
                    $sql = "SELECT * FROM student";
                    $result = mysqli_query($conn,$sql);
					echo "<br>";
					// 输出数据
				for($i=1;$i<11;$i=$i+1)
                {	
                    $row=mysqli_fetch_assoc($result);
                    //while($row=mysqli_fetch_row($result)){}
					echo "<tr>";
					echo "<td>{$row['sid']}</td>";
					echo "<td>{$row['sname']}</td>";
					echo "<td>{$row['ssex']}</td>";
					echo "<td>{$row['sage']}</td>";
					echo "<td>{$row['sclass']}</td>";
                    echo "<td>
                    	<a href='tea_look.php?name={$row['sname']}'>查看</a>
                    </td>";
					echo "<td>
						<a href='tea_edit.php?name={$row['sname']}'>修改</a>
					</td>";
					echo "</tr>";
                }
				?>
	<form action="add_course.php" method="post">
        <div>
            <button type="submit">添加课程</button>
        </div>
    </form>
		</table>
		<a href="../login.php">退出登录</a>
	</center>
</body>
</html>
