<?php

	session_start();
	
	if ((!isset($_POST['uname'])) || (!isset($_POST['psw'])))
	{
		header('Location: index.php');
		exit();
	}

	require_once "connect.php";

	$connection = @new mysqli($host, $db_user, $db_password, $db_name);
	
	if ($connection->connect_errno!=0)
	{
		echo "Error: ".$connection->connect_errno;
	}
	else
	{
		$uname = $_POST['uname'];
		$psw = $_POST['psw'];
		
		$uname = htmlentities($uname, ENT_QUOTES, "UTF-8");
		$psw = htmlentities($psw, ENT_QUOTES, "UTF-8");
	
		if ($result = @$connection->query(
		sprintf("SELECT * FROM users WHERE username='%s'",
		mysqli_real_escape_string($connection,$uname))))

		{
			$no_users = $result->num_rows;
			if($no_users>0)
			{
				
				$row = $result->fetch_assoc();
				if (password_verify($psw, $row['password']))
				{
					$_SESSION['loggedin'] = true;
					$_SESSION['id'] = $row['id'];
					$_SESSION['username'] = $row['username'];
					$_SESSION['email'] = $row['email'];
				
				
					unset($_SESSION['error']);
					$result->free_result();
				
					header('Location: main.php');
				}
				else {
				
				$_SESSION['error'] = '<span class="text-warning">Wrong login or password!</span>';
				header('Location: index.php');
				
			    }	
			} 
			
			else {
				
				$_SESSION['error'] = '<span class="text-warning">Wrong login or password!</span>';
				header('Location: index.php');
				
			}
			
		}
		
		$connection->close();
	}
	//print_r($_SESSION);
?>