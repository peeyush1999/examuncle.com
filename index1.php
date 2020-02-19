<html>
<head>
	<title> My quiz 1</title>
</head>
<body>

<!--	<form action="" method="GET">

	Who is the pm of india ?<br>

  	<input type="radio" name="option" value="A"> Modi<br>
 	<input type="radio" name="option" value="B"> rahul<br>
  	<input type="radio" name="option" value="C"> mamta<br>  
  	<input type="radio" name="option" value="D"> akhilesh<br>


  	<button type="submit">Submit</button><button type="reset">Clear</button>

	</form>
-->

			
<?php
session_start();

$response = array(0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0);

$_SESSION['test']='cs'; 
$_SESSION['qno'] = 1 ;
$_SESSION['testlen'] = 0 ;
$_SESSION['response'] = $response;


//include'takeTest.php';
?>


<a href="takeTest.php" >Click here to take test!!!</a>



</body>
</html>