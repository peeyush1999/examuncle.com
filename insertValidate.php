<?php
session_start();

include 'dbconnect.php';

$test_id = $_SESSION['test'];
$qno = $_SESSION['qno'];
$que = $_POST['question'];
$op1 = $_POST['op1'];
$op2 = $_POST['op2'];
$op3 = $_POST['op3'];
$op4 = $_POST['op4'];
$ans = $_POST['option'];

 if( isset($que) && isset($op1) && isset($op2) && isset($op3) && isset($op4) && isset($ans) )
 {
 		echo "All fine no need to worry";

 		$query = $conn->prepare("INSERT INTO questions (test_id,qno,question,op1,op2,op3,op4,ans) VALUES (?,?,?,?,?,?,?,?)");
	$query->bind_param("sisssssi", $test_id, $qno, $que, $op1, $op2, $op3, $op4, $ans);
	//include'navbar.php';
	if (!$query->execute()) 
	{
		echo "<br><br><center><h2 style='font-weight:bold;color:white'>";
		echo "Execute failed: (" . $query->errno . ") " . $query->error;
		echo "</h2></center>";
	}

	$_SESSION['qno'] = $_SESSION['qno'] + 1;
	
	
	header('Location:insertQuestion.php');

 }
 else
 {
 	 header('Location:insertQuestion.php');	
 }
/*$query = "INSERT INTO questions (test_id,qno,question,op1,op2,op3,op4,ans) VALUES (?,?,?,?,?,?,?,?);";


$stmt = $conn->prepare($query);
$stmt->bind_param("sisssssi", $test_id, $qno, $que, $op1, $op2, $op3, $op4, $ans);

*/


//header('Location:insertQuestion.php');


?>