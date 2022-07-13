<?session_start();
$user=$_SESSION['username'];
?>
<?php require_once('../test.php');?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>增加学生</title>
</head>
<body>
	<center>
		<h3>增加学生</h3>
		<form action="" method="post">
			<!-- 使用隐藏域，把id提交过去，说明就是修改这条记录的数据 -->
			<table>
                <tr>
					<td>姓名</td>
					<td>
						<input type="text" name="name"> 
					</td>
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
					<td><input type="text" name="age"  required> </td>
				</tr>
				<tr>
					<td>班级</td>
					<td><input type="text" name="classid" required > </td>
				</tr>
				<tr>
					<td>密码</td>
					<td><input type="text" name="pwd"  required> </td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td>
						<input type="submit" value="增加" />
						<input type="reset" value="重置" />
					</td>
				</tr>
			</table>
		</form>
		<?php 
		//1.连接数据库
		if($_POST!=NULL){
			$conn = new mysqli("localhost", "root", "root","stu");
			$name=$_POST['name'];
			$sex = $_POST['sex'];
			$age = $_POST['age'];
			$classid = $_POST['classid'];
			$id=$_POST['id'];
			$pwd=$_POST['pwd'];
			
			//2.拼SQL语句，取信息
			$sql = "INSERT INTO student(sname,ssex,sage,sclass,sid,spwd)
					VALUES('$name','$sex','$age','$classid','$id','$pwd');";
			//echo $sql;
			$result1= mysqli_query($conn,$sql);
			$type='student';
			$sql2="INSERT INTO users(usertype,username,password)
				VALUES('$type','$name','$pwd')";
			$result2= mysqli_query($conn,$sql2);
			if($result1 >0 && $result2>0){
				echo "<script>alert('修改成功');window.location='admin.php'</script>";
			}
		}
        //else{
		// 	echo "<script>alert('修改失败');window.location='tea_look.php'</script>";
		// }
		?>
		<a href="admin.php">返回上一级</a>
	</center>
</body>
</html>

