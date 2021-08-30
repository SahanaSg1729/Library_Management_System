<?php
	include("setting.php");
	session_start();
	$name=$_POST['name'];
	$email=$_POST['email'];
	$phn=$_POST['phn'];
	$address=$_POST['address'];
	$pas=md5($_POST['pass']);
	if($name==NULL || $email==NULL || $phn==NULL || $address==NULL || $_POST['pass']==NULL)
	{
		//
	}
	else
	{
		$sql=mysqli_query($set,"INSERT INTO readers(full_name,phone_no,mail_id,address,password) VALUES('$name','$phn','$email','$address','$pas')");
		if($sql)
		{
			$a=mysqli_query($set,"SELECT user_id FROM readers WHERE mail_id='$email'");
			if(mysqli_num_rows($a)==1)
			{
				$b=mysqli_fetch_array($a);
				$user_id=$b['user_id'];
				$_SESSION['user_id']=$user_id;
				$_SESSION['name']=$name;
				header("location:s_reg_user.php");
			}
		}
		else
		{
			$msg="User Already Exists";
		}
	}
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
		<div id="wrapper">
			<br />
			<br />
			<span class="SubHead">User Registration</span>
			<br />
			<br />

			<form method="post" action="">
				<table border="0" cellpadding="4" cellspacing="4" class="table">
					<tr><td colspan="2" align="center" class="msg"><?php echo $msg; unset($msg); ?></td></tr>
					<tr><td class="labels">Name : </td>
					<td><input type="text" name="name" class="fields" placeholder="Enter Full name" required="required" size="25" /></td></tr>
					<tr><td class="labels">Email ID : </td>
					<td><input type="email" name="email" class="fields" placeholder="Enter Email ID" required="required" size="25" /></td></tr>
					<tr><td class="labels">Phone Number: </td>
					<td><input type="tel" name="phn" class="fields" placeholder="Enter Phone Number" required="required" size="25" /></td></tr>
					<tr><td class="labels">Address: </td>
					<td><input type="text" name="address" class="fields" placeholder="Enter Full Address" required="required" size="25" /></td></tr>     
					<tr><td class="labels">Password:</td>
						<td><input type="password" name="pass" class="fields" placeholder="Enter Password" required="required" size="25" /></td></tr>
					<br>
					<tr><td colspan="2" align="center"><input type="submit" value="Register" class="fields" /></td></tr>
				</table>
			</form><br />
			<br />
			<a href="../index.php" class="link">Go Back</a>
			<br />
			<br />

		</div>
	</div>
	</body>
</html>