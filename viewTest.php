<?php session_start();
ob_start(); // to enable output buffering so that header error can be solved !!
$username=$_SESSION['user'];

if($_SESSION['login']!=True )
	header('Location:home.php');


$firstchar = $username[0];


?>



<!DOCTYPE html>
<html lang="en">
<head>
  <title>Examuncle.com</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="assets/css/aos.css" >
  
  
  
  

  <style>
    /* Add a gray background color and some padding to the footer */
    

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
	
	.dashboard{
		padding:5px 5px 5px 5px;
		font-size:1.5em
	}
	.dashboard1{
		padding:5px 5px 5px 5px;
		font-size:1.1em;
		color:white;
	}
	body{
		background-color:white!important ;
	}
	.btn
	{
		background-color:#2b6fe5 !important ;
	}
	
  </style>
</head>
<body>
<!-- NAVIGATION BAR CONTENT-->
<?php include'header.php'?>
<?php include'navbar.php'?>
<br><br>

<div class="container-fluid" >
	<div class="grp" style="background-color:#d6e5ff;width: 60% ;margin:auto; padding:20px 5px 20px 5px; border-radius:20px;min-width:275px">

		<div class="dashboard">
		<span style="font-size:1.4em ;color:#333333;font-weight:400">Choose Test You Want to take</span><br><br>
		</div>
		<div class="dashboard">
		<?php  



			 include 'dbconnect.php';

			  $query = $conn->prepare("SELECT test_id FROM questions GROUP BY test_id ; ");
			  $query->execute();

			  $query->bind_result($test);
			  //include'navbar.php';
			  echo "<form method='GET' action='cnfTest.php'> ";

			  $query->store_result();
			  $numtest = $query->num_rows(); 
			  if ( $numtest ==0)
			  {
			  	echo "* Sorry Currently We Have No Test For You.";
			  }
			  else
			  {


				  while($query->fetch())
				  {
				    echo "<button type='submit' class= 'btn btn-primary' style='margin:auto;width:20em;'name='testid' value=$test >".$test."</button>";
				    echo '<br><br>';

				   }
				    
				   echo "</form>";
			  }
			$query->close();
		?>
		</div>
		

		

		
	</div>
</div>
<br><br>








<?php include'footer.php'?>


  

</body>
</html>
