<?php require_once('../test.php');?>
<form action="" method="post" >
    请输入学生名：
    <input type="text" name="xingming">
    <input type="submit" value="删除学生" name="modify">
</form>
<?php
if($_POST!=NULL){
    $n=$_POST['xingming'];
	$conn = new mysqli("localhost","root","root","stu");
    $sql="DELETE FROM student WHERE sname = '$n'";
    $result = mysqli_query($conn,$sql);
    $sql2="DELETE FROM users WHERE username = '$n'";
    $result = mysqli_query($conn,$sql2);
    if($result){
        echo "<script>alert('修改成功');window.location='admin.php'</script>";
    }
}
?>
<a href="admin.php">返回上一级</a>