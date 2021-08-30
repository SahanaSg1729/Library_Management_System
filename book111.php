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
            <div class = "col-lg-9 well" style = "margin-top:60px;">
				<div class = "alert alert-info">Book</div>
					<button id = "show_book" type = "button" style = "display:none;" class = "btn btn-success"><span class = "glyphicon glyphicon-circle-arrow-left"></span> Back</button>
					<br />
					<br />
					<div id = "book_table">
                    <form method="post" action="">
                        <table border="0" cellpadding="4" cellspacing="4" class="table">
                            <tr><td colspan="2" align="center" class="msg"><?php echo $msg;?></td></tr>
                            <tr><td class="labels">search : </td><td><input type="text" name="title" class="fields" size="25" placeholder="Enter BOOK NAME" required="required" /></td></tr>
                        </table>
                     </form>
						<table id = "table" class = "table table-bordered">
							<thead class = "alert-success">
								<tr>
									<th>ISBN</th>
									<th>TITLE</th>
									<th>AUTHOR</th>
									<th>EDITION</th>
									<th>PUBLISHER</th>
									<th>YEAR OF PUBLICATION</th>
                                    <th>PRICE</th>
								</tr>
							</thead>
							<tbody>
								<?php
                                    $sql=$set->query("SELECT * FROM `BOOKS`") or die(mysqli_error());
                                    while($fbook=$sql->fetch_array()){
                                        										
								?>
								<tr>
									<td><?php echo $fbook['ISBN']?></td>
									<td><?php echo $fbook['TITLE']?></td>
                                    <td><?php $author_id=$fbook['AUTHOR_ID'];
                                              $a=mysqli_query($set,"SELECT AUTHOR_NAME FROM AUTHORS WHERE AUTHOR_ID='$author_id'");
                                              $b=mysqli_fetch_array($a);
                                              echo $b['AUTHOR_NAME'];?></td>
                                    <td><?php echo $fbook['EDITION']?></td>
                                    <td><?php $pub_id=$fbook['PUBLISHER_ID'];
                                              $a=mysqli_query($set,"SELECT PUBLISHER_NAME FROM PUBLISHER WHERE PUBLISHER_ID='$pub_id'");
                                              $b=mysqli_fetch_array($a);
                                              echo $b['PUBLISHER_NAME'];?></td>
									<td><?php echo $fbook['YEAR_OF_PUBLICATION']?></td>
									<td><?php echo $fbook['PRICE']?></td>
								</tr>
								<?php
									}
								?>
							</tbody>
						</table>
					</div>
					<!--<div id = "edit_form"></div>
					<div id = "book_form" style = "display:none;">
						<div class = "col-lg-3"></div>
						<div class = "col-lg-6">
							<form method = "POST" action = "save_book_query.php" enctype = "multipart/form-data">
								<div class = "form-group">
									<label>Book Title:</label>
									<input type = "text" name = "book_title" required = "required" class = "form-control" />
								</div>
								<div class = "form-group">
									<label>Book Description:</label>
									<input type = "text" name = "book_desc" class = "form-control" />
								</div>
								<div class = "form-group">
									<label>Book Category:</label>
									<input type = "text" name = "book_category" class = "form-control" required = "required"/>
								</div>
								<div class = "form-group">
									<label>Book Author:</label>
									<input type = "text" name = "book_author" class = "form-control" required = "required" />
								</div>
								<div class = "form-group">
									<label>Date Published:</label>
									<input type = "date" name = "date_publish" required = "required" class = "form-control" />
								</div>
								<div class = "form-group">
									<label>Quantity:</label>
									<input type = "number" min = "0" name = "qty" required = "required" class = "form-control" />
								</div>
								<div class = "form-group">
									<button name = "save_book" class = "btn btn-primary"><span class = "glyphicon glyphicon-save"></span> Submit</button>
								</div>
							</form>		
						</div>	
					</div>-->
			</div>
        </div>
    </div>

</body>
</html>