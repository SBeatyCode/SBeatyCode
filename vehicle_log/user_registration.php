<?php
/*
******************************************
*	user_registration.php
*	Stephen Beaty
******************************************
*/
	require('config.php');
	include('verification.php');
	$db_connect = $_SESSION['db_connect'];
	$_SESSION['user_id'] = '';
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

    <title>Sign Up!</title>

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
      <li class="active"><a href="login.php">Home</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign In Now!</a></li>
  </div>
</nav>
    <!--End Nav Bar -->
		<p><h1>Welcome, New User!</h1></p>
		<h2>Please enter the information below to sign up!</h2>
		<main>
			<p><a href="login.php">Back</a></p>
			<form action ="user_registration.php" method="post">

			User Name: <input type="text" name="user_name"> <br>
			Password: <input type="text" name="password"> <br>
			First Name: <input type="text" name="first_name"> <br>
			Last Name: <input type="text" name="last_name"> <br>
			Email: <input type="text" name="email"> <br>
			Phone: <input type="text" name="phone"> <br>
			Address: <input type="text" name="address"> <br>
			City: <input type="text" name="city"> <br>
			State: <input type="text" name="state"> <br>
			Zip: <input type="text" name="zip"> <br>

			<input type="submit" value="submit" name="submit">
			<?php
				mysqli_select_db($db_connect, $db_name); 
				if (isset($_POST['submit'])) {
					//Do you need pass and user id here? check
					$password_id;
					$user_id;
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
					$validPassword = FALSE;
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
					

					if(notEmptyOrNull($_POST['password'])) {
							if(isLength20($_POST['password'])) {
								$validPassword = TRUE;
								$password= mysqli_real_escape_string($db_connect, $_POST['password']);
							} else {
								echo '<p style="color: red">Password must be 20 characters or less</p>';
							}
						} else {
							echo '<p style="color: red">Password is a required Field</p>';
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

					if($validZip && $validState && $validCity && $validAddress && $validPhone && $validEmail && $validFirstName && $validLastName && $validUserName && $validPassword) {
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
						$query = "INSERT INTO `user`(`user_name`, `first_name`, `last_name`, `email`, `phone`, `address`, `city`, `state`, `zip`) VALUES ('$user_name','$$first_name','$last_name','$email','$phone','$address','$city','$state','$zip')";
						if($db_connect->query($query) === TRUE) {
						
						//add the user_id, username, and password to the SESSION array
							$query = "SELECT `user_id` FROM `user` WHERE `user_name` = '$user_name'";
							$result = mysqli_query($db_connect, $query);
							while($row = mysqli_fetch_assoc($result)) {
								$user_id = $row['user_id'];
								$_SESSION['user_id'] = $user_id;
								$_SESSION['username'] = $user_name;
								$_SESSION['password'] = $password;
							}	

						//insert data into the password table, and get the password_id.
							$pwQuery = "INSERT INTO `password` (`password`, `last_pw`, `pw_age`, `date_changed`, `user_id`) VALUES ('$password', 'n/a', now(), now(), '$user_id')";
							if($db_connect->query($pwQuery) === TRUE) {
								$sqlQuery = "SELECT `password_id` FROM `password` WHERE `user_id` = '$user_id'";
								$result = mysqli_query($db_connect, $sqlQuery);
								while($row = mysqli_fetch_assoc($result)) {
									$password_id = $row['password_id'];
									$_SESSION['password_id'] = $password_id;
								}

							//put the password id in the user table
								$query = "UPDATE `user` SET `password_id`='$password_id' WHERE `user_id`='$user_id'";
								if($db_connect->query($query) === TRUE) {
									echo "Data was sucessfully entered!<br>";
									echo "<a href=homepage.php>Next Page</a>";
								}
							}
						} else {
							echo "Please Try Again, or contact your Database Administrator";
						}
					} else {
						echo '<p style="color: red">Please complete all fields</p>';
						echo '<a href="login.php">Back</a>';
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