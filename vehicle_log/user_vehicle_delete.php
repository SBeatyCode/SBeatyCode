<?php
/*
*******************************
*	user_vehicle_delete.php
*	Stephen Beaty
*******************************
*/
	require('config.php');
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

    <title>Delete Vehicle</title>

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
		<h2 style="text-align: center;">Do You Want To DELETE This Vehicle From Your List?</h2>
		<p><h4 style="text-align: center;">Please Note: Once Deleted, your Vehicle information <strong>CANNOT be recovered!</strong></h4></p><br>
		<p><a href="homepage.php">Back</a></p><br>
		<form action ="user_vehicle_delete.php" method="post">
		<main>

				<?php 
					while($row = mysqli_fetch_assoc($_SESSION['result'])) {
						echo '<div id="inputs">';
						echo 'Type: <div id="inputs"><input type="text" name="type" readonly="true" value="'. $row['type'] . '"></div>';
						echo 'Make: <div id="inputs"><input type="text" name="make" readonly="true" value="' . $row['make'] . '"></div>';
						echo 'Model: <div id="inputs"><input type="text" name="model" readonly="true" value="' . $row['model'] . '"></div>';
						echo 'Year: <div id="inputs"><input type="text" name="year" readonly="true" value="' . $row['year'] . '"></div>';
						echo 'Current Mileage: <div id="inputs"><input type="text" name="current_mileage" readonly="true" value="' . $row['current_mileage'] . '"></div>';
						echo 'Oil Recommended: <div id="inputs"><input type="text" name="oil_recommended" readonly="true" value="' . $row['oil_recommended'] . '"></div>';
						echo 'Tire Size: <div id="inputs"><input type="text" name="tire_size" readonly="true" value="' . $row['tire_size'] . '"></div>';
						echo 'VIN: <div id="inputs"><input type="text" name="vin" readonly="true" value="' . $row['vin'] . '"></div>';
						echo 'License Plate Number: <div id="inputs"><input type="text" name="license_plate_no" readonly="true" value="' . $row['license_plate_no'] . '"></div>';
						echo "</div>";
					}
				?>
				<br>
					<input type="submit" name="submit" method="post" value="Delete Record"><br>
					<a href="homepage.php">Cancel</a><br>

				<?php
					if(isset($_POST['submit'])) {
						$record_id = $_SESSION['record_id'];
						$sql_delete_query = "DELETE FROM `vehicle` WHERE `vehicle_id`='$record_id'";

						if($db_connect->query($sql_delete_query) === TRUE) {
							echo "<h3>The vehicle has been deleted successfully!</h3><br>";
							echo '<h3><a href="homepage.php">Back</a></h3>';
						} else {
							echo "Record could not be updated. <br>";
							echo "Please Contact your Database Administrator <br>";
						}
					}
				
				?>
		</main>
		<footer><p><h4><em>Please Use Caution When Choosing to DELETE a record</em></h4></p></footer>
		<!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
      <script src = "https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>     
      <!-- Include all compiled plugins -->
      <script src = "//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
	</body>
</html>