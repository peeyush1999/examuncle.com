

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

<div class="container-fluid">
	<div class="row header"><br><br>
   <center><span class='question' style="color :white;font-size: 32px;"> Create Test </span></center>
	</div>
  <div class="row content">

    <div class="col-sm-12">
      <br>
      <?php 
      session_start();

     
 
    echo "

    <form action='insertValidate.php' method='POST'>

     
    ";

    echo "<span class='questionNo'>  &nbsp; Q. ".$_SESSION['qno']."</span><br>";
   // echo '<br>';
    echo "<span class='question'>   <textarea name='question' cols=40 rows=5> </textarea> </span>";
    echo '<br><br><br>';
    echo "<div class='row'>";
    echo "<div class='col-sm-6'>";
    printf("<span class='ansl'>A . <input type='text' name='op1' ></span><br><br>");
    printf("<span class='ansr'>B . <input type='text' name='op2' ></span><br><br>");
    
    echo '</div>';
    echo "<div class='col-sm-6'>";
    
    printf("<span class='ansl'>C . <input type='text' name='op3' ></span><br><br>");
    printf("<span class='ansr'>D . <input type='text' name='op4' ></span>");
    echo "</div>";
    
    echo "</div>";
    echo '<br><br>';
    
    echo "

    	<div class='row'>
    	<div class='col-sm-6'>
      <span class='question'>Mark Answer : </span>   
     <input type='radio' name='option' value=1 required>A&nbsp;
     <input type='radio' name='option' value=2>B &nbsp;
     <input type='radio' name='option' value=3>C &nbsp;
     <input type='radio' name='option' value=4>D &nbsp;
    <br><br>
     	</div>
     	<div class='col-sm-6'>
    
    	</div>
    	</div>
  ";


 
  ?>

    </div>
    <br><br>
    <button type="submit" class="btn btn-primary">Insert</button>       <button type="reset" class="btn btn-primary">Clear</button>
    <br><br>

</form>
<form action="home.php" method="POST">
<button type="submit" class="btn btn-primary">Finish</button>
</form>
<br><br><br><br>
      

<?php include'footer.php';?>

</body>
</html>
