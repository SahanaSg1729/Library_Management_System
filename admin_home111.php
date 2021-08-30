<?php
	include("setting.php");
	session_start();
	if(!ISSET($_SESSION['admin_id'])){
		header('location: index.php');
    }
    $admin_id=$_SESSION['admin_id'];
	$name=$_SESSION['name'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>BANGTAN Library Management System</title>
    <link href="stylesheet.css" rel="stylesheet" type="text/css" />
    <link rel = "alternate stylesheet" type = "text/css" href = "css/bootstrap.css" />
</head>

<body>

    <div id="banner">
        <span class="head">BANGTAN Library Management System</span><br />
        <marquee class="clg" direction="right" behavior="alternate" scrollamount="1">WELCOME TO ONLINE LIBRARY MANAGEMENT SYSTEM</marquee>
    </div>
    <br />

    <div class="container-fluid"; align="center">
    
        <div class="w1" >
            <div  id="wrapper"  >
                <br />
                <br />
                <br />
                <div align="center" class="button"></p><a href="register.php" class="link">Book List</a></div>
                <br />
                <div align="center" class="button"><a href="admin.php" class="link">Register</a></div>
                <br />
                <div align="center" class="button"><a href="admin.php" class="link">Issued Books</a></div>
                <br />
                <div align="center" class="button"><a href="admin.php" class="link">User</a></div>
                <br />
                <div align="center" class="button"><a href="admin.php" class="link">Reqused Book</a></div>
                <br/>
                <div align="center" class="button"><a href="logout.php" class="link">LogOut</a></div>
                <br/>
                <br/>
            </div>
        </div>
    </div>

</body>
</html>