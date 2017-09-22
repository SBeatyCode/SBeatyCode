<!--
*******************************
*	a_edit_records_user_delete.php
*	Stephen Beaty
*******************************
-->
<?php
	require('config.php');
	include('a_navigation_header.php');

	$db_connect = $_SESSION['db_connect'];
	$record_id;

	if( isset($_GET['edit'])) {
		$record_id = $_GET['edit'];
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
	<link href="adminStyle.css" rel="stylesheet" type="text/css">
	<head><h2>Delete Selected User Record</h2></head>
	<body>
		<form action ="a_edit_records_user_delete.php" method="post">
		<main>

				<?php 
					while($row = mysqli_fetch_assoc($_SESSION['result'])) {
						echo "<div>";
						echo 'User ID: <input type="text" name="user_id" readonly="true" value="'. $row['user_id'] . '"><br>';
						echo 'User Name: <input type="text" name="user_name" readonly="true" value="'. $row['user_name'] . '"><br>';
						echo 'Password ID: <input type="text" name="password_id" readonly="true" value="' . $row['password_id'] . '"><br>';
						echo 'First Name: <input type="text" name="first_name" readonly="true" value="' . $row['first_name'] . '"><br>';
						echo 'Last Name: <input type="text" name="last_name" readonly="true" value="' . $row['last_name'] . '"><br>';
						echo 'Email: <input type="text" name="email" readonly="true" value="' . $row['email'] . '"><br>';
						echo 'Phone: <input type="text" name="phone" readonly="true" value="' . $row['phone'] . '"><br>';
						echo 'Address: <input type="text" name="address" readonly="true" value="' . $row['address'] . '"><br>';
						echo 'City: <input type="text" name="city" readonly="true" value="' . $row['city'] . '"><br>';
						echo 'State: <input type="text" name="state" readonly="true" value="' . $row['state'] . '"><br>';
						echo 'Zip: <input type="text" name="zip" readonly="true" value="' . $row['zip'] . '"><br>';
						echo "<//div>";
					}
				?>

				<br><input type="submit" name="submit" method="post" value="Delete Record"><br>

				<?php
					if(isset($_POST['submit'])) {
						$record_id = $_SESSION['record_id'];
						$sql_delete_query = "DELETE FROM `user` WHERE `user_id`='$record_id'";

						if($db_connect->query($sql_delete_query) === TRUE) {
							echo "The record has been deleted successfully!";&nbsp;
							echo '<a href="edit_records_user.php">Back</a>';
						} else {
							echo "Record could not be updated. <br>";
							echo "Please Contact your Database Administrator <br>";
						}
					}
				
				?>
		</main>
		<footer><p><h4><em>Please Use Caution When Choosing to DELETE a record</em></h4></p></footer>
	</body>
</html>