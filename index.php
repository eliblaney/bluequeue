<?php
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

		<title>BlueQueue</title>
		<meta name="description" content="Reserve KFC times and more with BlueQueue!">
		<meta name="author" content="Eli Blaney & Gisselle Estevez">

		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
		<link rel="stylesheet" href="assets/css/index.css?v=1.0.1">
	</head>
	<body>
		<div class="container-fluid p-0">
			<div class="cu-heading cu-border-top">
				<img class="logo" src="assets/img/logo.png" alt="Creighton Logo">
				<div class="nav-buttons">
					<a href="#" onclick="window.translate()" class="btn btn-primary" data-tln="translate">Español</a>
<?php
if($user) {
?>
					<a href="login.php?logout=true" class="btn btn-primary" data-tln="logout">Log out</a>
<?php
} else {
?>
					<a href="reserve.php" class="btn btn-primary" data-tln="login">Log in</a>
<?php
}
?>
				</div>
			</div>

			<div class="intro row">
				<h1 data-tln="title">BlueQueue</h1>
				<p data-tln="subtitle">Play, work, achieve.</p>
				<a href="reserve.php" class="btn btn-primary" data-tln="reservenow">Reserve Now</a>
			</div>

			<div class="main-content">

				<div class="row">
					<div class="col-md card card-light spaced">
						<h3 class="timer mb-0" data-to="6200" data-speed="1500"></h3>
						<p class="muted centered" data-tln="sqft">sq ft</p>
						<p class="centered" data-tln="weightcardio">Weight/cardio room</p>
					</div>
					<div class="col-md card card-light spaced">
						<h3 class="timer mb-0" data-to="3300" data-speed="1500"></h3>
						<p class="muted centered" data-tln="sqft">sq ft</p>
						<p class="centered" data-tln="multipurpose">Multi-purpose room</p>
					</div>
					<div class="col-md card card-light spaced">
						<h3 class="timer mb-0" data-to="6.5" data-speed="1500"></h3>
						<p class="muted centered" data-tln="lapsmi">laps/mi</p>
						<p class="centered" data-tln="desc11">Three-lane running track</p>
					</div>
				</div>

				<div class="row">
					<div class="col-md-6">
						<div class="card">
							<h3 data-tln="card1title">Do More.</h3>
							<p data-tln="card1text">
								Reserve a time slot, and keep people safe.
							</p>
							<a href="reserve.php" class="btn btn-primary" data-tln="card1button">Make Reservation</a>
						</div>
					</div>
					<div class="col-md-6">
						<div class="card">
							<h3 data-tln="card2title">Learn More.</h3>
							<p data-tln="card2text">
								Find out more about the KFC and what you can do to help.
							</p>
							<a href="about.php" class="btn btn-primary" data-tln="card2button">Read More</a>
						</div>
					</div>
				</div>

				<div class="fullwidth-container">
					<div class="trainer">
						<div class="main-content row">
							<div class="col-lg-6">
								<div class="row">
									<div class="card card-transparent col-12">
										<h1 data-tln="content1title">Kiewit Fitness Center</h1>
										<p data-tln="content1subtitle">
											Do more at Creighton.
										</p>
										<p data-tln="desc1">
											At the Kiewit Fitness Center, enjoy elite features like:
										</p>
										<ul>
											<li data-tln="desc2">Weight/cardio room</li>
											<li data-tln="desc3">Multi-purpose room</li>
											<li data-tln="desc4">Locker rooms with saunas</li>
											<li data-tln="desc5">Racquetball courts</li>
											<li data-tln="desc6">Squash courts</li>
											<li data-tln="desc7">Basketball courts</li>
											<li data-tln="desc8">Volleyball courts</li>
											<li data-tln="desc9">Tennis courts</li>
											<li data-tln="desc10">Badminton courts</li>
											<li data-tln="desc11">Three-lane running track</li>
										</ul>
									</div>
								</div>
								<div class="row">
									<div class="card card-transparent col-12">
										<h2 data-tln="content2title">Need help?</h2>
										<p data-tln="content2subtitle">
											Reach out to us by emailing recreation@creighton.edu or by calling (402)&nbsp;280-2114.
										</p>
									</div>
								</div>
							</div>
							<div class="col-lg-5 offset-md-1">
								<a class="twitter-timeline" data-height="800" data-dnt="true" href="https://twitter.com/CreightonRec?ref_src=twsrc%5Etfw">View @CreightonRec on Twitter!</a>
							</div>
						</div>
					</div>
				</div>

			</div>
			
			<div class="cu-heading cu-border-bottom">
				<img class="logo" src="assets/img/logo.png" alt="Creighton Logo">
				<div class="links ml-5">
					<a href="index.php" data-tln="home">Home</a>
					<a href="about.php" data-tln="about">About</a>
					<a href="reserve.php" data-tln="reserve">Reserve</a>
					<a href="login.php?redirect=" data-tln="admin">Administration</a>
				</div>
			</div>
		</div>

		<!-- Twitter widgets -->
		<script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
		<!-- Bootstrap JS -->
		<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
		<!-- Number counter animations -->
		<script src="assets/js/counter.js" charset="utf-8"></script>
		<!-- Translate the page -->
		<script src="assets/js/translate.js" charset="utf-8"></script>
	</body>
</html>
