<?php
    session_start();
    echo "start";
    unset($_SESSION['user_id']);
    unset($_SESSION['admin_id']);
    unset($_SESSION['error']);
    session_destroy();
    echo "end";
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

    
    <div  >
    
        <div  class = "first-wrapper"  >
                <br>
                <h1 style="text-align:center;" class="SubHead">User Sign In</h1>
                <br>
                <div align="center" class="button"></p><a href="user/user_reg.php" class="link">Sign Up</a></div>
                <br>
                <div align="center" class="button"></p><a href="user/user_login.php" class="link">Login In</a></div>
                <br>
                <br>
        </div>
        <div  class = "second-wrapper" >
                <br>
                <h1 style="text-align:center;" class="SubHead">Admin Sign In</h1>
                <br>
                <div align="center" class="button"></p><a href="admin/admin_reg.php" class="link">Sign Up</a></div>
                <br>
                <div align="center" class="button"></p><a href="admin/index.php" class="link">Login In</a></div>
                <br>
                <br>
        </div>
  
    </div>

</body>
</html>