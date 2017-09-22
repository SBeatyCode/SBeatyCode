<?php
	/*
	******************************
		user_help.php

		Stephen Beaty
	******************************
	*/
	require('config.php');
	include('isLoggedIn.php');
?>

<!DOCTYPE>
<html>
	<head>
		<!--Bootstrap-->
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="styleSheet.css" rel="stylesheet">

    <title>About</title>

    <!-- Bootstrap core CSS -->
    <link href="../../dist/css/bootstrap.min.css" rel="stylesheet">
	</head>
	<body>
		<!-- Navbar -->
     <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Vehicle Log - Administrator</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="a_edit_records.php">Home</a></li>
      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Select a Page
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="a_edit_records_user.php">User</a></li>
          <li><a href="a_edit_records_password.php">Password</a></li>
          <li><a href="a_edit_records_vehicle.php">Vehicle</a></li>
          <li><a href="a_edit_records_maintenance.php">Maintenance</a></li>
          <li><a href="a_edit_records_fuel.php">Fuel</a></li>
          <li><a href="a_edit_records_oil.php">Oil</a></li>
          <li><a href="a_edit_records_tire.php">Tire</a></li>
        </ul>
      </li>
      <li><a href="admin_help.php">Help</a></li>
      <li><a href="admin_about.php">About</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="#"><span class="glyphicon glyphicon-user"></span>Hello, Admin <?php echo $_SESSION['username'];?></a></li>
      <li><a href="login.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
  </div>
</nav>
    <!--End Nav Bar -->
		<main>
			<h2>About</h2>
			<p> Welcome to the Vehicle Log Web App! We hope you enjoy using this app!</p>

			<p> This web app was created using PHP, HTML and CSS by <strong>Stephen Beaty</strong> for Greenville Technical College's CPT283 PHP Programming 1 class.
				It implements Twitter Bootstrap. It was created over the course of about 12 weeks while learning PHP.</p>
		</main>
	 <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
      <script src = "https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>     
      <!-- Include all compiled plugins -->
      <script src = "//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
	</body>

</html>