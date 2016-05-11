<?php  

require 'functions.php'; 

/* begin session */
session_start(); 

/*Check if already logged in*/

if (isset($_POST['username']) && is_numeric($_POST['username'])) {
  if( $_SERVER['REQUEST_METHOD'] == 'POST') {
    // get their values.
    $username = $_POST['username']; 
    $password = $_POST['password']; 

    
    if (validate_user_creds($username, $password)) {
      
      $_SESSION['username'] = $username; 
      $_SESSION['password'] = $password;  
      header("Location: instructions.php"); 

    } else {
  	 	$status = "Incorrect login credentials."; 
	  }
  }	
}else if(isset($_POST['username']) && is_string($_POST['username'])) {
  
  if( $_SERVER['REQUEST_METHOD'] == 'POST') {
    // get their values.
    $username = $_POST['username']; 
    $password = $_POST['password']; 

    
    if (validate_lecturer($username, $password)) {
      $_SESSION['username'] = $username; 
      $_SESSION['password'] = $password;
      header("Location: staff.php"); 

	  }else {
      $status = "Incorrect login credentials."; 
    }
  
  }
}


?>

<?php include 'inc/header.php'; ?>

<div class="container">
    <div class="panel panel-default ">
      <div class="panel-heading">Login</div>
        <div class="panel-body">
          <form role="form" action="login.php" method="post">
            <div class="form-group">
              <label for="username">Student Number/Username </label>
              <input type="text" name="username" class="form-control" id="username" placeholder="Enter student number">
            </div>
            <div class="form-group">
              <label for="password">Password </label>
              <input type="password" class="form-control" name="password" id="password" placeholder="Enter password">
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Login</button><br>
            <?php if ( isset($status) ) : ?>
                <p><?php echo $status; ?></p>
            <?php endif; ?>
            
          </form>
        </div>
</div>

<?php  include 'inc/footer.php'; ?>
