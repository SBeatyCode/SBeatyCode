<?php
/*
*******************************
*	user_user_edit.php
*	Stephen Beaty
*******************************
*/
	require('config.php');
	include('verification.php');
	include('isLoggedIn.php');

	$db_connect = $_SESSION['db_connect'];
	$record_id;

	$count = 0;
	if($count == 0) {
		$record_id = $_SESSION['user_id'];
		$sql_query = "SELECT * FROM user WHERE user_id = '$record_id'";
		$result = mysqli_query($db_connect, $sql_query);
		$_SESSION['result'] = $result;
		$_SESSION['record_id'] = $record_id;
	} else {
		$record_id = $_SESSION['record_id'];
		$sql_query = "SELECT * FROM user WHERE user_id = '$record_id'";
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

    <title>Edit - Personal</title>

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
		<h2>Edit Your Personal Information</h2>
		<form action ="user_user_edit.php" method="post">
		<main>
			<p><a href="edit_records.php">Back</a></p>
				<?php 
					while($row = mysqli_fetch_assoc($_SESSION['result'])) {
						echo '<div id="inputs">';
						echo 'User Name: <div id="inputs"><input type="text" name="user_name" value="'. $row['user_name'] . '"></div>';
						echo 'First Name: <div id="inputs"><input type="text" name="first_name" value="' . $row['first_name'] . '"></div>';
						echo 'Last Name: <div id="inputs"><input type="text" name="last_name" value="' . $row['last_name'] . '"></div>';
						echo 'Email: <div id="inputs"><input type="text" name="email" value="' . $row['email'] . '"></div>';
						echo 'Phone: <div id="inputs"><input type="text" name="phone" value="' . $row['phone'] . '"></div>';
						echo 'Address: <div id="inputs"><input type="text" name="address" value="' . $row['address'] . '"></div>';
						echo 'City: <div id="inputs"><input type="text" name="city" value="' . $row['city'] . '"></div>';
						echo 'State: <div id="inputs"><input type="text" name="state" value="' . $row['state'] . '"></div>';
						echo 'Zip: <div id="inputs"><input type="text" name="zip" value="' . $row['zip'] . '"></div>';
						echo "</div>";
					}
				?>

				<br><input type="submit" name="submit" method="post" value="Update Database"><br>

				<?php
					if(isset($_POST['submit'])) {
						$record_id = $_SESSION['record_id'];

						$user_name;
						$password;
						$first_name;
						$last_name;
						$email;
						$phone;
						$address;
						$city;
						$state;
						$zip;

						$valid = FALSE;
						$validUserName = FALSE;
						$validFirstName = FALSE;
						$validLastName = FALSE;
						$validEmail = FALSE;
						$validPhone = FALSE;
						$validAddress = FALSE;
						$validCity = FALSE;
						$validState = FALSE;
						$validZip = FALSE;
					
					//Verification, and getting variables from user input
					if(notEmptyOrNull($_POST['user_name'])) {
							if(isLength15($_POST['user_name'])) {
								$validUserName = TRUE;
								$user_name = mysqli_real_escape_string($db_connect, $_POST['user_name']);
							} else {
								echo '<p style="color: red">User Name must be 15 characters or less</p>';
							}
						} else {
							echo '<p style="color: red">User Name is a required Field</p>';
						}
					
					if(notEmptyOrNull($_POST['first_name'])) {
							if(isLength12($_POST['first_name'])) {
								$validFirstName = TRUE;
								$first_name = mysqli_real_escape_string($db_connect, $_POST['first_name']);
							} else {
								echo '<p style="color: red">First Name must be 12 characters or less</p>';
							}
						} else {
							echo '<p style="color: red">First Name is a required Field</p>';
						}
					
					if(notEmptyOrNull($_POST['last_name'])) {
							if(isLength12($_POST['last_name'])) {
								$validLastName = TRUE;
								$last_name = mysqli_real_escape_string($db_connect, $_POST['last_name']);
							} else {
								echo '<p style="color: red">Last Name must be 12 characters or less</p>';
							}
						} else {
							echo '<p style="color: red">Last Name is a required Field</p>';
						}
					
					if(notEmptyOrNull($_POST['email'])) {
							if(isValidEmail($_POST['email'])) {
								$validEmail = TRUE;
								$email = mysqli_real_escape_string($db_connect, $_POST['email']);
							} else {
								echo '<p style="color: red">Email must be 20 characters or less, contain the @ sign, a domain, a dot and an extention.</br> For Example, examples@example.com</p>';
							}
						} else {
							echo '<p style="color: red">Email is a required Field</p>';
						}
					
					if(notEmptyOrNull($_POST['phone'])) {
							if(isValidPhone($_POST['phone'])) {
								$validPhone = TRUE;
								$phone = mysqli_real_escape_string($db_connect, $_POST['phone']);
								//$phone = preg_replace('/-/', '', $phone);
							} else {
								echo '<p style="color: red">Phone Number must be formatted like 000-000-0000</p>';
							}
						} else {
							echo '<p style="color: red">Phone is a required Field</p>';
						}	
					
					if(notEmptyOrNull($_POST['address'])) {
							if(isLength20($_POST['address'])) {
								$validAddress = TRUE;
								$address = mysqli_real_escape_string($db_connect, $_POST['address']);
							} else {
								echo '<p style="color: red">Address must be 20 characters or less</p>';
							}
						} else {
							echo '<p style="color: red">Address is a required Field</p>';
						}
					
					if(notEmptyOrNull($_POST['city'])) {
							if(isLength15($_POST['city'])) {
								$validCity = TRUE;
								$city = mysqli_real_escape_string($db_connect, $_POST['city']);
							} else {
								echo '<p style="color: red">City must be 15 characters or less</p>';
							}
						} else {
							echo '<p style="color: red">City is a required Field</p>';
						}
					
					if(notEmptyOrNull($_POST['state'])) {
							if(isLength2($_POST['state'])) {
								$validState = TRUE;
								$state = mysqli_real_escape_string($db_connect, $_POST['state']);
							} else {
								echo '<p style="color: red">State must be 2 characters</p>';
							}
						} else {
							echo '<p style="color: red">State is a required Field</p>';
						}
					
					if(notEmptyOrNull($_POST['zip'])) {
							if(isInt5($_POST['zip']) && strlen($_POST['zip']) > 4) {
								$validZip = TRUE;
								$zip = mysqli_real_escape_string($db_connect, $_POST['zip']);
							} else {
								echo '<p style="color: red">Zip must be 5 numberic characters</p>';
							}
						} else {
							echo '<p style="color: red">Zip is a required Field</p>';
						}

					if($validZip && $validState && $validCity && $validAddress && $validPhone && $validEmail && $validFirstName && $validLastName && $validUserName) {
						//make sure there is no existing user name for the user name the user entered
						$nameCheck = "SELECT `user_name` FROM `user` WHERE `user_name` = '$user_name'";
						if($db_connect->query($nameCheck) === TRUE) {
							echo '<p style="color: red">The selected User Name already exists. Please choose another one.</p>';
						} else {
							$valid = TRUE;
						}		
					}

					//if all valid, continue with queries
					if($valid) {
						$sql_update_query = "UPDATE `user` SET `user_name`='$user_name',`first_name`='$first_name',`last_name`='$last_name',`email`='$email',`phone`='$phone',`address`='$address',`city`='$city',`state`='$state',`zip`='$zip' WHERE `user_id`='$record_id'";

						if($db_connect->query($sql_update_query) === TRUE) {
							echo "The record has been updated successfully!";
							$_SESSION['username'] = $user_name;
							echo '<a href="edit_records.php">Back</a>';
						} else {
							echo "Record could not be updated. <br>";
							echo "Please Contact your Database Administrator <br>";
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