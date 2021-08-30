<?php
    include("setting.php");
    session_start();
    if(isset($_SESSION['user_id']))
    {
        header("location:user_home.php");
    }
    $user_id=mysqli_real_escape_string($set,$_POST['user_id']);
    $pass=mysqli_real_escape_string($set,$_POST['pass']);

    if($user_id==NULL || $_POST['pass']==NULL)
    {
        //
    }
    else
    {
        $p=md5($pass);
        $sql=mysqli_query($set,"SELECT * FROM readers WHERE user_id='$user_id' AND password='$p'");
        if(mysqli_num_rows($sql)==1)
        {
            $_SESSION['user_id']=$_POST['user_id'];
            $a=mysqli_query($set,"SELECT full_name FROM readers WHERE user_id='$user_id'");
			if(mysqli_num_rows($a)==1)
			{
				$b=mysqli_fetch_array($a);
				$name=$b['full_name'];
				$_SESSION['name']=$name;
				header("location:user_home.php");
            }
            
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
            <span class="SubHead">User Sign In</span>
            <br />
            <br />
            <form method="post" action="">
                <table border="0" cellpadding="4" cellspacing="4" class="table">
                    <tr><td colspan="2" align="center" class="msg"><?php echo $msg;?></td></tr>
                    <tr><td class="labels">User ID : </td><td><input type="text" name="user_id" class="fields" size="25" placeholder="Enter Student ID" required="required" /></td></tr>
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