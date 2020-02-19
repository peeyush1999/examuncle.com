<?php
session_start();
ob_start(); 
?>
<html>
<head>
	<title> My quiz 1</title>
</head>
<body>
<?php 




$test = $_SESSION['test'];
$number = $_SESSION['qno'];
	echo 'Number of Questions :<br> ';
	
	include 'dbconnect.php';

	$query = $conn->prepare("SELECT COUNT(test_id) FROM questions WHERE test_id = '$test' ");
	$query->execute();

	$query->bind_result($no_que);
	//include'navbar.php';
	
	$query->fetch();
	
		printf("%s",$no_que);
		echo '<br>';
		
		$_SESSION['testlen']  = $no_que; 

	$query->close();

		echo "Session test len :  ";
		echo $_SESSION['testlen'];



	$query = $conn->prepare("SELECT qno,question,op1,op2,op3,op4 FROM questions WHERE test_id = 'cs' AND qno =$number ");

	$query->execute();

	$query->bind_result($qno,$question,$op1,$op2,$op3,$op4);
	//include'navbar.php';
	
	$query->fetch();
	
		printf(" Q. %d",$qno);
		echo '<br>';
		printf("%s",$question);
		echo '<br>';
		printf("A . %s      ",$op1);
		printf("B . %s      ",$op2);
		echo '<br>';
		printf("C . %s      ",$op3);
		printf("D . %s      ",$op4);

		
		echo "<form action='storeAnswer.php' method='POST'>

  	 <input type='radio' name='option' value=1 >A <br>
 	 <input type='radio' name='option' value=2>B <br>
  	 <input type='radio' name='option' value=3>C <br>  
  	 <input type='radio' name='option' value=4>D<br>


  	<button type='submit'>Submit</button><button type='reset'>Clear</button>

	</form>";


	$query->close();

	echo "<form action='updateQno.php' method='POST'>";

  	for($i=1 ; $i <= $no_que ; $i++)
  	{
  		echo "<button type='submit' name='queButton' value=$i >";
  		echo $i;
  		echo "</button></br>"; 
  	}

	echo "</form>";
	echo "<form action='submitTest.php' method='POST'>
		  <button type='submit'>Submit Test</button> 
		  </form>
		 ";


	echo "<br<BR> Session Qno :"; echo $number; echo "<br><br><BR><Br><br><br>";

	print_r(array_values($_SESSION['response']));   

?>
<a href='udashboard.php'>Click Here to go on DashBoard !!</a>

</body>
</html>