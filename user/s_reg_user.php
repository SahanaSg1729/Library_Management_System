<?php
	session_start();
    if(!isset($_SESSION['user_id']))
    {
        header("location:../index.php");
    }
    $user_id=$_SESSION['user_id'];
    $name=$_SESSION['name'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>BANGATAN Library Management System</title>
	<link href="../stylesheet.css" rel="stylesheet" type="text/css" />
</head>

<body>
	<div id="banner">
		<span class="head">BANGTAN Library Management System</span><br />
		<marquee class="clg" direction="right" behavior="alternate" scrollamount="1">BTS</marquee>
	</div>
    <br />
    <div align="center">
		<div class="box1">
			<br>
			<br>
			<span class="SubHead">Successfully Registered</span>
			<br>
            <br>
            <br>
            <p>HELLO <?php echo $name ?> </p>
            <p>WELCOME TO BANGTAN LIBRARY MANAGEMENT SYSTEM </p>
            <p>USER_ID= <?php echo $user_id ?></p>
            <br>
            <br>
            <br>
            <div align="center" class="button" style="margin-left:1%;"></p><a href="../logout.php" class="link">HOME PAGE</a></div>
            <br>
            <br>
        </div>
    </div>
</body>