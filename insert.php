<?php
session_start();
error_reporting(0);
require 'functions.php'; 
include 'nav.php';
// $form = $_POST['form'];
if (isset($_POST['lquestion']) && isset($_POST['optA']) && isset($_POST['optB']) && isset($_POST['optC']) && isset($_POST['optD'])){
    $test_id = $_POST['test_name'];

	$question = $_POST['lquestion'];
	$optA = $_POST['optA'];
	$valA = $_POST['A'];
	$optB = $_POST['optB'];
	$valB = $_POST['B'];
	$optC = $_POST['optC'];
	$valC = $_POST['C'];
	$optD = $_POST['optD'];
	$valD = $_POST['D'];
	$section_id = 1;
	
	$lecturerid = $_SESSION['lecturerid'];
	 
	/*
	insert multiple choice questions alongside possible answers and the
	correct answer
	*/
	while (true) {
	    if (isset($_POST['A'])){
	   		$questionID = $insert_question = insert_question($test_id,$question,$section_id, "A");
	   		insert_answer($questionID,$optA,"Y");
			insert_answer($questionID,$optB,"N");
			insert_answer($questionID,$optC,"N");
			insert_answer($questionID,$optD,"N");
        }

		elseif ( isset($_POST['B'])){
		    $questionID = $insert_question = insert_question($test_id,$question,$section_id, "B");
		    insert_answer($questionID,$optA,"N");
			insert_answer($questionID,$optB,"Y");
			insert_answer($questionID,$optC,"N");
			insert_answer($questionID,$optD,"N");
        }
	   elseif (isset($_POST['C'])){ 
		    $questionID = $insert_question = insert_question($test_id,$question,$section_id, "C");
		    insert_answer($questionID,$optA,"N");
			insert_answer($questionID,$optB,"N");
			insert_answer($questionID,$optC,"Y");
			insert_answer($questionID,$optD,"N");
        }
	   elseif (isset($_POST['D'])){
		    $questionID = $insert_question = insert_question($test_id,$question,$section_id, "D");
			insert_answer($questionID,$optA,"N");
			insert_answer($questionID,$optB,"N");
			insert_answer($questionID,$optC,"N");
			insert_answer($questionID,$optD,"Y");
		}
	   break;
	}
}
else {
	//
}

// insert the true and false questions, alongside it's answers
if (isset($_POST['question'])){
	$test_id = $_POST['test_name'];
	$question = $_POST['question'];
	$optA = "True";
	$optB = "False";
	$section_id = 2;
	


	$lecturerid = $_SESSION['lecturerid'];
	
	while (true) {
	    if (isset($_POST['optionA'])){
	   		$questionID = $insert_question = insert_question($test_id,$question,$section_id, "A");
	   		insert_answer($questionID,$optA,"Y");
			insert_answer($questionID,$optB,"N");
        }

		elseif ( isset($_POST['optionB'])){
		    $questionID = $insert_question = insert_question($test_id,$question,$section_id, "B");
		    insert_answer($questionID,$optA,"N");
			insert_answer($questionID,$optB,"Y");
        }
	   break;
	}
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
  <script lang="javascript">
   function selectOnlyThis(id) {
    for (var i = 1;i <= 6; i++)
    {
        document.getElementById("Check" + i).checked = false;
    }
    document.getElementById(id).checked = true;
   }      

  </script>
  <style>
  textarea { resize: vertical; }
  </style>

</head>
<header>
	<h1 style="color: inherit; font-weight: normal; text-align: center;">
    <img src="img/unam-logo.jpg" alt="Unam Logo" style="width: 175px; height: 80px; align="middle"; "><br>
    	Administrator Page
    </h1>
</header>
<body>


<div class="container">
  <h2>Insert Questions...</h2>
  <p>Please insert questions in there respective sections.</p>
  <div class="panel panel-default">
    <div class="panel-heading"><strong>Place Questions</strong></div>
    <div class="panel-body">
    <?php 
    $servername = "localhost";
	$username = "root";
	$password = "";
	$db = "ucl_db";

	// Create connection
	$conn = mysqli_connect($servername, $username, $password,$db);
    $sql = "select * from test";
    $result = mysqli_query($conn,$sql);
    

     ?>
    <form action="insert.php";  method="post">
    	 
		 <h3>Multiple Choice</h3>
		 <label for="test_name">Select Test:</label> 
		  <select name="test_name">
		  <?php while ($row = $result -> fetch_assoc()) {?>   
		  	<option value="<?php echo $row['test_id']; ?>"><?php echo $row['test_name']; ?></option>
		   <?php } ?> 
		  </select><br> 
		 <textarea name="lquestion" cols="177" rows="5" placeholder="Enter question here..." required="" class="form-control" ></textarea>
		 <br><br>
		 <p>Only tick(&#10004;) the <em><strong>correct</strong></em> option. </p>
		 <label for="optA"> Option A:</label>
		 <input type="text" name="optA" class="form-control" required="" > 
		 <input type="checkbox" id="Check1" value="Value1" onclick="selectOnlyThis(this.id)" name="A">
		 <br><br>

		 <label for="optB">Option B:</label> 
		 <input type="text" name="optB" class="form-control" required="">
		 <input type="checkbox" id="Check2" value="Value1" onclick="selectOnlyThis(this.id)" name="B">
		 <br><br>

		 <label for="optC">Option C:</label> 
		 <input type="text" name="optC" class="form-control" required=""> 
		  <input type="checkbox" id="Check3" value="Value1" onclick="selectOnlyThis(this.id)" name="C">
		 <br><br>

		 <label for="optD">Option D:</label> 
		 <input type="text" name="optD" class="form-control" required="">
		 <input type="checkbox" id="Check4" value="Value1" onclick="selectOnlyThis(this.id)" name="D">
		 <br><br>
		 <input hidden type="text" name="form" value="filled">
		 <input class="btn btn-danger" type="submit" value="Save" >
		  <br><br>
		  </form>

        <?php $sql = "select * from test";
	    $result = mysqli_query($conn,$sql);
	    ?>
		 <form  action="insert.php";  method="post">
		 <label for="test_name">Select Test:</label> 
		  <select name="test_name">
		  <?php while ($row = $result -> fetch_assoc()) {?>   
		  	<option value="<?php echo $row['test_id']; ?>"><?php echo $row['test_name']; ?></option>
		   <?php } ?> 
		  </select><br> 
		  <h3>True or False Questions</h3>
		  <textarea name="question"cols="177" rows="5" placeholder="Enter question here..." class="form-control" required=""></textarea>
		  <br><br>
		  <p>Only tick(&#10004;) the <em><strong>correct</strong></em> option. </p>
		 <label for="optA"> True:</label>
		 <input type="checkbox" id="Check5" value="Value1" onclick="selectOnlyThis(this.id)" name="optionA">

		 
		 <label for="optB">False:</label> 
		 <input type="checkbox" id="Check6" value="Value1" onclick="selectOnlyThis(this.id)" name="optionB" >
		 <br><br>
		 
		 <input hidden type="text" name="form" value="filled">
		 <input class="btn btn-danger" type="submit" value="Save" >
		 </form>
   
    </div>
  </div>

</div>
<?php include 'inc/footer.php'; ?>
