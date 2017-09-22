<?php
/*
******************************************
*	edit_password.php
*	Stephen Beaty
******************************************
*/
	require('config.php');
	include('isLoggedIn.php');
	include('verification.php');

	$pw_id_check = "";
	$db_connect = $_SESSION['db_connect'];
	$password_id = $_SESSION['password_id'];
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

    <title>Edit - Password</title>

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
		<h2>Update Password Information</h2>
		<h3>Enter your old Password, then enter your new Password.</h3>
		<main>
			<p><a href="edit_records.php">Back</a></p>
			<form action ="edit_password.php" method="post">
		
		<div id="inputs">
			Current Password: <div id="inputs"><input type="password" name="old_password"></div>
			New Password: <div id="inputs"><input type="password" name="new_password"></div>
		</div>

			<input type="submit" value="submit" name="submit">

			<?php
				if (isset($_POST['submit'])) {
					$password;
					$last_pw;
					$new_password;

					$valid = FALSE;
					$validPassword = FALSE;
					$validNewPass = FALSE;

					if(notEmptyOrNull($_POST['old_password'])) {
							if(isLength20($_POST['old_password'])) {
								$validPassword = TRUE;
								$last_pw = mysqli_real_escape_string($db_connect, $_POST['old_password']);
								$password = mysqli_real_escape_string($db_connect, $_POST['old_password']);
							} else {
								echo '<p style="color: red">Current Password must be 20 characters or less</p>';
							}
						} else {
							echo '<p style="color: red">Current Password is a required Field</p>';
						}
					
					if(notEmptyOrNull($_POST['new_password'])) {
							if(isLength20($_POST['new_password'])) {
								$validNewPass = TRUE;
								$new_password = mysqli_real_escape_string($db_connect, $_POST['new_password']);
							} else {
								echo '<p style="color: red">New Password must be 20 characters or less</p>';
							}
						} else {
							echo '<p style="color: red">New Password is a required Field</p>';
						}

					if($validPassword && $validNewPass) {
						$valid = TRUE;
					}

					if($valid) {
						//verify that the passworxd entered matches last_pw io the database
						if($password == $_SESSION['password']) {
							$pw_id_check;

						//get the user's password_id - for extra verification
							$query = "SELECT * FROM `password` WHERE `password_id` = '$password_id'";
							$result = mysqli_query($db_connect, $query);
							while($row = mysqli_fetch_assoc($result)) {
								$pw_id_check = $row['password_id'];
							}

						//verify the user's password id
							if($pw_id_check == $_SESSION['password_id']) {
							
							//change the password
								$query = "UPDATE `password` SET `password`='$new_password', `last_pw`='$last_pw', `pw_age`=now(), `date_changed`=now()  WHERE `password_id` = '$password_id'";
								if($db_connect->query($query) === TRUE) {
									echo "Your Password was changed successfully!";
									$_SESSION['password'] = $new_password;
									echo '<a href="edit_records.php">Back</a>';
								} else {
									echo "An error occured. Password not updated.";
								}
							} else {
								echo'<p style="color: red">An error has occured. Please log out, then try again.If the problem continues to occur, contact an Administrator.</p>';
							}
					
						} else {
							echo '<p style="color: red">The current password you entered does not match the password you loggin in with. Please try again.';
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