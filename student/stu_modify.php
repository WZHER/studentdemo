<?session_start();
$user=$_SESSION['username'];?>
<?php require_once('../test.php');?>
<html>
    <head>
        <title>修改密码&#128272;</title>
        <style type="text/css">
            div{
                text-align: center;
                font-size: 24px;
                font-weight: bold;
                color: "#008000";
            }
            table{
                width: 300px;
            }
        </style>
    </head>
            <body>
                <h1 style="text-align: center;color: #ffcccc;">修改密码&#128272;</h1> 
                <center>
                <form method="post">
                    <table >
                        <tr>
                            <td>用&nbsp;户&nbsp;名：</td>
                            <td><input name="name" size="13" type="text"required></td>
                            <tr>
                            <td>密&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;码：</td>
                            <td><input name="pwd" size="13" type="text" required></td>
                            <tr>
                            <td>重复密码：</td>
                            <td><input name="repwd" size="13" type="text"required></td>
                            </tr>
                            <td nowrap>
                                <input type="submit" name="modify" value="修改密码">
                            </td>
                            
                        </tr>
                    </table>
                </form>
                <form action="student.php">
                    <td><input type="submit" name="back" value="返回上一级"></td>
                </form>
                <center>
<?php
   $conn = new mysqli("localhost", "root", "root","stu");
   if(isset($_POST["modify"])){
        $name=$_POST["name"];
        $pwd=$_POST["pwd"];
        $repwd=$_POST["repwd"];
        if($pwd!=$repwd){
            echo "两次输入的密码不一致";
        }
        else{
        $sql = "UPDATE users set password='$pwd' where username='$user'";
        // echo $sql;
        // exit;
        $result = mysqli_query($conn,$sql);
		if($result){
			echo "<script>alert('修改成功,请重新登录');window.location='../login.php'</script>";
		}else{
			echo "<script>alert('修改失败');window.location='stu_modify.php'</script>";
		}
    }

   }
?>
