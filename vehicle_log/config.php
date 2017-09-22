<?php
/*
****************************************
*	config.php
*	Stephen Beaty
*****************************************
*/
if(session_id() == '') {
        session_start();
}
$location = 'pdb11.awardspace.net';
$username = '2118535_cpt283';
$password = 'sum41gOATS';
$db_name = '2118535_cpt283';
$db_connect = mysqli_connect($location, $username, $password, $db_name);

//start a SESSION here, 
//if(session_id() == '') {
//	session_start();
//}
//put connection information in the SESSION array
	$_SESSION['db_location'] = $location;
	$_SESSION['db_username'] = $username;
	$_SESSION['db_password'] = $password;
	$_SESSION['db_name'] = $db_name;
	$_SESSION['db_connect'] = $db_connect;
?>