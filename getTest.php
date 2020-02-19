<html>
<head>
	<title>Examuncle.com</title>
</head>
<body>

	<?php
	echo 'Number of Tests :<br> ';
	
	include 'dbconnect.php';

	$query = $conn->prepare("SELECT test_id FROM questions GROUP BY test_id ");
	$query->execute();

	$query->bind_result($test_id);
	//include'navbar.php';
	
	while($query->fetch())
	{
		printf("%s",$test_id);
		echo '<br>';
	}

	$query->close();


	?>


<!--
	<form action="insertValidate.php" method="POST">
    test_id <input type="text" name="test_id" ><br>
	Q.no:<input type="text" name="question_no" ><br>		
	
	Questions : <textarea name="question"> </textarea><br>
  	A.<input type="text" name="op1" > <br>
 	B.<input type="text" name="op2" ><br>
  	C.<input type="text" name="op3" > <br>  
  	D.<input type="text" name="op4" > <br>

  	Answer :  - <input type="text" name="ans" > <br>


  	<button type="submit">Submit</button><button type="reset">Clear</button>

	</form>
-->

</body>
</html>