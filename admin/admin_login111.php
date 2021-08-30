<?php
include("includes/conn.php");
session_start();
if(isset($_SESSION['admin_id']))
{
	header("location:home.php");
}
$admin_id=mysqli_real_escape_string($set,$_POST['admin_id']);
$pass=mysqli_real_escape_string($set,$_POST['pass']);

if($admin_id==NULL || $_POST['pass']==NULL)
{
	//
}
else
{
	$p=md5($pass);
	$sql=mysqli_query($set,"SELECT * FROM admin WHERE admin_id='$admin_id' AND password='$p'");
	if(mysqli_num_rows($sql)==1)
	{
		$_SESSION['admin_id']=$_POST['admin_id'];
		header("location:home.php");
	}
	else
	{
		$msg="Incorrect Details";
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Library Management System</title>
    <link href="../stylesheet.css" rel="stylesheet" type="text/css" />
</head>

<body>
    <div id="banner">
        <span class="head">BANGTAN Library Management System</span><br />
        <marquee class="clg" direction="right" behavior="alternate" scrollamount="1">WELCOME TO ONLINE LIBRARY MANAGEMENT SYSTEM</marquee>
    </div>
    <br />

    <div align="center">
        <div id="wrapper">
            <br />
            <br />
            <span class="SubHead">Admin Sign In</span>
            <br />
            <br />
            <form method="post" action="">
                <table border="0" cellpadding="4" cellspacing="4" class="table">
                    <tr><td colspan="2" align="center" class="msg"><?php echo $msg;?></td></tr>
                    <tr><td class="labels">Admin ID : </td><td><input type="text" name="admin_id" class="fields" size="25" placeholder="Enter Student ID" required="required" /></td></tr>
                    <tr><td class="labels">Password : </td><td><input type="password" name="pass" class="fields" size="25" placeholder="Enter Password" required="required" /></td></tr>
                    <tr><td colspan="2" align="center"><input type="submit" value="Login " class="fields" /></td></tr>
                </table>
            </form>
            <br />
            <br />
            <a href="../index.php" class="link">HOME</a>


            <br />
            <br />

        </div>
    </div>
</body>
</html>