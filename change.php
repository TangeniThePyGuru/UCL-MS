
<!DOCTYPE html>
<html lang="en">
<?php

session_start();

 require 'functions.php';
 include 'nav.php';
  
 if(isset($_POST['cpassword']) && isset($_POST['npassword']) && isset($_POST['conpassword'])){
      $current = $_POST['cpassword'];
      $new = $_POST['npassword'];
      $confirm = $_POST['conpassword'];
      $username = $_SESSION['username'];
      $original_pass = $_SESSION['password'];
      if( $current == $original_pass){
        if ($new == $confirm){
          replace_password($username, $current, $new);
          // replace the original password with the new password
          $replaced = " Password successfully changed! " ;
        }else{
          // passwords do not match
          $doesNotMatch = " passwords do not match! ";
        }
      }else{
        $invalid = " Invalid current password! ";      
      }
 }
 ?>

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
  <h2>Change password</h2>
  <p>Follow the instructions below...</p>
  <div class="panel panel-default">
    <div class="panel-heading"><strong>Reset Password</strong></div>
    <div class="panel-body">
        
    <form action="change.php"; method="POST" style="align: center;">
    <label for="cpassword">Current Passsword:</label> <br>
    <input placeholder="Enter current password" class="form-control" type="password" name="cpassword" id="cpassword"  required> <label id="notify" style="color: red"> <?php 
        if(isset($invalid)){ 
          echo $invalid ;
        } 
        elseif(isset($replaced)){ 
          echo $replaced; 
        }
        elseif (isset($doesNotMatch)){
             echo $doesNotMatch;
        }
        ?> </label> <br>

    <label for="npassword">New Password:</label> <br>
    <input placeholder="Enter new password" class="form-control" type="password" name="npassword" required id="npassword" ><br>
    <label for="conpassword">Confirm Password:</label><br>
    <input placeholder="Confirm new password" class="form-control" type="password" name="conpassword" id="conpassword" required ><br><br>
    
    <input class="btn btn-danger btn-sm" type="submit" value="Save"><br>
    </form>
    </div>
</div>
    
<?php include 'inc/footer.php'; ?>