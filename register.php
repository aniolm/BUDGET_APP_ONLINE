<?php

	session_start();
	
	if (isset($_POST['email']))
	{
		
		$validation_OK=true;
		
		$user = $_POST['uname'];
		
		if ((strlen($user)<3) || (strlen($user)>20))
		{
			$validation_OK=false;
			$_SESSION['e_uname']="Username must be from 3 to 20 characters long!";
		}
		
		if (ctype_alnum($user)==false)
		{
			$validation_OK=false;
			$_SESSION['e_uname']="Username must consist of letters and numbers (without polish characters)";
		}
		
		// Sprawdź poprawność adresu email
		$email = $_POST['email'];
		$email_filtered = filter_var($email, FILTER_SANITIZE_EMAIL);
		
		if ((filter_var($email_filtered, FILTER_VALIDATE_EMAIL)==false) || ($email_filtered!=$email))
		{
			$validation_OK=false;
			$_SESSION['e_email']="Enter valid e-mail address!";
		}
		

		$psw1 = $_POST['psw'];
		$psw2 = $_POST['psw2'];
		
		if ((strlen($psw1)<6) || (strlen($psw1)>20))
		{
			$validation_OK=false;
			$_SESSION['e_psw']="Password must be 6 to 20 characters long!";
		}
		
		if ($psw1!=$psw2)
		{
			$validation_OK=false;
			$_SESSION['e_psw']="Passwords are not matching!";
		}	

		$psw_hash = password_hash($psw1, PASSWORD_DEFAULT);
				
		
		require_once "connect.php";
		mysqli_report(MYSQLI_REPORT_STRICT);
		
		try 
		{
			$connection = new mysqli($host, $db_user, $db_password, $db_name);
			if ($connection->connect_errno!=0)
			{
				throw new Exception(mysqli_connect_errno());
			}
			else
			{
				$result = $connection->query("SELECT id FROM users WHERE email='$email'");
				
				if (!$result) throw new Exception($connection->error);
				
				if($result->num_rows>0)
				{
					$validation_OK=false;
					$_SESSION['e_email']="E-mail already exists in the database!";
				}		

				$result = $connection->query("SELECT id FROM users WHERE username='$user'");
				
				if (!$result) throw new Exception($connection->error);
				
				if($result->num_rows>0)
				{
					$validation_OK=false;
					$_SESSION['e_uname']="Username already exists in the database.";
				}
				
				if ($validation_OK==true)
				{	
					if ($connection->query("INSERT INTO users VALUES (NULL, '$user', '$psw_hash','$email' )"))
					{
						$_SESSION['signup']=true;
						header('Location: login.php');
					}
					else
					{
						throw new Exception($connection->error);
					}
					
				}
				
				$connection->close();
			}
			
		}
		catch(Exception $e)
		{
			echo '<span style="color:red;">Server error! Please try again later!</span>';
			echo '<br />Developer information: '.$e;
		}
		
	}
	
	
?>
