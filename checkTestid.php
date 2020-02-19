<?php session_start();

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
    .row.content {height: 400px}
    
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
      color:red; 
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
		    width:auto !important;
		    height:600px;
		    background-color:#f1f1f1;
		    overflow-y: auto;
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
<?php include'navbar.php';?>
<div class="container-fluid">
	<div class="row header"><br><br>
   <center><span class='question' style="color :white;font-size: 32px;"> Create Test </span></center>
	</div>
  <div class="row content">

    <div class="col-sm-12">
      <br><br>
      <br>

        <form action='testidvalidate.php' method="POST">

          <span class='ansl'>Create Test ID : <input type='text' name='testid' ></span><br><br>
          <button type="submit" class="btn btn-primary" style="max-width: 200px;">Validate</button> 

          <?php

          if( $_SESSION['show'] == 1 )
          {
                  echo " <br><br><span class='question'>* TestId Already Used ,Please Choose Different TestId  .</span>";
                  $_SESSION['show']=0;
          }

          ?>
        </form>


    </div>
   </div>
 </div>   
 


      

<?php include'footer.php';?>

</body>
</html>
