<?php
//Check if the user exists in our database
session_start();
define('BLUEQUEUE');

$user = null;
if(isset($_SESSION['user'])) {
	$user = $_SESSION['user'];
}

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!--Title + Description in case webpage is not showing -->
		<title>About BlueQueue</title>
		<meta name="description" content="Reserve KFC times and more with BlueQueue!">
		<meta name="author" content="Eli Blaney & Gisselle Estevez">
		<!--Bootstrap Link-->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
		<!--Link to stylesheet -->
		<link rel="stylesheet" href="assets/css/about.css?v=1.0.1">

	</head>
	<body>
		<!-- Top of the Page -->
		<div class="container-fluid p-0">
			<div class="cu-heading cu-border-top">
				<img id="logo" src="assets/img/logo.png" alt="Creighton Logo">
				<div class="nav-buttons">
					<a href="index.php" class="btn btn-primary">Home</a>
<?php
//Show logout if the user has already log in
if($user) {
?>
					<a href="login.php?logout=true" class="btn btn-primary" data-tln="logout">Log out</a>
<?php
// Show log in if the user has not log in yet
} else {
?>
					<a href="reserve.php" class="btn btn-primary" data-tln="login">Log in</a>
<?php
}
?>
				</div>
			</div>
<!--Main Content in the page -->
			<div class="main-content mb-5">
				<div class="fullwidth-container mb-5">
					<div class="running"></div>
				</div>
				<div class="intro row">
					<!--Title  -->
					<h1 class="centered">About Us</h1>
				</div>
				<!--Content -->
				<div class="row">
					<p>
						We strive to develop students, build community, encourage holistic wellness and provide quality facilities. Our programs promote leadership, community and wellness education. We offer sports, fitness opportunites, and wellness programming to provide healthy engagement for students and staff.
					</p>
					<p>
						Questions can be directed to <a href="mailto:recreation@creighton.edu">recreation@creighton.edu</a> or 402.280.2848
					<p>
				</div>
				<!--Button to make reservations -->
				<div class="m-3 centered">
					<a href="reserve.php" class="btn btn-primary">Make Reservation</a>
				</div>
			</div>

<!--Bottom of the page -->
			<div class="cu-heading cu-border-bottom">
				<img class="logo" src="assets/img/logo.png" alt="Creighton Logo">
				<div class="links ml-5">
					<!--Links to navigate through the pages -->
					<a href="index.php">Home</a>
					<a href="about.php">About</a>
					<a href="reserve.php">Reserve</a>

<?php // If the user is an Admin show the admin link at the bottom of the page
	if($user && $user['admin']) {
?>
<a href="admin.php">Administration</a>
<?php
}
?>
				</div>
			</div>
		</div>

<!--Bootstrap Links-->
		<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
	</body>
</html>
