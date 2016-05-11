<?php require 'functions.php';

session_start();

if ( !is_logged_in() ) {
  header('location: login.php');
  die();
} ?>

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
  <h2>Instructions</h2>
  <p>Read the instructions <em><strong>carefully</strong></em> before starting the test</p>
  <div class="panel panel-default">
    <div class="panel-heading"><strong>Instruction List</strong></div>
    <div class="panel-body">
    <ol>
	
	<li>The test consists of two sections namely: <strong>Multiple choice and True or False.</strong></li>

    <li>
    The test must be completed within 15 minutes.
    </li>
	
  	<li>
  	Click on <em><strong>Start test </strong></em>to take the test.
  	</li>
  	
  	<li>
  	Click the <em><strong>Submit</strong></em> button to submit your test when done.	
  	</li>
	   
  	<p>After carefully reading the instructions click on the button below to <strong>start</strong> the test.<br>Each question is worth <strong>One(1)</strong> mark</p>
  	<a class="btn btn-info" href="main.php" >Start test</a>
	
    </ol>

    </div>
</div>

<?php include 'inc/footer.php'; ?>