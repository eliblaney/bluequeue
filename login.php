<?php
// Start session and define the BLUEQUE constant
session_start();
define('BLUEQUEUE');

// This function redirects to another page when the user successfully authenticates
// $follow - Whether to follow the optional 'redirect' URL parameter
// $default_redirect - The default page to redirect to, unless there is a 'redirect' URL parameter
function redirectAuth($follow = true, $default_redirect = "index.php") {
	$redirect = $default_redirect;
	// Only allow reading the 'redirect' URL parameter if it exists $follow is true
	if($follow && isset($_GET['redirect'])) {
		// Prevent redirecting to malicious sites
		$redirect = trim(preg_replace("(https?:\/\/|www\.)", "", $_GET['redirect']));
		if(!$redirect) {
			// Invalid redirect means just use the default redirect
			$redirect = $default_redirect;
		}
	}
	// Make the redirection
	header("Location: $redirect");
	die("You are being redirected... Please <a href='$redirect'>click here</a> if you are not redirected in 5 seconds");
}

// When logged in, we can redirect automatically
if(isset($_SESSION['user'])) {
	// If application wants to log out, unset the user's session data
	if(isset($_GET['logout']) && $_GET['logout']) {
		unset($_SESSION['user']);
	}
	// Prevent following URL parameters to avoid potential infinite loops
	redirectAuth(false);
}

$invalid_login = false;
// Submission is when they submit the log in form
if(isset($_POST['submit'])) {
	require('db.php');
	$conn = connectDB();

	// Automatically convert their Net ID to an escaped uppercase string
	$netid = strtoupper(mysqli_real_escape_string($conn, $_POST['netid']));

	// Get only the login id and hashed password for the given Net ID
	$q = "SELECT id, password FROM login WHERE netid='$netid'";
	$result = mysqli_query($conn, $q);

	if(mysqli_num_rows($result) > 0) {
		// User exists, check password
		$row = mysqli_fetch_assoc($result);
		$login_id = $row['id'];
		
		echo $hash."<br>";
		echo $row['password'];
		// Checks hashed passwords
		if(password_verify($_POST['password'], $row['password'])) {
			// Passwords match, get user data
			$q = "SELECT customer_id, first_name, last_name, email, active, create_date, phone, dob, id, uuid, netid, admin, address, address2, county, city, postal_code, state, country FROM customer INNER JOIN login ON customer.login_id=login.id INNER JOIN address ON customer.address_id=address.address_id WHERE login_id='$login_id'";
			$result = mysqli_query($conn, $q);

			if(mysqli_num_rows($result) > 0) {
				// User data exists, set their session
				$row = mysqli_fetch_assoc($result);

				// Convert MySQL tinyints to PHP booleans
				$row['active'] = !strcmp($row['active'], '1');
				$row['admin'] = !strcmp($row['admin'], '1');

				// Set user session and redirect
				$_SESSION['user'] = $row;
				redirectAuth();
			} else {
				// Error: Couldn't find customer for user
				$invalid_login = true;
			}
		} else {
			// Error: Invalid password
			$invalid_login = true;
		}
	} else {
		// Error: Invalid Net ID
		$invalid_login = true;
	}

	mysqli_close($conn);
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<title>Log In</title>
		<meta name="description" content="Reserve KFC times and more with BlueQueue!">
		<meta name="author" content="Eli Blaney & Gisselle Estevez">

		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
		<link rel="stylesheet" href="assets/css/login.css?v=1.0.1">

	</head>
	<body>
		<div class="container-fluid p-0">
			<div class="cu-heading cu-border-top">
				<img id="logo" src="assets/img/logo.png" alt="Creighton Logo">
				<div class="nav-buttons">
					<a href="index.php" class="btn btn-primary">Home</a>
				</div>
			</div>

			<div class="main-content">
				<form class="userform" action="" method="POST">
					<h3>Log in</h3>
<?php
if($invalid_login) {
?>
					<p class="error">Your Net ID or password is incorrect. Please try again.</p>
<?php
}
?>
					<input name="netid" type="text" placeholder="Net ID" class="form-control m-3" pattern="[A-Za-z]{3}\d{5}(@creighton.edu)?" required />
					<input name="password" type="password" placeholder="Password" class="form-control m-2" minlength="6" required />
					<input name="submit" type="submit" class="btn btn-primary m-3" />
				</form>
			</div>
			<!-- end main content -->
			<div class="cu-heading cu-border-bottom">
				<img class="logo" src="assets/img/logo.png" alt="Creighton Logo">
				<div class="links ml-5">
					<a href="index.php">Home</a>
					<a href="about.php">About</a>
					<a href="reserve.php">Reserve</a>
<?php
if($user && $user['admin']) {
?>
					<a href="admin.php">Administration</a>
<?php
}
?>
				</div>
			</div>
		</div>

		<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
	</body>
</html>
