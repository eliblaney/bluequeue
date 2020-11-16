<?php
//Check to see if user it's logged in. If not pop a link to do so
  session_start();
  define('BLUEQUEUE');

  if(!isset($_SESSION['user'])) {
  	header('Location: login.php?redirect=reserve.php');
  	die('Please <a href="login.php?redirect=reserve.php">click here</a> to log in.');
  }

  $user = $_SESSION['user'];
  //Assign the session user_id the user's customer_id
  $user_id = $user['customer_id'];

  if(isset($_GET['date'])){
      $date = $_GET['date'];
  }

  if(isset($_POST['submit'])){
      // Assign all the values needed to insert a new instance to the database
      $start = $_POST['start-time'];
      $end = $_POST['end-time'];
      $facility = $_POST['facility'];
      $court = $_POST['court'] || 'NULL';
      $classes = $_POST['classes'] || 'NULL';
      //Update with Database Connection
      $mysqli = new mysqli('127.0.0.1', 'u301528007_bluequeue', 'BlueQueue551', 'u301528007_bluequeue');
      // INSERT statement
      $stmt = $mysqli->prepare("INSERT INTO appointment (appointment_date, appointment_start_time, appointment_end_time, customer_id, facility_id, class_id, court_id) VALUES (?,?,?,?,?,?,?)");
      $stmt->bind_param('sssiiii', $date, $start, $end, $user_id,$facility,$classes,$court);
      $stmt->execute();
      $msg = "<div class='alert alert-success'>Reservation Successful!</div>";
      // Close Statement and DB connection after done executing
      $stmt->close();
      $mysqli->close();
  }

 ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Title + Description of the page -->
    <title>Reserve Appointment</title>
    <meta name="description" content="Reserve KFC times and more with BlueQueue!">
    <meta name="author" content="Eli Blaney & Gisselle Estevez">

    <!--Bootstrap Links-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <!--CSS stylesheet link to reserve.css-->
    <link rel="stylesheet" href="assets/css/reserve.css?v=1.0.1">
  </head>

  <body>
    <!-- Top of the Page -->
    <div class="container-fluid p-0">
      <div class="cu-heading cu-border-top">
				<img id="logo" src="assets/img/logo.png" alt="Creighton Logo">
				<div class="nav-buttons">
					<a href="index.php" class="btn btn-primary">Home</a>
            <?php //Show logout if the user has already logged in
            if($user) {
            ?>
            					<a href="login.php?logout=true" class="btn btn-primary" data-tln="logout">Log out</a>
            <?php // Show log in if the user has not log in yet
            } else {
            ?>
            					<a href="reserve.php" class="btn btn-primary" data-tln="login">Log in</a>
            <?php
            }
            ?>
				</div>
			</div>
      <!-- User Form to make a reservation -->
        <h1 class="text-center" >Reservation for Date: <?php echo date('F d/Y', strtotime($date)); ?></h1><hr>
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
               <?php echo isset($msg)?$msg:''; ?>
                <form action="" method="post" autocomplete="off">
                    <div class="form-group">
                        <label for="">Start Time</label>
                        <input type="time" class="form-control" name="start-time">
                    </div>
                    <div class="form-group">
                        <label for="">End Time</label>
                        <input type="time" class="form-control" name="end-time">
                    </div>
                    <div class="form-group">
                        <label for="">Facility (1- Weights | 2- Cardio)</label>
                        <input type="number" class="form-control" name="facility" min="1" max="2">
                    </div>
                    <div class="form-group">
                        <label for="">Classes (1- Cycling | 2- Boxing)</label>
                        <input type="number" class="form-control" name="classes" min="1" max="2">
                    </div>
                    <div class="form-group">
                        <label for="">Courts (1- Basketball | 2- Volleyball)</label>
                        <input type="number" class="form-control" name="court" min="1" max="2">
                    </div>
                    <!-- button to submit the form -->
                    <button class="btn btn-primary" type="submit" name="submit">Submit</button>
                    <!-- button to navigate back -->
                    <a href="reserve.php" class="btn" role="button">Back</a>
                </form>
            </div>
        </div>
    </div>
    <!-- Bottom of the Page -->
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
<!--Bootstrap Links-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  </body>

</html>
