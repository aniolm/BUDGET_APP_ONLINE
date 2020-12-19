<?php
	session_start();
	if (!isset($_SESSION['loggedin']))
	{
		header('Location: index.php');
		exit();
	}	
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

<body class="bg-dark h-100" onload="setDefaultDate()">
<div class="container p-0">
  <header>
	
	<nav class="navbar navbar-expand-sm navbar-dark bg-success shadow rounded-top">
		
		<a class="navbar-brand " href="main.html" ><i class="fas fa-coins"></i>&nbsp;HOME BUDGET APP</a>
		
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse">
          <span class="navbar-toggler-icon"></span>
        </button>
		<div class="collapse navbar-collapse" id="navbarCollapse" >
		<ul class="navbar-nav ml-sm-auto flex-row justify-content-center">
			<li class="nav-item ml-2 mr-2"><a href="#" class="nav-link">Settings</a></li>
		    <li class="nav-item ml-2 mr-2"><a href="logout.php" class="nav-link">Log-out</a><li>
		</ul>
		<div>
	</nav>
	
	
  </header>
  
  <main class="bg-light p-4">
	
	<section class="container">
	<div class="row mb-3">		
		<h2>Budget</h2>
		<form class="form-inline ml-auto">
       	<select class="form-control" name="month" required>
				<option value="cmonth">Current month</option>
				<option value="lmonth">Last month</option>
				<option value="speriod">Selected period</option>
		<select>
		</form>
	</div>
	
	<div class="row">
		<div class="col-sm-6">
		<canvas id="budgetChart" width="400px" height="400px"></canvas>
		</div>
		<div class="card col-sm-6 p-3">
			<div>
				<h4>Planned budget</h4>
			</div>
			<div>
				<h3><hr></h3>
			</div>
			<div class="text-center">
				Planned incomes: 6000PLN
			</div>
			<div class="text-center">
				Planned expenses: 1600PLN
			</div>
			<div class="text-center mb-3">
				To be disposed: 4400PLN
			</div>
			<div>
				<h4>Actual budget</h4>
			</div>
			<div>
				<h3><hr></h3>
			</div>
			<div class="text-center">
				Actual incomes: 6000PLN
			</div>
			<div class="text-center">
				Actual expenses: 1700PLN
			</div>
			<div class="text-center">
				To be spent: -100PLN
			</div>
			<div class="text-center my-3 alert-danger">
				<h3>Stop spending money!!!</h3>
			</div>		
		</div>
	</div>
	</section>
	<section class="container">
	<div class="row my-3">
		
			<h2>Incomes</h2>
			<div class="btn-group ml-auto" role="group">
			<a class="btn btn-success" href="income.html" data-toggle="modal" data-target="#addincome">+</a>
			<a class="btn btn-success" href="income.html" data-toggle="modal" data-target="#delincome">-</a>
		    <a class="btn btn-success" href="incomes.html">Details</a>
			</div>
	</div>
    
	<!-- add expense window -->
	<div class="modal fade" id="addincome" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add income</h5>
        <button type="button" class="close" data-dismiss="modal">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
			<div class="form-group">
			<label for="date"><b>Date</b></label>
			<input class="form-control" type="date" id="datePicker" value="2020-11-21" name="date" required>
			</div>
			<div class="form-group">
			<label for="category"><b>Category</b></label>
			<select class="form-control"  name="category" required>
				<option value="sallary">Sallary</option>
				<option value="bonus">Bonus money</option>
				<option value="interest">Earned interest</option>
				<option value="rental">Rental property</option>
				<option value="sold">Sold items</option>
				<option value="other">Others</option>				
			</select>
			</div>
			<div class="form-group">
			<label for="amount"><b>Amount</b></label>
			<input class="form-control" type="number" step="0.01" min=”0″ placeholder="00.00" name="amount" required>
			</div>
			<div class="form-group">
			<label for="description"><b>Description</b></label>
			<input class="form-control" type="text" placeholder="Enter description" name="description">
			</div>
		</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-success">Save</button>
      </div>
    </div>
	</div>
	</div>
	<!-- add expense window -->
	
	<div class="row">
		<table class="table table-striped table-responsive-sm">
			<thead class="thead-dark">
				<tr>
					<th>Category</th>
					<th>Planned</th>
					<th>Earned</th>
					<th>Difference</th>
					<th>Budget</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>Sallary</td>
					<td>5400PLN</td>
					<td>5400PLN</td>
					<td>0PLN</td>
					<td>90%</td>
				</tr>
				<tr>
					<td>Bonus money</td>
					<td>300PLN</td>
					<td>300PLN</td>
					<td>0PLN</td>
					<td>5%</td>
				</tr>
				<tr>
					<td>Earned interest</td>
					<td>0PLN</td>
					<td>0PLN</td>
					<td>0PLN</td>
					<td>0%</td>
				</tr>
				<tr>
					<td>Rental property</td>
					<td>0PLN</td>
					<td>0PLN</td>
					<td>0PLN</td>
					<td>0%</td>
				</tr>
				<tr>
					<td>Sold items</td>
					<td>300PLN</td>
					<td>300PLN</td>
					<td>0PLN</td>
					<td>5%</td>
				</tr>
				<tr>
					<td>Others</td>
					<td>0PLN</td>
					<td>0PLN</td>
					<td>0PLN</td>
					<td>0%</td>
				</tr>
			</tbody>
		</table>
	</div>
	</section>
	<section class="container">
	<div class="row my-3">
		
			<h2>Expenses</h2>
		    <div class="btn-group ml-auto" role="group">
				<a class="btn btn-success" href="expense.html" data-toggle="modal" data-target="#addexpense">+</a>
				<a class="btn btn-success" href="expense.html" data-toggle="modal" data-target="#delexpense">-</a>
				<a class="btn btn-success" href="expenses.html">Details</a>
			</div>
	</div>

	<!-- add expense window -->
	<div class="modal fade" id="addexpense" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add expense</h5>
        <button type="button" class="close" data-dismiss="modal">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
			<div class="form-group">
			<label for="date"><b>Date</b></label>
			<input class="form-control" type="date" id="datePicker" value="2020-11-21" name="date" required>
			</div>
			<div class="form-group">
			<label for="category"><b>Category</b></label>
			<select class="form-control"  name="category" required>
				<option value="food">Food</option>
				<option value="transport">Transport</option>
				<option value="bills">Bills</option>
				<option value="healthcare">Healthcare</option>
				<option value="clothes">Clothes</option>
				<option value="hygene">Hygene</option>
				<option value="kids">Kids</option>
				<option value="amusement">Amusement</option>
				<option value="training">Training</option>
				<option value="books">Books</option>
				<option value="savings">Savings</option>
				<option value="pension">Pension</option>
				<option value="debts">Debts</option>
				<option value="charity">Charity</option>
				<option value="others">Others</option>			
			</select>
			</div>
			<div class="form-group">
			<label for="pmethod"><b>Payment method</b></label>
			<select class="form-control" name="pmethod" required>
				<option value="cash">Cash</option>
				<option value="card">Credit/Debit Card</option>
				<option value="transfer">Money Transfer</option>				
			</select>
			</div>
			<div class="form-group">
			<label for="amount"><b>Amount</b></label>
			<input class="form-control" type="number" step="0.01" min=”0″ placeholder="00.00" name="amount" required>
			</div>
			<div class="form-group">
			<label for="description"><b>Description</b></label>
			<input class="form-control" type="text" placeholder="Enter description" name="description">
			</div>
		</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-success">Save</button>
      </div>
    </div>
	</div>
	</div>
	<!-- add expense window -->
	<div class="row">
		<table class="table table-striped table-responsive-sm">
			<thead class="thead-dark">
				<tr>
					<th>Category</th>
					<th>Planned</th>
					<th>Spent</th>
					<th>Difference</th>
					<th>Budget</th>
				</tr>
				</thead>
				<tbody>
				<tr>
					<td>Food</td>
					<td>800PLN</td>
					<td>900PLN</td>
					<td>100PLN</td>
					<td>15%</td>
				</tr>
				<tr>
					<td>Housing</td>
					<td>500PLN</td>
					<td>500PLN</td>
					<td>0PLN</td>
					<td>8.3%</td>
				</tr>
				<tr>
					<td>Transportation</td>
					<td>0PLN</td>
					<td>0PLN</td>
					<td>0PLN</td>
					<td>0%</td>
				</tr>
				<tr>
					<td>Utilities</td>
					<td>0PLN</td>
					<td>0PLN</td>
					<td>0PLN</td>
					<td>0%</td>
				</tr>
				<tr>
					<td>Clothing</td>
					<td>300PLN</td>
					<td>300PLN</td>
					<td>0PLN</td>
					<td>5%</td>
				</tr>
				<tr>
					<td>Kids</td>
					<td>0PLN</td>
					<td>0PLN</td>
					<td>0PLN</td>
					<td>0%</td>
				</tr>
				<tr>
					<td>Healthcare</td>
					<td>0PLN</td>
					<td>0PLN</td>
					<td>0PLN</td>
					<td>0%</td>
				</tr>
				<tr>
					<td>Insurance</td>
					<td>0PLN</td>
					<td>0PLN</td>
					<td>0PLN</td>
					<td>0%</td>
				</tr>
				<tr>
					<td>Vacation</td>
					<td>0PLN</td>
					<td>0PLN</td>
					<td>0PLN</td>
					<td>0%</td>
				</tr>
				<tr>
					<td>Education</td>
					<td>0PLN</td>
					<td>0PLN</td>
					<td>0PLN</td>
					<td>0%</td>
				</tr>
				<tr>
					<td>Hobbies</td>
					<td>0PLN</td>
					<td>0PLN</td>
					<td>0PLN</td>
					<td>0%</td>
				</tr>
				<tr>
					<td>Savings</td>
					<td>0PLN</td>
					<td>0PLN</td>
					<td>0PLN</td>
					<td>0%</td>
				</tr>
				<tr>
					<td>Debts</td>
					<td>0PLN</td>
					<td>0PLN</td>
					<td>0PLN</td>
					<td>0%</td>
				</tr>
				<tr>
					<td>Donation</td>
					<td>0PLN</td>
					<td>0PLN</td>
					<td>0PLN</td>
					<td>0%</td>
				</tr>
				<tr>
					<td>Others</td>
					<td>0PLN</td>
					<td>0PLN</td>
					<td>0PLN</td>
					<td>0%</td>
				</tr>
	
			</tbody>
		</table>
	</div>
	</section>
  </main>
  
  <footer class="bg-success text-light rounded-bottom">
	<div class="mx-auto p-3" style="width: 300px;">Copyright &copy;  2020 <a class="text-light text-decoration-none" href="#asma">asma.wroclaw.pl</a>
	</div>
  </footer>
</div>
  <script src="js/vendor/Chart.bundle.min.js"></script>
  <script src="js/charts.js"></script>
  <script src="js/vendor/modernizr-3.11.2.min.js"></script>
  <script src="js/plugins.js"></script>
  <script src="js/main.js"></script>
  <script src="js/vendor/jquery-3.5.1.min.js"></script>
  <script src="js/vendor/bootstrap.bundle.min.js"></script>
  

  <!-- Google Analytics: change UA-XXXXX-Y to be your site's ID. 
  <script>
    window.ga = function () { ga.q.push(arguments) }; ga.q = []; ga.l = +new Date;
    ga('create', 'UA-XXXXX-Y', 'auto'); ga('set', 'anonymizeIp', true); ga('set', 'transport', 'beacon'); ga('send', 'pageview')
  </script>
  <script src="https://www.google-analytics.com/analytics.js" async></script>
  -->
  <script>
   Date.prototype.toDateInputValue = (function() {
   var local = new Date(this);
   local.setMinutes(this.getMinutes() - this.getTimezoneOffset());
   return local.toJSON().slice(0,10);});
   
   function setDefaultDate(){
   document.getElementById("datePicker").value = new Date().toDateInputValue();
   }
   </script>
  
</body>

</html>
