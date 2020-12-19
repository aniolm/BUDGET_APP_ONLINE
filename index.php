
<?php
	
	session_start();
	
	if ((isset($_SESSION['loggedin'])) && ($_SESSION['loggedin']==true))
	{
		header('Location: main.php');
		exit();
	}
    //phpinfo();
?>

<!doctype html>
<html class="no-js h-100" lang="">

<head>
  <meta charset="utf-8">
  <title>Home Budget App</title>
  <meta name="description" content="Simple, online budgeting app that helps users track their incomes and purchases">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <meta property="og:title" content="">
  <meta property="og:type" content="">
  <meta property="og:url" content="">
  <meta property="og:image" content="">

  <link rel="manifest" href="site.webmanifest">
  <link rel="apple-touch-icon" href="icon.png">
  <!-- Place favicon.ico in the root directory -->

  <link rel="stylesheet" href="css/bootstrap.min.css">
  <!-- <link rel="stylesheet" href="css/normalize.css"> -->
  <!-- <link rel="stylesheet" href="css/main.css"> -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">

  <meta name="theme-color" content="#fafafa">
</head>

<body class="bg-dark h-100">

 
<div class="container-fluid h-100"> 
   
	<div class="row h-100"> 
	
			<div class="col-sm-3 col-md-4 my-auto">
			</div>
			<form class="form-signin bg-light p-3 col-sm rounded my-auto mx-auto" action="login.php" method="post">
				<div class="bg-success text-light text-center rounded p-3 h4">
					<i class="fas fa-coins"></i>
					HOME BUDGET APP
				</div>
				<div class="text-center pt-3 pl-2 pr-2">
					<p>Track your cash, discover new ways to save and build your credit score with one click.</p>
				</div>
				<div class="form-group">
					<label for="uname"><b>Username</b></label>
					<input class="form-control" type="text" placeholder="Enter Username" name="uname" required>
				</div>
				<div class="form-group">
					<label for="psw"><b>Password</b></label>
					<input class="form-control" type="password" placeholder="Enter Password" name="psw" required>
					<?php
					if(isset($_SESSION['error']))	echo $_SESSION['error'];
					?>	
				</div>
				<div class="checkbox mb-3">
					<label>
						<input type="checkbox" name="remember-me" value="remember-me">
						Remember me
					</label>
				</div>
				<button class="btn btn-success btn-block" type="submit">Login</button>
			
				<div class="pt-3 text-center">
					<span>Don't have account yet? <a class="text-decoration-none" href="signup.php">Sign up.</a></span>
				</div>
				<div class="text-center">
				<p class="mt-4 mb-3 text-muted">Copyright &copy; 2020 asma.wroclaw.pl</p>
				</div>
					
			</form>
			<div class="col-sm-3 col-md-4 my-auto">
			</div>
			
    </div>

</div>			
</body>
  

	
  <script src="js/vendor/modernizr-3.11.2.min.js"></script>
  <script src="js/plugins.js"></script>
  <script src="js/main.js"></script>
  <script src="js/vendor/jquery-3.5.1.min.js"></script>
  <script src="js/vendor/bootstrap.bundle.min.js"></script>
  
  <!--
  <!-- Google Analytics: change UA-XXXXX-Y to be your site's ID. 
  <script>
    window.ga = function () { ga.q.push(arguments) }; ga.q = []; ga.l = +new Date;
    ga('create', 'UA-XXXXX-Y', 'auto'); ga('set', 'anonymizeIp', true); ga('set', 'transport', 'beacon'); ga('send', 'pageview')
  </script>
  <script src="https://www.google-analytics.com/analytics.js" async></script>
  -->
</body>

</html>
