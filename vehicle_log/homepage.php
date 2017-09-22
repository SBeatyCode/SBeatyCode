<?php
/*
*******************************
*	homepage.php
*	Stephen Beaty
*******************************
*/
	require('config.php');
	include('isLoggedIn.php');

	$user_id = $_SESSION['user_id'];
	$sql_query = "SELECT * FROM `vehicle` WHERE `user_id` = '$user_id'";
	$result = mysqli_query($db_connect, $sql_query);
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

    <title>Homepage - User</title>

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
		<h1 style="text-align: center;">Welcome, <?php echo $_SESSION['username'];?>!</h1><br>
		<main>
			<table>
				<h2 style="text-align: center; text-decoration: underline;"><em>Your Vehicles</em></h2>
				<?php 

					echo "<tr>";
					echo "<th>Vehicle Type</th>";
					echo "<th>Make</th>";
					echo "<th>Model</th>";
					echo "<th>Year</th>";
					echo "<th>Current Mileage</th>";
					echo "<th>Recommended Oil</th>";
					echo "<th>Fuel Info</th>";
					echo "<th>Tire Info</th>";
					echo "<th>Vin</th>";
					echo "<th>License Plate Number</th>";
					echo "<th>Maintenance Info</th>";
					echo "<th>Edit</th>";
					echo "<th>Remove</th>";
					echo "</tr>"; 

					while($row = mysqli_fetch_assoc($result)) {
						echo "<tr>";
						echo '<form action ="a_edit_records_vehicle.php" method="post">';
						echo "<td>" . $row['type'] . "</td>";
						echo "<td>" . $row['make'] . "</td>";
						echo "<td>" . $row['model'] . "</td>";
						echo "<td>" . $row['year'] . "</td>";
						echo "<td>" . $row['current_mileage'] . "</td>";
						echo "<td>" . $row['oil_recommended'] . "<br><a href= user_vehicle_oil.php?edit=" . $row['vehicle_id'] . ">More Info</a></td>";
						echo "<td><a href= user_vehicle_fuel.php?edit=" . $row['vehicle_id'] . ">Fuel Info</a></td>";
						echo "<td><a href= user_vehicle_tire.php?edit=" . $row['vehicle_id'] . ">Tire Info</a></td>";
						echo "<td>" . $row['vin'] . "</td>";
						echo "<td>" . $row['license_plate_no'] . "</td>";
						echo "<td><a href= user_vehicle_maintenance.php?edit=" . $row['vehicle_id'] . ">Maintenance Info</a></td>";
						echo "<td><a href= user_vehicle_editing.php?edit=" . $row['vehicle_id'] . ">Edit</a></td>";
						echo "<td><a href= user_vehicle_delete.php?edit=" . $row['vehicle_id'] . ">Remove</a></td>";
						echo "</tr>";
					}
				?>
			</table>
			<p><h3 style="text-align: center;"><em>Select an Option Below</em></h3></p>
			<table>
				<tr>
					<td><a href ="user_vehicle.php">Add a Vehicle</a></td>
					<td><a href ="edit_records.php">Edit Your Account Information</a></td>
					<td><a href ="login.php">Log out</a></td>
				</tr>
			</table>
		</main>
	    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
      <script src = "https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>     
      <!-- Include all compiled plugins -->
      <script src = "//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
	</body>
</html>