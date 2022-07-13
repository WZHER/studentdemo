<?php require_once('../test.php');?>
<form action="" method="post" >
    请输入课程名：
    <input type="text" name="course"><br>
    请输入学分：
    <input type="text" name="credit">
    <input type="submit" value="添加" name="modify">
</form>
<?php
    $n=$_POST['course'];
    $m=$_POST['credit'];
	$conn = new mysqli("localhost","root","root","stu");
    $sql="INSERT INTO course (coursename,ccredit) 
    VALUES ('$n','$m')";
    $result = mysqli_query($conn,$sql);
?>
<a href="teacher.php">返回上一级</a>
