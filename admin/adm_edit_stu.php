<?session_start();
$user=$_SESSION['username'];
$name =$_GET['name'];
?>
<?php require_once('../test.php');?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>修改学生信息</title>
</head>
<body>
	<center>
		<h3>修改学生信息</h3>
		<form action="" method="post">
			<!-- 使用隐藏域，把id提交过去，说明就是修改这条记录的数据 -->
			<table>
				<tr>
					<td>姓名</td>
					<td><?=$name?></td>
				</tr>
				<tr>
					<td>性别</td>
					<td>
						<input type="radio" name="sex" value="男"  > 男
						<input type="radio" name="sex" value="女"  > 女
					</td>
				</tr>
                <tr>
					<td>学号</td>
					<td><input type="text" name="id" required> </td>
				</tr>
				<tr>
					<td>年龄</td>
					<td><input type="text" name="age" required> </td>
				</tr>
				<tr>
					<td>班级</td>
					<td><input type="text" name="classid"required > </td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td>
						<input type="submit" value="修改" />
						<input type="reset" value="重置" />
					</td>
				</tr>
			</table>
		</form>
		
		<?php 
		if($_POST!=NULL){
		//1.连接数据库
			$conn = new mysqli("localhost", "root", "root","stu");
			$sex = $_POST['sex'];
			$age = $_POST['age'];
			$classid = $_POST['classid'];
			$id=$_POST['id'];
			//2.拼SQL语句，取信息
			$sql = "UPDATE student set ssex='$sex', sage='$age', sclass='$classid',sid='$id' where sname='$name'"; 
			$result= mysqli_query($conn,$sql);
		}
		// if($result){
		// 	echo "<script>alert('修改成功');window.location='teacher.php'</script>";
		// }else{
		// 	echo "<script>alert('修改失败');window.location='tea_look.php'</script>";
		// }
		?>
		<a href="admin.php">返回上一级</a>
	</center>
</body>
</html>
