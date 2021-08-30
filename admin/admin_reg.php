<?php
	include("setting.php");
	session_start();
	$name=$_POST['name'];
	$phn=$_POST['phn'];
	$branch=$_POST['branch'];
	$pas=md5($_POST['pass']);
	if($name==NULL || $phn==NULL || $branch==NULL || $_POST['pass']==NULL)
	{
		//
	}
	else
	{
		$sql1=mysqli_query($set,"SELECT branch_id FROM branch WHERE branch_name='$branch'");
		if(mysqli_num_rows($sql1)==1)
		{
			$sql2=mysqli_fetch_array($sql1);
			$branch_id=$sql2['branch_id'];
		}
		$sql=mysqli_query($set,"INSERT INTO admin(admin_name,phone_number,branch_id,password) VALUES('$name','$phn','$branch_id','$pas')");
		if($sql)
		{
			$a=mysqli_query($set,"SELECT admin_id FROM admin WHERE phone_number='$phn'");
			if(mysqli_num_rows($a)==1)
			{
				$b=mysqli_fetch_array($a);
				$admin_id=$b['admin_id'];
				$_SESSION['admin_id']=$admin_id;
				$_SESSION['name']=$name;
				header("location:s_reg_admin.php");
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

<span class="SubHead">Admin Registration</span>
<br />
<br />
<form method="post" action="">
<table border="0" cellpadding="4" cellspacing="4" class="table">
<tr><td colspan="2" align="center" class="msg"><?php echo $msg;?></td></tr>
<tr><td class="labels">Name : </td><td>
    <input type="text" name="name" class="fields" placeholder="Enter Full name" required="required" size="25" /></td></tr>
<tr><td class="labels">Phone Number: </td><td>
    <input type="tel" name="phn" class="fields" placeholder="Enter Phone Number" required="required" size="25" /></td></tr>
<tr><td class="labels">Branch </td><td>
    <input type="text" name="branch" class="fields" placeholder="Enter Branch Name" required="required" size="25" /></td></tr>     
<tr><td class="labels">Password : </td>
    <td><input type="password" name="pass" class="fields" placeholder="Enter Password" required="required" size="25" /></td></tr>

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