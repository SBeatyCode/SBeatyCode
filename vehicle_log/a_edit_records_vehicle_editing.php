<?php
/*
*******************************
*	a_edit_records_user_editing.php
*	Stephen Beaty
*******************************
*/
	require('config.php');
	include('verification.php');
	include('isAdmin.php');
	include('isLoggedIn.php');

	$db_connect = $_SESSION['db_connect'];
	$record_id;

	if( isset($_GET['edit'])) {
		$record_id = $_GET['edit'];
		$sql_query = "SELECT * FROM vehicle WHERE vehicle_id = '$record_id'";
		$result = mysqli_query($db_connect, $sql_query);
		$_SESSION['result'] = $result;
		$_SESSION['record_id'] = $record_id;
	} else {
		$record_id = $_SESSION['record_id'];
		$sql_query = "SELECT * FROM vehicle WHERE vehicle_id = '$record_id'";
		$result = mysqli_query($db_connect, $sql_query);
		$_SESSION['result'] = $result;
	}
?>

<html>
	<head>
		<!--Bootstrap-->
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <title>Edit Vehicle</title>

    <!-- Bootstrap core CSS -->
    <link href="../../dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="styleSheet.css" rel="stylesheet">
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
		<p><h2>Edit Selected Vehicle Record</h2></p>
		<form action ="a_edit_records_vehicle_editing.php" method="post">
		<main>
			<p><a href="a_edit_records_vehicle.php">Back</a></p>
				<?php 
					while($row = mysqli_fetch_assoc($_SESSION['result'])) {
						echo '<div id="inputs">';
						echo 'Vehicle ID: <div id="inputs"><input type="text" name="vehicle_id" readonly="true" value="' . $row['vehicle_id'] . '"></div>';
						echo 'User ID: <div id="inputs"><input type="text" name="user_id" readonly="true" value="'. $row['user_id'] . '"></div>';
						echo 'Type: <div id="inputs"><input type="text" name="type" value="'. $row['type'] . '"></div>';
						echo 'Make: <div id="inputs"><input type="text" name="make" value="' . $row['make'] . '"></div>';
						echo 'Model: <div id="inputs"><input type="text" name="model" value="' . $row['model'] . '"></div>';
						echo 'Year: <div id="inputs"><input type="text" name="year" value="' . $row['year'] . '"></div>';
						echo 'Current Mileage: <div id="inputs"><input type="text" name="current_mileage" value="' . $row['current_mileage'] . '"></div>';
						echo 'Oil Recommended: <div id="inputs"><input type="text" name="oil_recommended" value="' . $row['oil_recommended'] . '"></div>';
						echo 'Tire Size: <div id="inputs"><input type="text" name="tire_size" value="' . $row['tire_size'] . '"></div>';
						echo 'VIN: <div id="inputs"><input type="text" name="vin" value="' . $row['vin'] . '"></div>';
						echo 'License Plate Number: <div id="inputs"><input type="text" name="license_plate_no" value="' . $row['license_plate_no'] . '"></div>';
						echo "</div>";
					}
				?>

				<br><input type="submit" name="submit" method="post" value="Update Database"><br>

				<?php
					if(isset($_POST['submit'])) {
						$record_id = $_SESSION['record_id'];
						$current_mileage;
						$license_plate_no;
						$make;
						$model;
						$oil_recommended;
						$tire_size;
						$type;
						$vin;
						$year;

						$valid = FALSE;
						$validCurrentMileage = FALSE;
						$validLicenseNo = FALSE;
						$validMake = FALSE;
						$validModel = FALSE;
						$validOilRec = FALSE;
						$validTireSize = FALSE;
						$validType = FALSE;
						$validVin = FALSE;
						$validYear = FALSE;

						if(notEmptyOrNull($_POST['current_mileage'])) {
							if(isInt7($_POST['current_mileage'])) {
								$validCurrentMileage = TRUE;
								$current_mileage = mysqli_real_escape_string($db_connect, $_POST['current_mileage']);
							} else {
								echo '<p style="color: red">Current Mileage must be 7 non-decimal numbers. Do not inclue units, like Miles or Km.</p>';
							}
						} else {
							echo '<p style="color: red">Current Mileage is a required Field</p>';
						}
						
						if(notEmptyOrNull($_POST['license_plate_no'])) {
							if(isLength7($_POST['license_plate_no'])) {
								$validLicenseNo = TRUE;
								$license_plate_no = mysqli_real_escape_string($db_connect, $_POST['license_plate_no']);
							} else {
								echo '<p style="color: red">License Plate Number must be 7 characters or less.</p>';
							}
						} else {
							echo '<p style="color: red">License Plate Number is a required Field</p>';
						}
						
						if(notEmptyOrNull($_POST['make'])) {
							if(isLength10($_POST['make'])) {
								$validMake = TRUE;
								$make = mysqli_real_escape_string($db_connect, $_POST['make']);
							} else {
								echo '<p style="color: red">Make must be 10 characters or less.</p>';
							}
						} else {
							echo '<p style="color: red">Make is a required Field</p>';
						}
						
						if(notEmptyOrNull($_POST['model'])) {
							if(isLength10($_POST['model'])) {
								$validModel = TRUE;
								$model = mysqli_real_escape_string($db_connect, $_POST['model']);
							} else {
								echo '<p style="color: red">Model must be 10 characters or less.</p>';
							}
						} else {
							echo '<p style="color: red">Model is a required Field</p>';
						}
						
						if(notEmptyOrNull($_POST['oil_recommended'])) {
							if(isLength10($_POST['oil_recommended'])) {
								$validOilRec = TRUE;
								$oil_recommended = mysqli_real_escape_string($db_connect, $_POST['oil_recommended']);
							} else {
								echo '<p style="color: red"> Oil Recommended must be 10 characters or less.</p>';
							}
						} else {
							echo '<p style="color: red">Oil Recommended is a required Field</p>';
						}
						
						if(notEmptyOrNull($_POST['tire_size'])) {
							if(isLength5($_POST['tire_size'])) {
								$validTireSize = TRUE;
								$tire_size = mysqli_real_escape_string($db_connect, $_POST['tire_size']);
							} else {
								echo '<p style="color: red"> Tire Size must be 5 characters or less.</p>';
							}
						} else {
							echo '<p style="color: red">Tire Size is a required Field</p>';
						}
						
						if(notEmptyOrNull($_POST['type'])) {
							if(isLength10($_POST['type'])) {
								$validType = TRUE;
								$type = mysqli_real_escape_string($db_connect, $_POST['type']);
							} else {
								echo '<p style="color: red"> Type must be 10 characters or less.</p>';
							}
						} else {
							echo '<p style="color: red">Type is a required Field</p>';
						}
						
						if(notEmptyOrNull($_POST['vin'])) {
							if(isInt17($_POST['vin'])) {
								$validVin = TRUE;
								$vin = mysqli_real_escape_string($db_connect, $_POST['vin']);
							} else {
								echo '<p style="color: red"> Vin must be 17 characters.</p>';
							}
						} else {
							echo '<p style="color: red">Vin is a required Field</p>';
						}
						
						if(notEmptyOrNull($_POST['year'])) {
							if(isInt4($_POST['year'])) {
								$validYear = TRUE;
								$year = mysqli_real_escape_string($db_connect, $_POST['year']);
							} else {
								echo '<p style="color: red"> Year must be 4 non-decimal numberic characters.</p>';
							}
						} else {
							echo '<p style="color: red">Year is a required Field</p>';
						}

						if($validYear && $validVin && $validType && $validModel && $validMake && $validTireSize && $validOilRec && $validLicenseNo && $validCurrentMileage) {
							$valid = TRUE;
						}

						if($valid) {
							$sql_update_query = "UPDATE `vehicle` SET `type`='$type',`make`='$make',`model`='$model',`year`='$year',`current_mileage`='$current_mileage',`oil_recommended`='$oil_recommended',`tire_size`='$tire_size',`vin`='$vin',`license_plate_no`='$license_plate_no' WHERE `vehicle_id`='$record_id'";

							if($db_connect->query($sql_update_query) === TRUE) {
								echo "The record has been updated successfully!";
								echo '<a href="a_edit_records_vehicle.php">Back</a>';
							} else {
								echo "Record could not be updated. <br>";
								echo "Please Contact your Database Administrator <br>";
							}
						} else {
							echo '<p style="color: red">Please complete all fields</p>';
							echo '<a href="a_edit_records_vehicle.php">Back</a>';
						}
					}				
				?>
		</main>
		<!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
      <script src = "https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>     
      <!-- Include all compiled plugins -->
      <script src = "//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
	</body>
</html>