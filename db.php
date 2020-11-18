<?php
// If the BLUEQUEUE constant isn't defined, then this file is being accessed in the browser directly, which isn't allowed. Redirect to the home page.
defined('BLUEQUEUE') or header('Location: index.php');

// Connects to the database
function connectDB(){
	// MySQL database runs locally
	$dbConnection = mysqli_connect("127.0.0.1", "u301528007_bluequeue", "BlueQueue551", "u301528007_bluequeue");
	if (mysqli_connect_errno()){
		die(mysqli_connect_error());
	}
	return $dbConnection;
}


?>
