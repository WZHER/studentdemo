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
	<h1 style="text-align:center;">欢迎  <?= $user?> </h1>
		<table width="360" border="1">
			<tr>
				<th>用户类型</th>
				<th>姓名</th>
				<th>密码</th>
			</tr>
			<?php
				//1.连接数据库
    //修改密码，录入成绩，成绩查询，任课查询
        //1.连接数据库
		$servername = "localhost";
		$username = "root";
		$password = "root";
			 
		// 创建连接
		$conn = new mysqli($servername, $username, $password,"stu");
		//2.执行SQL查询，并解析与遍历
	
		$sql = "SELECT * FROM user";
		$result = mysqli_query($conn,$sql);
		echo "<br>";
		// 输出数据
				//2.执行SQL查询，并解析与遍历 
		while($row=mysqli_fetch_assoc($result))
		{	
			echo "<tr>";
			echo "<td>{$rows['sid']}</td>";
			echo "<td>{$rows['sname']}</td>";
			echo "<td>{$rows['ssex']}</td>";
			echo "<td>{$rows['sage']}</td>";
			echo "<td>{$rows['scredit']}</td>";
			echo "<td>
				<a href='javascript:doDel({$rows['id']})'>删除</a>
				<a href='edit.php?id={$rows['id']}'>修改</a>
			</td>";
			echo "</tr>";
		}
		$conn->close();
			?>
		</table>
	</center>
</body>
<script>
	function doDel(id){
		if(confirm("确定要删除吗？")){
			window.location = 'action.php?action=del&id='+id;
		}
	}
</script>
</html>