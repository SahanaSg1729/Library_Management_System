<?php
	include("setting.php");
	session_start();
	if(!ISSET($_SESSION['user_id'])){
		header('location: index.php');
	}
	$user_id=$_SESSION['user_id'];
	$name=$_SESSION['name'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>BANGTAN Library Management System</title>
	<link href="stylesheet.css" rel="stylesheet" type="text/css" />
    <link href="bootstrap.css"  rel ="stylesheet" type = "text/css"/>
</head>

<body>

    <div id="banner">
        <span class="head">BANGTAN Library Management System</span><br />
        <marquee class="clg" direction="right" behavior="alternate" scrollamount="1">WELCOME TO ONLINE LIBRARY MANAGEMENT SYSTEM</marquee>
    </div>
    <br />

    <div class = "container-fluid" style="padding-right:10px; padding-left: 13px;">
		<div class = "col-lg-2 well" >
			<div class = "container-fluid">
				<img src = "images/user.png" width = "50px" height = "50px"/>
				<br />
				<br/>
				<br/>
				<p>NAME:<?php echo $name ?></p>
				<p>ID= <?php echo $user_id; ?></p>
				<label class = "text-muted"></label>
			</div>
			<hr style = "border:1px dotted #d3d3d3;"/>
			<ul id = "menu" class = "nav menu">
				<li><a style = "font-size:18px; border-bottom:1px solid #d3d3d3;" href = "user_home.php"><i class = "glyphicon glyphicon-home"></i> Home</a></li>
				<li><a style = "font-size:18px; border-bottom:1px solid #d3d3d3;" href = "book.php"><i class = "glyphicon glyphicon-book"></i> Books</a></li>
				<li><a style = "font-size:18px; border-bottom:1px solid #d3d3d3;" href = ""><i class = "glyphicon glyphicon-th"></i> Issue </a>
					<ul style = "list-style-type:none;">
						<li><a href = "borrowing.php" style = "font-size:15px;"><i class = "glyphicon glyphicon-random"></i> Issued Books</a></li>
						<li><a href = "returning.php" style = "font-size:15px;"><i class = "glyphicon glyphicon-random"></i> Issue Request</a></li>
					</ul>
				</li>
				<li><a  style = "font-size:18px; border-bottom:1px solid #d3d3d3;" href = ""><i class = "glyphicon glyphicon-cog"></i> Books Read</a></li>
				<li><a  style = "font-size:18px; border-bottom:1px solid #d3d3d3;" href = ""><i class = "glyphicon glyphicon-cog"></i> Request Books</a></li>
				<li><a  style = "font-size:18px; border-bottom:1px solid #d3d3d3;" href = "logout.php"><i class = "glyphicon glyphicon-cog"></i> LogOut</a></li>
				<br/>
			</ul>
		</div>
		<div class = "col-lg-1" style="width:2.333333%;"></div>
			<div class = "col-lg-9 well" style = "width: 82%; margin-left:1%; margin-bottom:10px; " >
				<img src = "images/back2.jpg" style="height:530px;width:100%;" />
			</div>
        </div>
    </div>

</body>
</html>