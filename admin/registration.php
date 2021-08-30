<?php
	session_start();
	include 'includes/conn.php';

	if(isset($_POST['login'])){
		$admin_id = $_POST['admin_id'];
		$password=mysqli_real_escape_string($set,$_POST['password']);

		$sql=$set->query("SELECT password,admin_name FROM `ADMIN` WHERE ADMIN_ID=$admin_id");

		if($sql->num_rows < 1){
			$_SESSION['error'] = 'Cannot find account with the username';
		}
		else{ //verification of password
				
				$row=$sql->fetch_array();
				$password1=$row['password'];
				
                $password=md5($password);
			if($password==$password1){
				$_SESSION['admin_id'] = $admin_id;
				$_SESSION['name']=$row['admin_name'];
			}
			else{
				$_SESSION['error'] = 'Incorrect password';
			}
		}
		
	}
	else{
		$_SESSION['error'] = 'Input admin credentials first';
	}

	header('location: index2.php');

?>