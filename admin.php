<?php 

require 'functions.php'; 

session_start(); 

if (isset($_SESSION['username'])) {
	$message = 'User is already logged in';
}
// $sql = "select * from users";
// $result = $conn->query($sql);

if( $_SERVER['REQUEST_METHOD'] == 'POST') {
	// get their values.
	$username = $_POST['username']; 
	$password = $_POST['password']; 

	
	if (validate_lecturer($username, $password)) {
		
	$_SESSION['username'] = $username; 
  $_SESSION['password'] = $password;
	header("Location: staff.php"); 

	} else { $status = "Incorrect login credentials."; }

}

?>

<?php include 'inc/header.php'; ?>

<div class="container">
  <div class="panel panel-default">
    <div class="panel-heading">Staff login</div>
      <div class="panel-body">
      <form role="form" action="admin.php" method="post">
          <div class="form-group">
              <label for="username" >Staff Name</label>
              <input type="text" id="username" name="username" class="form-control" placeholder="Enter staff name">
          </div>
          <div class="form-group">
              <label for="password">Password</label>
              <input type="password" id="passwords" class="form-control" name="password" placeholder="Enter password">
          </div>
          <button type="submit" class="btn btn-default">Submit</button><br>
          <?php if ( isset($status) ) : ?>
            <p><?php echo $status; ?></p>
          <?php endif; ?>
       </form>
      </div>
    </div>
</div>

<?php include 'inc/footer.php'; ?> 