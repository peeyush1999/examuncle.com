<?php

session_start();
ob_start();

include'dbconnect.php';

$id = $_POST['testid'];


$query ="SELECT  test_id from questions WHERE test_id='$id' ";
		if (!($stmt = $conn->prepare($query))) 
		{
			/*echo "Prepare failed: (" . $conn->errno . ") " . $conn->error;*/
		}
		
		if (!$stmt->execute()) 
		{
			//echo "Execute failed: (" . $query->errno . ") " . $query->error;
		}
		else
		{	$stmt->store_result();
			if($stmt->num_rows>0) 
			{
				//echo "Welcome ! ".$uname;
				$_SESSION['show'] = 1;
			
				
				header('Location:checkTestid.php');
			
			}
			else
			{
					$_SESSION['test'] = $id;
					$_SESSION['qno'] = 1;
					header('Location:insertQuestion.php');			
			}
			
		}







?>