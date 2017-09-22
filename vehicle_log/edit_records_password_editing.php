<?php
/*
*******************************
*	a_edit_records_password_editing.php
*	Stephen Beaty
*******************************
*/
	require('config.php');
	include('a_navigation_header.php');

	$db_connect = $_SESSION['db_connect'];
	$record_id;

	if( isset($_GET['edit'])) {
		$record_id = $_GET['edit'];
		$sql_query = "SELECT * FROM password WHERE password_id = '$record_id'";
		$result = mysqli_query($db_connect, $sql_query);
		$_SESSION['result'] = $result;
		$_SESSION['record_id'] = $record_id;
	} /*else {
		$record_id = $_SESSION[''];
		$sql_query = "SELECT * FROM password WHERE password_id = '$record_id'";
		$result = mysqli_query($db_connect, $sql_query);
		$_SESSION['result'] = $result;
	}*/
?>

<html>
	<link href="adminStyle.css" rel="stylesheet" type="text/css">
	<head><h2>Edit Selected User Record</h2></head>
	<body>
		<form action ="a_edit_records_password_editing.php" method="post">
		<main>

				<?php 
					while($row = mysqli_fetch_assoc($_SESSION['result'])) {
						echo "<div>";
						echo 'User ID: <input type="text" name="user_id" readonly="true" value="'. $row['user_id'] . '"><br>';
						echo 'User Name: <input type="text" name="user_name" value="'. $row['user_name'] . '"><br>';
						echo 'Password ID: <input type="text" name="password_id" readonly="true" value="' . $row['password_id'] . '"><br>';
						echo 'First Name: <input type="text" name="first_name" value="' . $row['first_name'] . '"><br>';
						echo 'Last Name: <input type="text" name="last_name" value="' . $row['last_name'] . '"><br>';
						echo 'Email: <input type="text" name="email" value="' . $row['email'] . '"><br>';
						echo 'Phone: <input type="text" name="phone" value="' . $row['phone'] . '"><br>';
						echo 'Address: <input type="text" name="address" value="' . $row['address'] . '"><br>';
						echo 'City: <input type="text" name="city" value="' . $row['city'] . '"><br>';
						echo 'State: <input type="text" name="state" value="' . $row['state'] . '"><br>';
						echo 'Zip: <input type="text" name="zip" value="' . $row['zip'] . '"><br>';
						echo "<//div>";
					}
				?>

				<br><input type="submit" name="submit" method="post" value="Update Database"><br>

				<?php
					if(isset($_POST['submit'])) {
						$user_id = mysqli_real_escape_string($db_connect, $_POST['user_id']);
						$user_name = mysqli_real_escape_string($db_connect, $_POST['user_name']);
						$password_id = mysqli_real_escape_string($db_connect, $_POST['password_id']);
						$first_name = mysqli_real_escape_string($db_connect, $_POST['first_name']);
						$last_name = mysqli_real_escape_string($db_connect, $_POST['last_name']);
						$email = mysqli_real_escape_string($db_connect, $_POST['email']);
						$phone = mysqli_real_escape_string($db_connect, $_POST['phone']);
						$address = mysqli_real_escape_string($db_connect, $_POST['address']);
						$city = mysqli_real_escape_string($db_connect, $_POST['city']);
						$state = mysqli_real_escape_string($db_connect, $_POST['state']);
						$zip = mysqli_real_escape_string($db_connect, $_POST['zip']);
						$record_id = $_SESSION['record_id'];

						$sql_update_query = "UPDATE `user` SET `user_id`='$user_id',`user_name`='$user_name',`password_id`='$password_id',`first_name`='$first_name',`last_name`='$last_name',`email`='$email',`phone`='$phone',`address`='$address',`city`='$city',`state`='$state',`zip`='$zip' WHERE `user_id`='$record_id'";

						if($db_connect->query($sql_update_query) === TRUE) {
							echo "The record has been updated successfully!";
							echo '<a href="a_edit_records_user.php">Back</a>';
						} else {
							echo "Record could not be updated. <br>";
							echo "Please Contact your Database Administrator <br>";
						}
					}
				
				?>
		</main>
		<footer><p><h4>Note: Must contact Database Administrator to edit User ID or Password ID</h4></p></footer>
	</body>
</html>