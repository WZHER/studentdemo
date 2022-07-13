<?session_start();
$user=$_SESSION['username']
?>
<?php require_once('../test.php');?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>管理员信息</title>
</head>
<body>
    <center>
        </br>
        <h1>欢迎!&#10071;<?= $user?> &#128084;</h1>
        </br>
        <table border="6">
        <tr>
            <td style="color:#08d9d6">学生管理:</td>
            <td>
                <form action="adm_look_stu.php">
                    <input type="submit" value="查看学生信息">
                </form>
            </td>
            <td>
                <form action="add_stu.php">
                    <input type="submit" value="增添学生">
                </form>
            </td>
            <td>
                <form action="del_stu.php">
                    <input type="submit" value="删除学生">
                </form>
            </td>
        </tr>

        <tr>
            <td style="color:#ff2e63">教师管理:</td>
            <td>
                <form action="adm_look_tea.php">
                    <input type="submit" value="查看教师信息" >
                </form>
            </td>
            <td>
                <form action="add_tea.php">
                    <input type="submit" value="增添教师">
                </form>
            </td>
            <td>
                <form action="del_tea.php">
                    <input type="submit" value="删除教师">
                </form>
            </td>
        </tr>
        </table>
        <a href="../login.php">退出登录</a>
    <center>