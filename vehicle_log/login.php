<?php
/*
*******************************
*	login.php
*	Stephen Beaty
*******************************
*/
	//if(session_id() == '') {
        //        session_start();
        //}
        $_SESSION = array();
	require('config.php');
	include('verification.php');
	$db_connect = $_SESSION['db_connect'];

	$password_id = "";
?>
<html>
	<link href="mainStyles.css" rel="stylesheet" type="text/css">
	<head>
		<!--Bootstrap-->
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <title>Home - Log In</title>

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
    	<p><h1 style="text-align: center;">Welcome to Vehicle Log!</hi></p>
		<p><h2 style="text-align: center;">Log In, or Register a New Account</h2></p>
		<form action ="login.php" method="post">		
		<main>
			<p>Please Enter Your User Name and Password to Log In:</p>

			<div id="inputs">
				User Name: <div id="inputs"><input type="text" placeholder="User Name" name="user_name"></div>
				Password: <div id="inputs"><input type="password" placeholder="Password" name="password"></div>
			</div>

				<input type="submit" value="submit" name="submit">		

			<?php
			//Verification, and getting user-entered data
				if (isset($_POST['submit'])) {
					$user_name;
					$password;
					$isLoggedIn;

					$valid = FALSE;
					$validUserName = FALSE;
					$validPassword = FALSE;

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
							$password = mysqli_real_escape_string($db_connect, $_POST['password']);
						} else {
							echo '<p style="color: red">Password must be 20 characters or less</p>';
						}
					} else {
						echo '<p style="color: red">Password is a required Field</p>';
					}

					if($validPassword && $validUserName) {
						$valid = TRUE;
					}

					//if entered data is valid, check to see if the entered username and password exist
						if($valid) {
							$login_query_un = "SELECT `user_id` , `user_name`, `admin_bool` FROM `user` WHERE `user_name` = '$user_name'";
							//$login_query_pass = "SELECT `user_id` , `password`, `password_id` FROM `password` WHERE `password` = '$password'";
							$login_query_pass = "SELECT * FROM `password` WHERE `password` = '$password'";

							$un_array = array();
							$pass_array = array();

							$un_result = mysqli_query($_SESSION['db_connect'], $login_query_un);
							$pass_result = mysqli_query($_SESSION['db_connect'], $login_query_pass);

							$currentDate = time();
							$pw_age;

							if(isset($un_result) && isset($pass_result) && !empty($un_result) && $un_result != NULL && !empty($pass_result) && $pass_result != NULL) {
								while($row = mysqli_fetch_assoc($un_result)) {
									$un_array['user_id'] = $row['user_id'];
									$isAdmin = $row['admin_bool'];
								}
								while($row = mysqli_fetch_assoc($pass_result)) {
									$pass_array['user_id'] = $row['user_id'];
									$password_id = $row['password_id'];
									$str_pw_age = $row['pw_age'];
									$pw_age = strtotime($str_pw_age);
								}
					
							//log te user in to the correct page, either Admin or user, and set the isAdmin variable to the SESSION array
								if (array_key_exists('user_id', $un_array) && array_key_exists('user_id', $pass_array)) {
								
								//check the date - convert into # of days relative to today that the user last logged in
								//if it's been 30+ days, PW must be changed
									$currentDate = idate('s', $currentDate);
									$pw_age = idate('s', $pw_age);
									$pwExpirationCheck = ($currentDate - $pw_age)*60*24;
									
									if ($un_array['user_id'] == $pass_array['user_id'] && $un_array['user_id']) {
										if($isAdmin == TRUE) {
											if ($pwExpirationCheck >= 2592000) {
												echo 'Your Password Needs to be changed!<br>';
												echo '<a href="a_edit_password_expired.php">Click to Continue!</a>';
												$_SESSION['isAdmin'] = TRUE;
											} else {
												echo "Welcome, Admin <strong>" . $_POST['user_name'] . "</strong>!<br />";
												echo "<a href='a_edit_records.php'>Click to Continue</a>";
												$_SESSION['isAdmin'] = TRUE;
											}
										} else {
											if ($pwExpirationCheck >= 2592000) {
												echo 'Your Password Needs to be changed!<br>';
												echo '<a href="edit_password_expired.php">Click to Continue!</a>';
												$_SESSION['isAdmin'] = FALSE;
											} else {
												echo "Welcome, <strong>" . $_POST['user_name'] . "</strong>!<br />";
												echo "<a href='homepage.php'>Click to Continue</a>";
												$_SESSION['isAdmin'] = FALSE;
											}
										}
											$isLoggedIn = TRUE;
											$_SESSION['username'] = $_POST['user_name'];
											$_SESSION['password'] = $_POST['password'];
											$_SESSION['user_id'] = $un_array['user_id'];
											$_SESSION['password_id'] = $password_id;
											$_SESSION['isLoggedIn'] = $isLoggedIn;
									}
								
									} else {
										echo "No user found! Would you like to <a href ='user_registration.php'>register a new account?</a>";
										$_SESSION['isLoggedIn'] = FALSE;
										session_destroy();
										$_SESSION = array();
										exit();
									}
								} else {
									echo "No user found! Would you like to <a href ='user_registration.php'>register a new account?</a>";
									$_SESSION['isLoggedIn'] = FALSE;
									session_destroy();
									$_SESSION = array();
									exit();
								}
						}
				} else {
					echo '<p><h3>New? <a href ="user_registration.php">Sign up here!</a><h3></p>';
				}
			?>
                        <br>
                        <a href="../portfolio.html">Back To Portfolio</a>
                </main>
		<!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
      <script src = "https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>     
      <!-- Include all compiled plugins -->
      <script src = "//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
	</body>
</html>