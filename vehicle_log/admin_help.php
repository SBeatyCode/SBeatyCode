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

    <title>Help</title>

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
			<h2>Help Page</h2>
			<p> Welcome to the Vehicle Log Web App! As an <strong>Admin</strong> of this Web App, rather than keeping track of your own information, you will be
				keeping a watch over all the other user accounts, and helping where you may need to. You have a number of tools on your hand in order to do this.
			</p>

			<p>As an admin, you can view all existing records for Users, Passwords, Vehicles, Maintenance, Fuel, Oil, and Tires. All of these records for all existing users will come into view for you when you
				click on the appropreate link on the homepage.
			</p>

			<p>You also have the ability to create a new record for any of these. To do this, first click the link for the record type you wish to add. Then, click the "Create New Record" link near the top of the page, underneath the "Back" link.
				When creating a new password, oil, fuel, or tire record (but <strong>ESPECIALLY</strong> for the <em>PASSWORD!</em>) be sure you delete a user's old record <strong>first</strong>, otherwise problems and abnormalities could occur.
        If you do create multiple password, oil, fuel, or tire records for the same user or vehicle by mistake, simply delete the record you no longer want. 
			</p>

			<p>You can do more than just view this information, however. You can edit, or delete any of the information that is available for your. However, you may not edit User ID's and Vehicle ID's, which are provided solely for
				referance and to allow you to view the way information in related. You may also delete any of these records that you chose to. However, this is a responsibily you must be careful with. For example, if you delete a user,
				you must also be sure to delete all the other information relating to that user, such as the user's password, all their vehicle's, and all the maintenance records for their vehicles. This way, you don't
				have old and out of date records floating around in the database. Please make not of the User ID, Password ID, and Vehicle ID's before you chose to delete a user, to ensure you remove all information related to a user.
			</p>

			<p> When editing user information, you can click a box to grant a user admin status, or to remove admin status. Please use this ability with care. Note that there is a root admin account, which cannot be changed or deleted.
			</p><br>

			<p>We hope you enjoy using Vehicle Log! Feel free to create a user account as well, to keep track of all your information!
			</p>
		</main>
	 <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
      <script src = "https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>     
      <!-- Include all compiled plugins -->
      <script src = "//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
	</body>

</html>