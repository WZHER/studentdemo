<!DOCTYPE html>
<html lang="zh">
<head>
	<meta charset="utf-8" />
	<title>	学生成绩操作系统</title>
</head>
<?php
session_start();

$conn=new mysqli("localhost","root","root","stu");
$msg="";
//isset() 函数用于检测变量是否已设置并且非 NULL。
if(isset($_POST["login"])){
    $username=$_POST["username"];
    $password=$_POST["password"];
    $usertype=$_POST["usertype"];

    $_SESSION['user']=$username;
    
    $sql="SELECT * FROM users WHERE username=? AND password=? AND usertype=?";
    $stmt=$conn->prepare($sql);
    $stmt->bind_param("sss",$username,$password,$usertype);
    $stmt->execute();
    $result=$stmt->get_result();
    $row=$result->fetch_assoc();

    session_regenerate_id();
    $_SESSION['username']=$row['username'];
    $_SESSION['role']=$row['usertype'];


    if($result->num_rows ==1 && $_SESSION['role']=='student'){
        header("location:./student/student.php");
    }else if($result->num_rows ==1 && $_SESSION['role']=='teacher'){
        header("location:./teacher/teacher.php");
    }else if($result->num_rows ==1 && $_SESSION['role']=='admin'){
        header('location:./admin/admin.php');
    }else{
        $msg="username or passsword is incorrect..";
    }
}

?>


<!DOCTYPE html>
<html lang="ch">
<?php require_once('test.php');?>
<link rel="stylesheet" type="text/css" href="c.css" />
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>login system</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body >
    <main>
        <br><br><br><br>
        <section>
            <div class="container p-4">
                <div class="row justify-content-center">
                    <div class="col-lg-5 m-4 bg-light ">
                    <br>
                        <h3 class="text-center">欢迎 登录</h3>
                        <form action=" <?= $_SERVER['PHP_SELF'] ?> " method="post">
                            <div class="form-group">
                                <label for="username">用户名</label>
                                <input type="text" name="username" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="password">密码</label>
                                <input type="password" name="password" class="form-control" required>
                            </div>
                            <div class="form-group lead">
                                <label for="type">I am a :</label>
                                <input type="radio" name="usertype" value="student" required> &nbsp; 学生 |
                                <input type="radio" name="usertype" value="teacher" required> &nbsp; 教师 |
                                <input type="radio" name="usertype" value="admin" required> 管理员
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-block bg-warning" name="login" value="Submit">
                            </div>
                            <h5 class="text-danger text-center"><?= $msg;  ?></h5>
                        </form>

                    </div>
                </div>
            </div>
        </section>
    </main>
<!-- <script type="text/javascript" src="http://libs.baidu.com/jquery/1.8.3/jquery.js"></script>
<script type="text/javascript" src="http://libs.baidu.com/jquery/1.8.3/jquery.min.js"></script> -->
<script type="text/javascript" src="particlesjs-config.json"></script>
</body>
</html>