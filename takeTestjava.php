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
	

	$query->close();



	$query = $conn->prepare("SELECT qno,question,op1,op2,op3,op4 FROM questions WHERE test_id = 'cs' ; ");

	$query->execute();

	$query->bind_result($qno,$question,$op1,$op2,$op3,$op4);
	
	
	$query->fetch();

	//echo $question;

	$query->close();

	
?>


<div class="screen">

<div class="question">
<h1>
	<script type="text/javascript">
		var question = <?php echo $question ; ?>;
        document.getElementById("text").innerHTML = question;
      </script>
      <span id="text"></span>
</h1>
</div>

</div>

<script>




</script>

</body>
</html>