 <?php
session_start();
error_reporting(1);
include 'nav.php';
require 'functions.php'; 

	if (isset($_POST['tests'])) {
		update_active($_POST['tests']);
	} 
?>

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
	<!--notifies the user when all fields are not filled-->
	<div id="notify">	</div>
  <h2>Manage Questions...</h2>
  <p>Please select the test to activate.</p>
  
   <form action="manage.php" method="post">

        <?php
	        global $conn;
	        
	        $sql ="SELECT *  FROM test";
	        $result2 = $conn -> query($sql);

	        ?>
		
         <p>Only select <em><strong>one</strong></em> test. </p>
         <?php  while($row2 = $result2 -> fetch_assoc()){?>
		 <label for="<? echo $row2['test_id']; ?>"><?php echo $row2['test_name'];  ?>:</label>
		 <input type="radio"  <?php if ($row2['active'] == 1 ) { echo "checked"; } ?>  name="tests" value="<?php  echo $row2['test_id']; ?>"  >
		 <br><br>
         
         <?php } ?>
		 <input class="btn btn-danger" type="submit" value="Save" >

	</form>	 
   </div>
  </div>
</div>
<?php include 'inc/footer.php'; ?>
