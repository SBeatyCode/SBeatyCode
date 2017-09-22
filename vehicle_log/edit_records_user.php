<?php
/*
*******************************
*	edit_records_user.php
*	Stephen Beaty
*
*	Credit to Satish B and Lecture Snippets on YouTube for some ideas
*******************************
*/
	require('config.php');
	include('a_navigation_header.php');

	$db_connect = $_SESSION['db_connect'];

	$sql_query = "SELECT * FROM user";
	$result = mysqli_query($db_connect, $sql_query);
?>
<html>
	<link href="adminStyle.css" rel="stylesheet" type="text/css">
	<head><h2>User Table</h2></head>
	<body>
		<p><h3>Select a Record to Edit, or Delete</h3></p>
		<main>
			<table>

				<?php 

					echo "<tr>";
					echo "<th>User ID</th>";
					echo "<th>User Name</th>";
					echo "<th>Edit</th>";
					echo "<th>Delete</th>";
					echo "</tr>"; 

					while($row = mysqli_fetch_assoc($result)) {
						echo "<tr>";
						echo '<form action ="edit_records_user.php" method="post">';
						echo "<td>" . $row['user_id'] . "</td>";
						echo "<td>" . $row['user_name'] . "</td>";
						echo "<td><a href= edit_records_user_editing.php?edit=" . $row['user_id'] . ">Edit</a></td>";
						echo "<td><a href= edit_records_user_delete.php?edit=" . $row['user_id'] . ">Delete</a></td>";
						echo "</tr>";
					}
				?>
			</table>
		</main>
	</body>

</html>