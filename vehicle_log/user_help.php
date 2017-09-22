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

    <title>Help</title>

    <!-- Bootstrap core CSS -->
    <link href="../../dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="styleSheet.css" rel="stylesheet">
	</head>
	<body>
		<!-- Navbar -->
     <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Vehicle Log</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="homepage.php">Home</a></li>
      <li><a href="user_help.php">Help</a></li>
      <li><a href="user_about.php">About</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="#"><span class="glyphicon glyphicon-user"></span>Hello, <?php echo $_SESSION['username'];?></a></li>
      <li><a href="login.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
  </div>
</nav>
    <!--End Nav Bar -->
		<main>
			<h2>Help Page</h2>
			<p style="text-indent: 50px;"> Welcome to the Vehicle Log Web App! As a <strong>User</strong> of this Web App, you will be able to
				keep track of your personal information, and information about your vehicles. You can add multiple vehicles, and
				keep track of each one's oil, fuel, tire, and general information. We hope you enjoy using this app!
			</p>

			<p style="text-indent: 50px;">To <strong>ADD</strong> a vehicle, click the "Add a Vehicle" Link on the bottom of the <a href="homepage.php">homepage</a>, and
				enter the requested information. When you finsih, your vehicle will appear on the front of your homepage, along with any
				other vehicles you have entered.
			</p>

			<p><em><strong>Homepage</strong></em></p>

			<p style="text-indent: 50px;">A brief overview will be given on your hompage about each vehicle you have registered, including information about:</p>
			<ul>
				<li><strong>Vehicle Type</strong> - Whether you have a Car, Jeep, Truck, or other type of vehicle.</li>
				<li><strong>Make</strong> - What company makes the vehicle, such as Chrystler or Toyota.</li>
				<li><strong>Model</strong> - What kind of vehicle you have, such as a Chrystler Seabring, or a Ford F150.</li>
				<li><strong>Year</strong> - The Year of your vehicle model.</li>
				<li><strong>Current Mileage</strong>	- How much mileage is currently on your vehicle. Be sure you update this!</li>
				<li><strong>Recommended Oil</strong>	- The type of oil that is recommended for your vehicle, such as synthetic oil.</li>
				<li><strong>Fuel-Info</strong>  - What kind of fuel your vehicle uses, such as gasoline.</li>
				<li><strong>Tire-Info</strong> - What kind of Tire you have on your vehicle.</li>
				<li><strong>Vin</strong> - The Vehicle Identification Number of your vehicle. This should be unique to each vehicle.</li>
				<li><strong>License Plate Number</strong> - THe number on your vehicle's License Plate.</li>
				<li><strong>Maintenance Info</strong> - Click this link to view maintenance information on your vehicle. (see more below)</li>
				<li><strong>Edit</strong> - CLick this link to edit your vehicle's basic information.</li>
				<li><strong>Remove</strong> - CLick this link to permanently delete the vehicle from your vehicle list. <strong>Once deleted, a vehicle cannot be recovered.</strong></li>
			</ul>
			<br>

			<p><em><strong>Editing Vehicle Information</strong></em></p>

			<p> To edit the <em>general information</em> about your vehicle, find the 'Edit' link on the homepage that's on the same row as your vehicle, and click it.
			</p>

			<p>To edit your vehicle's <em>oil</em> information, click the "More Info" link under your vehicle's "Recommended Oil" Collumn
			</p>

			<p>To edit your vehicle's <em>fuel</em> information, click the "Fuel Info" link under your vehicle's "Fuel Info" Collumn
			</p>

			<p>To edit your vehicle's <em>tire</em> information, click the "Tire Info" link under your vehicle's "Tire Info" Collumn
			</p><br>

			<p><em><strong>Removing a Vehicle</strong></em></p>

			<p> To remove a vehicle, simple find the 'Remove' ont he row of the vehicle you want to delete, and you'll be taken to the delete page. <em><strong>WARNING!</strong> Once a vehicle has been deleted, <strong>it cannot be revocered!</strong>
				Only delete a vehicle if you're absoloutely sure you want to <strong>permanantly</strong> delete it.</em>
			</p><br>

			<p><em><strong>Vehicle Maintenance Logs</strong></em></p>

			<p> Click the "Maintenance Info" link for any of your vehicles to view the maintenance information for. This will take you to the Mainthenance Page, which
				will list any of the Maintenance Information you have entered for your vehicle.
			</p>

			<p>To add a new maintenance record for your vehicle, click the "Add a Maintenance Record" link near the top of the page. Here you'll be prompted to enter any relevant information about the maintenance to your vehicle. Maintenance can
				include anything you wish to keep track of, including oil changes, filling the gas tank, fixing the windsheild, and more.
			</p><br>

			<p><em><strong>Adding a New Vehicle</strong></em></p>

			<p> To add a new vehicle to your account, scroll to the bottom on the page and click the "Add a Vehicle" link. From here, you'll be prompted to enter all the general information about your vehicle.
			</p>

			<p> After you have added this information, if you click on the "More Info" link under "Recommended Oil", "Fuel Info", or "Tire Info", you'll be taken to a page where you can input this information for your new vehicle. Once entered, you can always go back and
				edit this information later.
			</p><br>

			<p><em><strong>Editing Your Account Information</strong></em></p>

			<p> TO edit your account information, scroll to the bottom on the page and click the "Edit Your Account Information" link. From here, you can either edit your personal information, or your password. If you click the
				"Edit Your Personal Information" link, you'll be taken to a page where you can change your phone number, address, email address, and similar information. If you click the "Change Your Password" link, you'll be taken to a page where you can
				change your password. Here, you'll be prompted to enter your old password first, then enter your new password. For security reasons, neither your old or new password will be displayed as you type them out. Your old password that you enter must match the password you used
				in order to log into the Vehicle Log web app.
			</p><br><br>

			<p>For further questions, please contact an administrator. We hope you enjoy using Vehicle Log!
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