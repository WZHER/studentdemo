<?session_start();
$user=$_SESSION['username'];
?>
<?php require_once('../test.php');?>
<!DOCTYPE html>
<html>
<head> 
<meta charset="utf-8"> 
<title>学生信息</title>
    <center>
    <h1><?=$user?>的个人信息&#128516;</h1>
<h2>
    <?php
        $conn = new mysqli("localhost", "root", "root","stu");
        //isset判断为不为空，只返回ture或者false。
        $sql = "select * from student WHERE  sname = '$user'";
        $result = mysqli_query($conn,$sql);//mysqli_query() 函数执行某个针对数据库的查询。
        while($myrow=mysqli_fetch_assoc($result)){
            $row=$myrow;
        }
            echo "&#127380: ".$row["sid"]."<br>";
            echo "姓名: ".$row["sname"]."<br>";
            echo "性别: ".$row["ssex"]."<br>";
            echo "年龄: ".$row["sage"]."<br>";
            echo "班级: ".$row["sclass"];
            //print_r($row)
    ?>
    <form action="stu_look.php" method="post">
        <div>
            <button type="submit">查看成绩</button>
        </div>
    </form>
    <form action="stu_course.php" method="post">
        <div>
            <button type="submit">查看本学期课程</button>
        </div>
    </form>
    <form action="stu_modify.php" method="post">
        <div>
            <button type="submit">修改密码</button>
        </div>
    </form>
    
    </h2>
    <a href="../login.php">退出登录</a>
    <center>
</head>
</html>
<style>