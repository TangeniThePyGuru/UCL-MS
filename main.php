<?php

require 'functions.php';

session_start();

if ( !is_logged_in() ) {
  header('location: login.php');
  die();
}


?>
<html  lang="en-us">
<head>
  <title>UCL-MS</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet"href="style/bootstrap.min.css">
  <script src="js/date_time.js"></script>
  <script type="text/javascript" src="js/jquery.min.js"></script>
  <script type="text/javascript" src="js/countdown.js"></script>
  <link rel="stylesheet" type="text/css" href="style/style.css">
  <style>
    nav a { text-decoration-style: none;}
    li { list-style: none; }
  </style>
</head>
<meta charset="UTF-8">

<body onload="winClose();">

 <nav >
   <div style=" width: 40% !important; margin: auto !important;" class="well">
   <ul class="nav nav-pills nav-stacked nav-justified"> 
     <li><a href="instructions.php"><strong>Home</strong></a></li>
      <li><a href="logout.php"><strong>Logout</strong></a></li>
   </ul>
   </div>
</nav>
<header>
    <h1 style="color: inherit; font-weight: normal;text-align: center; ">
      <img src="img/unam-logo.jpg" alt="Unam Logo" style="width: 175px; height: 80px; align="middle"; "><br>
       Unam Computer Literacy - Marking System
    </h1>
</header>

<form action="save.php" method="post"> 
<div class="container">
  <h2>Take Examination...</h2>
   <input type="text" id="timer">
 <script type="text/javascript">
  timer = new Countdown();
  timer.init();
</script>
  <p><strong>Note:</strong> The test will end once you press the submit button at the bottom or when the timer stops.
  <span id="date_time"></span>
  <script type="text/javascript">window.onload = date_time('date_time');</script>

  <!--<label type="text" id= "timer" >-->
    <script type="text/javascript">
    timer = new Countdown();
    timer.init();
    </script>
 
  </p>
<?php

  global $conn;
  
  $sql ="SELECT * FROM test WHERE active = 1";
  $result2 = $conn -> query($sql);
  $active_test = $result2 -> fetch_assoc();
         
?>



<?php 

$section =  get_section();
//echo "<PRE>";
// var_dump($section);
$questions = array();
function shuffle_assoc($list) { 
  if (!is_array($list)) return $list; 

  $keys = array_keys($list); 
  shuffle($keys); 
  $random = array(); 
  foreach ($keys as $key) 
    $random[$key] = $list[$key]; 

  return $random; 
} 

//die();
for ($i=0; $i < count($section); $i++) { 
 ?>

  <div class="panel-group" id="accordion">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $i+1;?>">Section <?php echo $i+1;?>: <strong><?php echo $section[$i]["section_name"];?></strong></a>
        </h4>
      </div>
      <div id="collapse<?php echo $i+1;?>" class="panel-collapse collapse in">
        <div class="panel-body">
          <?php
            echo "<ul>";
            //$questions = shuffle(get_question_by_section($section[$i]["id"], $active_test["test_id"]));
            $questions = get_question_by_section($section[$i]["id"], $active_test["test_id"]);
            shuffle($questions);
              for ($j=0; $j < count($questions); $j++) {
                $cnt = $j +1; 
                echo "<li>".$cnt.". ".$questions[$j]["question"]."</li>";
                $answers  = get_answers_by_id($questions[$j]["id"]);
                
                for ($k=0; $k < count($answers); $k++) { 
                  echo "<li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type='radio' name='".$questions[$j]["id"]."[]' value='".$answers[$k]["id"]."'> &nbsp;".$answers[$k]["answer"]."</li>";
                }
                $x = $questions[$j]["section_id"];
              }
           echo "</ul>";   
          ?>
       </div>
      </div>
    </div>
  </div>  
  <?php 
  }    
  ?> 
    <input class="btn btn-danger" type="submit" value="Submit Test"  >
    <input type="hidden" name="test_id" value="<?php echo $active_test['test_id']; ?>">

</form>

<?php include 'inc/footer.php';  ?>
