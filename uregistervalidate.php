<html>
<head>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="assets/css/loginform.css" >
  <link rel="stylesheet" href="assets/css/form-elements.css" >
  <link rel="stylesheet" href="assets/css/style.css" >
  <style>.modal-backdrop {
  z-index: 1027 !important; 
  bottom: 0;

      }
</style>
	</head>
<body>
<?php

	include 'dbconnect.php';
?>
<?php
	
	include 'header.php';
	
	if(isset($_POST['uname'])!=True)
		header('Location:home.php');		
	
	$uname=$_POST["uname"];
	$name=$_POST["name"];
	$password=$_POST["password"];
	$password=md5($password);
	$email=$_POST["email"];
	
	
		include'navbar.php';


	$query = $conn->prepare("INSERT INTO userdata (username,name,password,email) VALUES (?,?,?,?)");
	$query->bind_param("ssss",$uname,$name,$password,$email);
	
	if (!$query->execute()) 
	{
		echo "<div style='height : 350px ;'><br><br><center><h2 style='font-weight:bold;color:#2F5597;'>";
		echo "Execute failed: (" . $query->errno . ") " . $query->error;
		echo "</h2><a href='home.php'>Goto Home</a><br><br><Br></center></div>";
		
	}
	else
	{
		echo "<div style='height : 350px ;'><br><br><center><h2 style='font-weight:bold;color:#2F5597;'>";
		echo "Dear $name, You are successfully registered !";
		echo "</h2><a href='home.php'>Goto Home</a><br><br><Br></center></div>";
	}
	
	
	
include'footer.php';	
?>

</body>

</html>    