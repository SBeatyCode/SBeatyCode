<?php
/*
*******************************
*	user_vehicle_oil_register.php
*	Stephen Beaty
*******************************
*/
	require('config.php');
	include('verification.php');
	include('isLoggedIn.php');

	$db_connect = $_SESSION['db_connect'];
?>

<html>
	<head>
		<!--Bootstrap-->
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <title>Oil - New Entry</title>

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
    	<h2>Enter Your Vehicle's Oil Information</h2>
		<p><a href="homepage.php">Back</a></p>
		<form action ="user_vehicle_oil_register.php" method="post">
		<main>

						<div>
						Brand: <div id="inputs"><input type="text" name="brand"></div>
						Weight: <div id="inputs"><input type="text" name="weight"></div>
						Quantity: <div id="inputs"><input type="text" name="quantity"></div>
						</div>


				<br><input type="submit" name="submit" method="post" value="Add Oil Info"><br>

				<?php
					if(isset($_POST['submit'])) {
						$vehicle_id = $_SESSION['record_id'];

						$brand;
						$weight;
						$quantity;

						$valid = FALSE;
						$validBrand = FALSE;
						$validWeight = FALSE;
						$validQuantity = FALSE;

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
						
						if(notEmptyOrNull($_POST['weight'])) {
							if(isDecimal7($_POST['weight'])) {
								$validWeight = TRUE;
								$weight = mysqli_real_escape_string($db_connect, $_POST['weight']);
							} else {
								echo '<p style="color: red">Weight must be 7 numberic characters or less.</p>';
							}
						} else {
							echo '<p style="color: red">Weight is a required Field</p>';
						}
						
						if(notEmptyOrNull($_POST['quantity'])) {
							if(isInt3($_POST['quantity'])) {
								$validQuantity = TRUE;
								$quantity = mysqli_real_escape_string($db_connect, $_POST['quantity']);
							} else {
								echo '<p style="color: red">Quantity must be 3 numberic characters or less. Do not inclue units, like lbs or kg</p>';
							}
						} else {
							echo '<p style="color: red">Quantity is a required Field</p>';
						}
						

						if($validQuantity && $validWeight && $validBrand) {
							$valid = TRUE;
						}

						if($valid) {
							$sql_query = "INSERT INTO `oil` (`brand`,`weight`,`quantity`, `vehicle_id`) VALUES ('$brand', '$weight', '$quantity', '$vehicle_id')";

							if($db_connect->query($sql_query) === TRUE) {
								echo "Oil Information has been added!<br>";
								echo '<a href="homepage.php">Back</a>';
							} else {
								echo "Record could not be updated. <br>";
								echo "Please Contact an Administrator <br>";
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