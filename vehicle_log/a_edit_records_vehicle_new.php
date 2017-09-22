<?php
/*
******************************************
*	a_edit_records_vehicle_new.php
*	Stephen Beaty
******************************************
*/
	require('config.php');
	include('verification.php');
	include('isAdmin.php');
	include('isLoggedIn.php');

	$db_connect = $_SESSION['db_connect'];
	$_SESSION['vehicle_id'] = '';

	$sql_query = "SELECT * FROM user";
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

    <title>New Vehicle</title>

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
		<p><h2>Add a New Vehicle Record</h2></p>
		<p><a href="a_edit_records_vehicle.php">Back</a></p>
		<h3>Select a user, and enter the following information about the vehicle</h3>
		<main>
			<form action ="a_edit_records_vehicle_new.php" method="post">
			
			<?php
				echo '<select name ="accountID">';
				while($row = mysqli_fetch_assoc($result)) {
					echo '<option value ="' . $row['user_id'] . '"> ' . $row['user_name'] . '</option>';
				}
				echo '</select>';
			?>

			<div id="inputs">
				Type of Vehicle: <div id="inputs"><input type="text" name="type"> </div>
				Make: <div id="inputs"><input type="text" name="make"> </div>
				Model: <div id="inputs"><input type="text" name="model"> </div>
				Year: <div id="inputs"><input type="text" name="year"> </div>
				VIN: <div id="inputs"><input type="text" name="vin"> </div>
				License Plate Number: <div id="inputs"><input type="text" name="license_plate_no"> </div>
				Current Mileage: <div id="inputs"><input type="text" name="current_mileage"> </div>
				Recommended Oil: <div id="inputs"><input type="text" name="oil_recommended"> </div>
				Tire Size: <div id="inputs"><input type="text" name="tire_size"> </div>
			</div>

			<input type="submit" value="submit" name="submit"><br>

			<?php
				mysqli_select_db($db_connect, $db_name); 
				if (isset($_POST['submit'])) {

						$current_mileage;
						$license_plate_no;
						$make;
						$model;
						$oil_recommended;
						$tire_size;
						$type;
						$vin;
						$year;
						$user_id = mysqli_real_escape_string($db_connect, $_POST['accountID']);

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
							echo '<p stylywe="color: red">Year is a required Field</p>';
						}

						if($validYear && $validVin && $validType && $validModel && $validMake && $validTireSize && $validOilRec && $validLicenseNo && $validCurrentMileage) {
							$valid = TRUE;
						}

						if($valid) {
							$query = "INSERT INTO `vehicle`(`user_id`, `type`, `make`, `model`, `year`, `current_mileage`, `oil_recommended`, `tire_size`, `vin`, `license_plate_no`) VALUES ('$user_id','$type','$make','$model','$year','$current_mileage','$oil_recommended','$tire_size','$vin','$license_plate_no')";
							if($db_connect->query($query) === TRUE) {
								echo "New Vehicle Has Been Added!<br>";
								echo '<a href="a_edit_records_vehicle.php">Back</a>';

								echo '<br>';
								echo $_SESSION['vehicle_id'];

							} else {
								echo "Vehicle could not be added. Try Again, or Contact an Administrator.<br>";
								echo '<a href="a_edit_records_vehicle.php">Back</a>';
							}
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