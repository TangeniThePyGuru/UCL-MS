<?php

$servername = "localhost";
$username = "root";
$password = "";
$db = "ucl_db";

// Create connection
global $conn; 
$conn = mysqli_connect($servername, $username, $password,$db);
//session_start();
if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());			
}
function is_logged_in() {
	return isset($_SESSION['username']);
	
}

/*
checks if the credentials for login entered by student exists
*/
function validate_user_creds($username, $password) {
	global $conn;
	$sql = "select * from student where s_number='".$username."' and password='".$password."'";
	$result = mysqli_query($conn,$sql);

	if(mysqli_num_rows($result) > 0){
		$flag = 1;
	}else{
		$flag = 0;
	}

	return $flag;


}
/*
checks if the credentials entered by the lecturer for login axists
*/
function validate_lecturer($username, $password) {
	global $conn;
	$sql = "select * from lecturer where name='".$username."' and password='".$password."'";
	$result = mysqli_query($conn,$sql);

	if(mysqli_num_rows($result) > 0){
		$flag = 1;
	}else{
		$flag = 0;
	}

	return $flag;

}
/*
insert question alongside its test_id, section it belongs to and the correct answer 
into the question table
*/
function insert_question($testid ,$question, $section_id, $correct_opt){
	global $conn;
	$grade = 1;
	$sql = "insert into question (test_id, question , section_id, correct_opt, grade) values ('$testid','$question', '$section_id' , '$correct_opt', '$grade')";
	$result = mysqli_query($conn,$sql);
	return mysqli_insert_id($conn);
}
/*
inserts answers for a question 
*/
function insert_answer($questionID,$opt,$val){
	global $conn;
	$sql = "insert into answer ( question_id, answer, correct) values ('$questionID','$opt','$val')";
	$result = mysqli_query($conn, $sql);
}
/*
add new test to be taken
*/
function insert_test($testname){ 
   	global $conn;
    $sql = "insert into test ( test_name) values ('".$testname."')";
	$result = mysqli_query($conn,$sql);
	return mysqli_insert_id($conn);

}
/*
changes currently active test to be taken by every student
*/
function update_active($test_id){
	
    global $conn;
    $sql = "update test set active = 1 where test_id = '$test_id'";
    mysqli_query($conn,$sql);	
	$sql = "update test set active = 0 where test_id != '$test_id'";
	mysqli_query($conn,$sql);
	
}
/*
allows a staff to change their password
*/
function replace_password($userName, $oldPass, $newPass){
	global $conn;

	$sql = "update lecturer set password='$newPass' where password='$oldPass' and name = '$userName'";
	$result = mysqli_query($conn, $sql); 
}
/*
gets all the sections for a test
*/
function get_section(){
	global $conn;

	$sql = "select section_id, name from section";
	$result = mysqli_query($conn, $sql);
	$sections = array();
	$i = 0;
	while($row = $result -> fetch_assoc()){
		$sections[$i]["id"] = $row['section_id'];
		$sections[$i]["section_name"] = $row['name'];
		$i++;
	}
	return $sections;
}
/*
gets all the uestions that belong to a get_question_by_section
*/
function get_question_by_section($section_id, $test_id){
	global $conn;

	$sql = "select * from question where test_id=$test_id AND section_id = '$section_id'";
	
	$result = mysqli_query($conn, $sql);
	$questions = array();
	$i = 0;
	while($row = $result -> fetch_assoc()){
		$questions[$i]["id"] = $row['id'];
		$questions[$i]["test_id"] = $row['test_id'];
		$questions[$i]["question"] = $row['question'];
		$questions[$i]["section_id"] = $row['section_id'];
		$i++;
	}
	return $questions;
}
/*
gets all the possible answers and correct answer related to a get_question_by_section
*/
function get_answers_by_id($questionID){
	global $conn;

	$sql = "select id,answer from answer where question_id = '$questionID'";
	$result = mysqli_query($conn, $sql);
	$answers = array();
	$i = 0;
	while($row = $result -> fetch_assoc()){
		$answers[$i]["id"] = $row['id'];
		$answers[$i]["answer"] = $row['answer'];
		$i++;
	}
	return $answers;
}
/*
get all the questions for a particular test
*/
function get_questions_test($test_id){
	global $conn;

	$sql = "select question.id as question_id,answer.id as answer_id from question inner join answer on (question.id = answer.question_id) where question.test_id=$test_id and answer.correct = 'Y'";
	
	$result = mysqli_query($conn, $sql);
	$questions = array();
	$i = 0;
	while($row = $result -> fetch_assoc()){
		$questions[$i]["question_id"] = $row['question_id'];
		$questions[$i]["answer_id"] = $row['answer_id'];
		$i++;
	}
	return $questions;
}
/*
check how many times a student has taken specific test
*/
function has_taken_test($s_number,$test_id)
{	global $conn;
	$sql = "select id from marks where srnumber=$s_number and test_id=$test_id";
	$result = mysqli_query($conn, $sql);
	$questions = array();
	$i=0;
	while($row = $result -> fetch_assoc()){
		$questions[$i]["id"] = $row['id'];
		$i++;
	}
	return $questions;
	
}

function save_responses($arr, $test_id)
{
	session_start();
	global $conn;
	// status variable checks if the function has completed all operations or not
	// by bieng returned after the completion of the function
	$status = 0;
	$s_number = $_SESSION['username'];
	
	$timesTestTaken = count(has_taken_test($s_number,$test_id));
	if($timesTestTaken <= 1){
	$questions = get_questions_test($test_id);
	/*
	this variable keeps track of the number of correct answers
	*/
	$correct = 0;
	foreach($arr as $key => $value){
		$qid = $key;
		$aid = $value[0];
		$sql = "insert into responses (question_id, s_number, answer_id) values ($qid,$s_number,$aid)";
		$result = mysqli_query($conn, $sql);
		$aa = 0;
		for($aa=0; $aa < count($questions); $aa++) {
			if($qid == $questions[$aa]['question_id'] && $aid == $questions[$aa]['answer_id']){
				$correct++;
			}	
		}
	}
	// holds the number of incorrect answers
	$incorrect = count($questions) - $correct;
	// holds the percentage or grade for a specific test
	$grade = round(($correct/count($questions))*100);
	// inserts into the results table
	$sql = "insert into marks (srnumber,incorrect,correct,grade,test_id) values ($s_number,$incorrect,$correct,$grade,$test_id)";
	$result = mysqli_query($conn, $sql);
	$status = 1;
	}else{
		$status = 0;
	}

	return $status;
}

