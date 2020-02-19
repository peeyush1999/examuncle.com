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
	body{
		background-color:	#555555 !important;
		min-width:700px !important;
	
	}
.row
	{
		border-radius: 20px;
		background: #d6e5ff;
		padding: 10px; 
		width: 60%;
		
		
		margin:auto !important;
		
		
		margin-bottom:2%;
		margin-top:2%;
	}
	.heading{
		font-size: 32px;
		color : black;
	}
	.form-group{
	
	
	font-size:1.3em;
	color:#333333;
}
.form-group1{
	
	padding-left:15%;
	text-align:left ;

	
	font-size:1.3em;
	color:#333333;
}
	.form-group1 label{
		
		width:40%;
		margin:auto;
		
		padding: 15px 0px 15px 0px;
		
		float: none; /* if you had floats before? otherwise inline-block will behave differently */
		display: inline-block;
		vertical-align: middle;    

	}
	.form-group1 input{
		
		width:55%;
		margin:auto;
		max-width: 250px;
		padding: 15px 0px 15px 0px;
		
		float: none; /* if you had floats before? otherwise inline-block will behave differently */
		display: inline-block;
		vertical-align: middle;    

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

<div class="container">
	<br><br><br>
	
		 
	
	<div class="row">
		<form class="forgot-password" id="forgot-password" action="changepassvalidate.php" onsubmit="return #" method="post">
			<br>
			<span class="heading"><center><b><u>Reset Password !!</u></b></center></span>	
			<br>
			<div class="form-group1" >
				 <label ><b>Username</b></label> 
				 <input type="text" placeholder="Confirm Username" name="uname" class="form-first-name form-control" required> 
			</div >
			<div class="form-group1">
				 <label ><b>Email</b></label> 
				 <input type="text" placeholder="Confirm Email" name="email" class="form-first-name form-control" required> 
			</div >
			<div class="form-group1" >
				 <label><b>New Password</b></label> 
				 <input type="password" placeholder="Enter New Password" name="password" class="password form-control" required> 
			</div>
			<div class="form-group1" >
				 <label><b>Confirm Password</b></label> 
				 <input type="password" placeholder="Confirm Password" name="cpassword" class="password form-control" required> 
			</div>
			
			<div class="form-group" align="center" style="margin:20px 0px 20px 0px;" >
			 <button type="submit" name="submit"  class="btn" style="width:30%;min-width:150px;">Change Password </button>  <button type="reset" name="reset"  class="btn" style="width:30%;min-width:150px;">Reset </button>
			</div>
		
				
			
		
		</form>	
	
	
	</div>
</div>
<br><br>

<?php include'footer.php'?>
<!-- Animation on scroll script--> 
<script src="assets\js\aos.js" type="text/javascript"></script>
<script>
		AOS.init({
  duration: 1200,
})

  </script>

  
</body>
</html>
