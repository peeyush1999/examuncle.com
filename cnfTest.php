<?php
session_start();
ob_start();


 // to enable output buffering so that header error can be solved !!
$username=$_SESSION['user'];
if($_SESSION['login']!=True )
  header('Location:home.php');





//echo $_SESSION['test'];
if($_SESSION['teststarted'] == 0)
{  
$_SESSION['test'] = $_GET['testid'];
$_SESSION['teststarted'] = 1;
}

//echo $_SESSION['test'];

$test = $_SESSION['test'];

 $_SESSION['start'] = time();
 
 $_SESSION['expire'] = $_SESSION['start'] + (45 * 60);


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Examuncle.com</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <style>
    /* Set height of the grid so .sidenav can be 100% (adjust if needed) */
    .row.header{height: 100px;
		background-color: #2F5597;
  
    }
    .scroll{height: 500px;
    background-color: #2F5597;
    overflow-y: auto;
    }
    .row.content {min-height: 600px}
    
    /* Set gray background color and 100% height */
    .sidenav {
      background-color: #f1f1f1;
      height: 100%;
      position:relative;
    }

    .questionNo
    {
    	font-size: 	28px;
    	font-weight: 	bold;	
    }
    .question
    {
    	font-size: 	22px;
    	font-weight: 	bold;	
    	margin-left:    10px;  
    }
    .ansl
    {
    		font-size: 	22px;
    	font-weight: 	100;
    	  
    	 		
    }
    .ansr
    {
    		font-size: 	22px;
    	font-weight: 	100;
    		
    }
    #scrollDiv
		{
		    width:379px !important;
		    height:600px;
		    background-color:#f1f1f1;
		    overflow-y: auto;
        margin:0px;
		    max-width:600px;
		    max-height:600px;
		}
	#stest
	{		
		position: 	absolute;	
		bottom:50px;
	}
    
    /* Set black background color, white text and some padding */
    footer {
      background-color: #2F5597 !important	;
      color: black !important;
      padding: 15px;
    }
    
    /* On small screens, set height to 'auto' for sidenav and grid */
    @media screen and (max-width: 767px) {
      .sidenav {
        height: auto;
        padding: 15px;
      }
      .row.content {height: auto;} 
    }
  </style>
</head>
<body>

<div class="container-fluid">
	<div class="row header">


	</div>
  <br><br><br>
  <div class="row content">

    <div class="row1">
    <span style="font-size: 32px; color: red;"><u><center>RULES</center></u></span>
    <img src="assets/img/rules.png" style="margin:30px;" alt="Rules" >
  
 <form method="POST" action="takeTest.php">
  <input type="hidden" name="testid" value= <?php echo "'".$test."'" ;?> >
  <center>  
  <input type="checkbox" class="form-check-input" required>

  <span style="font-size: 20px; color: red;">&nbsp;&nbsp;The computer provided to me is in proper working condition. I have read and understood the instructions given above.</span>
<br><br><br>
<button type="submit" class="btn btn-primary">Take Test</button>
</center>
 </form>
  </div>
</div>
<br><br><br><br>
<?php include'footer.php';?>


</body>
</html>
