<?php

function connectDB(){
	$dbConnection = mysqli_connect("127.0.0.1", "u301528007_bluequeue", "BlueQueue551", "u301528007_bluequeue");
	if (mysqli_connect_errno()){
		die(mysqli_connect_error());
	}
	return $dbConnection;
}


?>
