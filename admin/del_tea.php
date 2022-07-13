<?php require_once('../test.php');?>
<form action="" method="post" >
    请输入教师名：
    <input type="text" name="xingming">
    <input type="submit" value="删除教师"name="modify">
</form>
<a href="admin.php">返回上一级</a>
<?php
if($_POST!=NULL){
    $n=$_POST['xingming'];

	$conn = new mysqli("localhost","root","root","stu");
    $sql="DELETE FROM teacher WHERE tname = '$n'";
    $result = mysqli_query($conn,$sql);
    $sql2="DELETE FROM users WHERE username = '$n'";
    $result = mysqli_query($conn,$sql2);
    if($result){
        echo "<script>alert('修改成功');window.location='admin.php'</script>";
    }
}
?>