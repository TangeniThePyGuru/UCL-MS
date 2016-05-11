<?php  
require 'functions.php';
include 'inc/header.php';

$posted = $_POST;
$test_id = $_POST["test_id"];

//var_dump($test_id);

$r = save_responses($posted, $test_id);
//var_dump($r);
//die();

if($r==0){
	header("Location: testtaken.php");	
}else{
	header("Location: confirmation.php");
}


include 'inc/footer.php';

?>
