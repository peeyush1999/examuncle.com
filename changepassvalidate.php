<?php
session_start();
include 'dbconnect.php';




$username=$_POST['uname'];
$email=$_POST['email'];
$password=md5($_POST['password']);
$resultmatched=False;

		$checkquery="SELECT username FROM userdata WHERE username='$username' AND email='$email' ";		
		



$stmt=$conn->prepare($checkquery);
$stmt->execute();
$stmt->store_result();

if($stmt->num_rows > 0)
{
	$resultmatched=True;
	
	
			$updatequery="UPDATE userdata SET password='$password' WHERE username='$username'";		
	
	
	
	$stmt2=$conn->prepare($updatequery);
$stmt2->execute();

}





?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Examuncle.com</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
  <link rel="stylesheet" href="assets/css/aos.css" >
  
  
  <script src="assets/js/validate.js" type="text/javascript">
  user_reg_validate();
  employee_reg_validate();
  
  </script>
  <style>
    /* Add a gray background color and some padding to the footer */
    footer {
      background-color: #f2f2f2;
      padding: 25px;
    }

    .carousel-inner img {
      width: 100%; /* Set width to 100% */
      min-height: 200px;
    }

    /* Hide the carousel text when the screen is less than 600 pixels wide */
    @media (max-width: 600px) {
      .carousel-caption {
        display: none; 
      }
    }
  </style>
</head>
<body>
<!-- NAVIGATION BAR CONTENT-->
<?php
$_SESSION['user']="";
	$_SESSION['type']="";
	$_SESSION['login']=False;
	session_destroy();
	

?>
<?php include'header.php'?>
<?php include'navbar.php'?>
<div class='container'>
<?php

	if($resultmatched==True)
	{
		echo "<br><br><br><br><p style='font-size:2em ;color:black;'> You Have been Logged Out !!<br><br> For Security reasons, please close this window</p><br><br>";

		echo "<br><br>
		<p style='font-size:1.5em;color:black' align='center'>You have successfully updated your password<br>
		Now you can login with your new password<br><br><br>
		click <a href='home.php' >HERE</a> to goto Home Page.</p><br><br>
		";
	
	
	








	}
	else
	{
		echo "<br><br>
		<p style='font-size:1.5em;color:black' align='center'>The details you entered did not match with any record.<br>
		Please Try Again.<br><br><br>
		Click <a href='changepassword.php' >Here</a> to try Again. | Click <a href='home.php' >Here</a> to goto Home Page.</p><br><br>
		";



	}
	
?>
</div>


<?php include'footer.php'?>
<!-- Animation on scroll script--> 
<script src='assets\js\aos.js' type='text/javascript'></script>
<script>
		AOS.init({
  duration: 1200,
})

  </script>

  
</body>
</html>
