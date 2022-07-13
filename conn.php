<?php
	$servername = "localhost";
	$username = "root";
	$password = "root";
 
	// 创建连接
	$conn = new mysqli($servername, $username, $password);
 	if($conn)           //检测数据库是否连接成功
	{
		mysqli_select_db($conn,'stu');
		mysqli_query($conn,"SET NAMES UTF8");	
	}
	else
	{
		echo "数据库没有连接成功！";
	} 
    mysqli_select_db($conn,'stu');
    mysqli_query($conn,"SET NAMES utf8");
?>