<?php
/*
*******************************
*	user_vehicle_tire.php
*	Stephen Beaty
*******************************
*/
	require('config.php');
	include ('verification.php');
	include('isLoggedIn.php');

	$db_connect = $_SESSION['db_connect'];
	$record_id;

	if( isset($_GET['edit'])) {
		$record_id = $_GET['edit'];
		$sql_query = "SELECT * FROM tire WHERE vehicle_id = '$record_id'";
		$result = mysqli_query($db_connect, $sql_query);
		$_SESSION['result'] = $result;
		$_SESSION['record_id'] = $record_id;
	} else {
		$record_id = $_SESSION['record_id'];
		$sql_query = "SELECT * FROM tire WHERE vehicle_id = '$record_id'";
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

    <title>Tire</title>

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
		<h2>Update Vehicle Tire Information</h2>
		<p><a href="homepage.php">Back</a></p>
		<form action ="user_vehicle_tire.php" method="post">
		<main>

				<?php 
					if(mysqli_num_rows($_SESSION['result'])) {
						while($row = mysqli_fetch_assoc($_SESSION['result'])) {
							echo "<div>";
							echo 'Brand: <div id="inputs"><input type="text" name="brand" value="'. $row['brand'] . '"></div>';
							echo 'Size: <div id="inputs"><input type="text" name="size" value="' . $row['size'] . '"></div>';
							echo 'Type: <div id="inputs"><input type="text" name="type" value="' . $row['type'] . '"></div>';
							$newUsedCheck = $row['new_used'];
							switch ($newUsedCheck) {
								case "New":
									echo '<div id="inputs">New <input type = "radio" name="new_used" value="New" checked> &nbsp;&nbsp; Used <input type="radio" name="new_used" value="Used"></div>';
									break;
								case "Used":
									echo '<div id="inputs">New <input type = "radio" name="new_used" value="New"> &nbsp;&nbsp; Used <input type="radio" name="new_used" value="Used" checked></div>';
									break;
								default:
									echo '<div id="inputs">New <input type = "radio" name="new_used" value="New" checked> &nbsp;&nbsp; Used <input type="radio" name="new_used" value="Used"></div>';
									break;
							}
							echo "<//div>";
						}
					} else {
						echo '<p><a href="user_vehicle_tire_register.php">Add New Record</a></p>';
					}
				?>

				<br><input type="submit" name="submit" method="post" value="Update Info"><br>

				<?php
					if(isset($_POST['submit'])) {
						$record_id = $_SESSION['record_id'];
						$new_used = mysqli_real_escape_string($db_connect, $_POST['new_used']);
						$brand;
						$size;
						$type;

						$valid = FALSE;
						$validBrand = FALSE;
						$validSize = FALSE;
						$validType = FALSE;

						if(notEmptyOrNull($_POST['brand'])) {
							if(isLength12($_POST['brand'])) {
								$validBrand = TRUE;
								$brand = mysqli_real_escape_string($db_connect, $_POST['brand']);
							} else {
								echo '<p style="color: red">Brand must be 12 characters or less.</p>';
							}
						} else {
							echo '<p style="color: red">Brand is a required Field</p>';
						}
						
						if(notEmptyOrNull($_POST['size'])) {
							if(isLength7($_POST['size'])) {
								$validSize = TRUE;
								$size = mysqli_real_escape_string($db_connect, $_POST['size']);
							} else {
								echo '<p style="color: red">Size must be 7 characters or less.</p>';
							}
						} else {
							echo '<p style="color: red">Size is a required Field</p>';
						}
						
						if(notEmptyOrNull($_POST['type'])) {
							if(isLength10($_POST['type'])) {
								$validType = TRUE;
								$type = mysqli_real_escape_string($db_connect, $_POST['type']);
							} else {
								echo '<p style="color: red">Type must be 10 characters or less.</p>';
							}
						} else {
							echo '<p style="color: red">Type is a required Field</p>';
						}
						
						
						if($validType && $validSize && $validBrand) {
							$valid = TRUE;
						}

						if($valid) {
							$sql_update_query = "UPDATE `tire` SET `type`='$type',`size`='$size',`brand`='$brand',`new_used`='$new_used' WHERE `vehicle_id`='$record_id'";

							if($db_connect->query($sql_update_query) === TRUE) {
								echo "Tire Information has been updated!<br>";
								echo '<a href="homepage.php">Back</a>';
							} else {
								echo "Record could not be updated. <br>";
								echo "Please Contact an Administrator <br>";
								echo '<a href="homepage.php">Back</a>';
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