<?php 

require 'functions.php';
include 'nav.php';

session_start();

if ( !is_logged_in() ) {
  header('location: login.php');
  die();
}
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>UCL-MS</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet"href="style/bootstrap.min.css">
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
</head>
<header>
	<h1 style="color: inherit; font-weight: normal; text-align: center;">
    <img src="img/unam-logo.jpg" alt="Unam Logo" style="width: 175px; height: 80px; align="middle"; "><br>
    Unam Computer Literacy - Marking System
    </h1>
</header>
<body>

<div class="container">
  <h2>Staff Options</h2>
  <p>Select one of the links below...</p>
  <div class="list-group">
    <a href="insert.php" class="list-group-item">Insert Questions</a>
    <a href="../results.php" class="list-group-item">View Results</a>
    <a href="change.php" class="list-group-item">Change User Password</a>
    <a href="manage.php" class="list-group-item">Manage Test</a>
  </div>
    <a href="logout.php" class="btn btn-primary">Logout</a>
</div>

<?php include 'inc/footer.php'; ?>