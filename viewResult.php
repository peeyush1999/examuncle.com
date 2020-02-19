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
  
  <link rel="icon" type="image/png" href="assets/img/icon.png"/>
<!--===============================================================================================-->
	
<!--===============================================================================================-->
	
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/table/vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/table/vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/table/vendor/perfect-scrollbar/perfect-scrollbar.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/table/css/util.css">
	<link rel="stylesheet" type="text/css" href="assets/table/css/main.css">
  
  

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
	<div class="grp" style="background-color:#d6e5ff;width: 66% ;margin:auto; padding:20px 5px 20px 5px; border-radius:20px;min-width:275px">

		<div class="dashboard">
		<span style="font-size:1.4em ;color:#333333;font-weight:400">Results</span><br><br>
		</div>
		<div class="dashboard">



		<?php  



			 include 'dbconnect.php';

			  $query = $conn->prepare("SELECT testid,marksscored,totalmarks FROM testcompleted WHERE username = '$username' ; ");
			  $query->execute();

			  $query->bind_result($id,$marks,$totalmarks);
			  //include'navbar.php';
			 

			  $query->store_result();
			  $numtest = $query->num_rows(); 
			  if ( $numtest ==0)
			  {
			  	echo "* Sorry, You Have Not Attempted Any Test.";
			  }
			  else
			  {	

			  	echo "

			  	
						
							<div class='wrap-table100'>
									<div class='table'>

										<div class='row header'>
											<div class='cell'>
												Test-Id
											</div>
											<div class='cell'>
												Marks Scored
											</div>
											<div class='cell'>
												Total Marks
											</div>
											<div class='cell'>
												Percentage (%)
											</div>
										</div>


			  	";


			  
	

			  	
			  	


				  while($query->fetch())
				  {

				  		echo "

			  		<div class='row'>
							<div class='cell' data-title='Full Name'>
								$id
							</div>
							<div class='cell' data-title='Age'>
								$marks
							</div>
							<div class='cell' data-title='Job Title'>
								$totalmarks
							</div>
							<div class='cell' data-title='Location'>
								";
								
								  if($totalmarks != 0)
							        echo ($marks/$totalmarks)*100;
							        else
							          echo "0";

								echo "
							</div>
						</div>

				
		";
				    

				   }
			echo "</div>
			</div>";	    
				   
			  }
			$query->close();
		?>
		</div>
		

		

		
	</div>
</div>



<br><br><br><br><br><br>








<?php include'footer.php'?>


<!--===============================================================================================-->	
	<script src="assets/table/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="assets/table/vendor/bootstrap/js/popper.js"></script>

<!--===============================================================================================-->
	<script src="assets/table/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="assets/table/js/main.js"></script>

  

</body>
</html>
