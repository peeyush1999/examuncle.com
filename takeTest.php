<?php
session_start();
ob_start();

$username=$_SESSION['user'];
if($_SESSION['login']!=True )
  header('Location:home.php');

if($_SESSION['teststarted'] == 0)
{  
$_SESSION['test'] = $_GET['testid'];
$_SESSION['teststarted'] = 1;
}

//echo $_SESSION['test'];

$test = $_SESSION['test'];
$number = $_SESSION['qno'];
$uname = $_SESSION['user'];
$_SESSION['start'] = time();


$session_value = $_SESSION['start'] ;

$session_end = $_SESSION['expire'];

/*echo $session_value ;
echo "<br>";
echo $session_end;*/
/*$now = time(); 
if ($now > $_SESSION['expire']) {
            
            header('Location:submitTest.php');
        }
*/
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
  <script async defer>
  var start='<?php echo $session_value;?>';
  var end='<?php echo $session_end;?>';

  function startTimer(duration, display) {
    var timer = duration, minutes, seconds;
    setInterval(function () {
        minutes = parseInt(timer / 60, 10)
        seconds = parseInt(timer % 60, 10);

        minutes = minutes < 10 ? "0" + minutes : minutes;
        seconds = seconds < 10 ? "0" + seconds : seconds;

        display.textContent = minutes + ":" + seconds;
        
        if (--timer < 0) {

            display.textContent = "Time Out !!! Submitting Your Test";
           
          

            document.getElementById("final_sub").click();
           
            //timer = duration;
        }
    }, 1000);
}

window.onload = function () {
    
    var fiveMinutes = (end-start),
        display = document.querySelector('#time');
    startTimer(fiveMinutes, display);
};
</script>

  <style>
    /* Set height of the grid so .sidenav can be 100% (adjust if needed) */
    .row.header{height: 100px;
		background-color: #2F5597;
    }
    .row.content {height: 600px}
    
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
	<div class="row header" style="color :white;font-size: 32px;padding-right:500px;padding-left:85% ;padding-top: 20px; "id="time">
    <br><br>
	</div>
  <div class="row content">

    <div class="col-sm-9">
      <br>
      <?php 



  //echo 'Number of Questions :<br> ';
  
  include 'dbconnect.php';

  $query = $conn->prepare("SELECT COUNT(test_id) FROM questions WHERE test_id = '$test' ");
  $query->execute();

  $query->bind_result($no_que);
  //include'navbar.php';
  
  $query->fetch();
  
    
    
    $_SESSION['testlen']  = $no_que; 

  $query->close();

    //echo "Session test len :  ";
    //echo $_SESSION['testlen'];



  $query = $conn->prepare("SELECT qno,question,op1,op2,op3,op4 FROM questions WHERE test_id = '$test' AND qno =$number ");

  $query->execute();

  $query->bind_result($qno,$question,$op1,$op2,$op3,$op4);
  //include'navbar.php';
  
  $query->fetch();
  
    printf("<span class='questionNo'>Q. %d</span>",$qno);
   // echo '<br>';
    printf("<span class='question'>  %s</span>",$question);
    echo '<br><br><br><br><br><br>';
    echo "<div class='row'>";
    echo "<div class='col-sm-6'>";
    printf("<span class='ansl'>A . %s</span><br>",$op1);
    printf("<span class='ansr'>B . %s</span><br>",$op2);
   
    
    echo '</div>';
    echo "<div class='col-sm-6'>";
     printf("<span class='ansl'>C . %s</span><br>",$op3);
    printf("<span class='ansr'>D . %s</span><br>",$op4);
    
    
    echo "</div>";
    
    echo "</div>";
    echo '<br><br><br><br><br><br>';
    //print_r($_SESSION['response']);
  ?>  
    <form action='storeAnswer.php' method='POST'>

    	<div class='row'>
    	<div class='col-sm-6'>
       
     <input type='radio' name='option' value=1 <?php echo $_SESSION['response'][$qno] ==1 ?  "checked" : "" ;  ?> >A <br><br>
   <input type='radio' name='option' value=2  <?php echo $_SESSION['response'][$qno] ==2 ?  "checked" : "" ;  ?>  >B <br><br>
     <input type='radio' name='option' value=3  <?php echo $_SESSION['response'][$qno] ==3 ?  "checked" : "" ;  ?>>C <br><br>  
     <input type='radio' name='option' value=4 <?php echo $_SESSION['response'][$qno] ==4 ?  "checked" : "" ;  ?> >D<br><br>
    <button type='submit' name='submit' value='submit' class='btn' style='background-color:#2F5597;color:white;'>Submit</button>     <button type='submit' class='btn' name='submit' value='reset' style='background-color:#2F5597;color:white;' onclick="" >Clear</button>
     	</div>
     	<div class='col-sm-6'>
    
    	</div>
    	</div>
  </form>


 <?php $query->close(); ?>
  
      
    </div>
    <div class="col-sm-3 sidenav" id ="scrollDiv">



      
      <br><br>
      <?php
      //echo $now;

      echo "<form action='updateQno.php' method='POST'>";

      	
    for($i=1 ; $i <= $no_que ; $i++)
    {
      if($_SESSION['response'][$i] !=0)
      echo "<button type='submit' class='btn btn-warning' style='height:50px ;width:50px;' name='queButton' value=$i >";
      else
        echo "<button type='submit' class='btn btn-primary' style='height:50px ;width:50px;' name='queButton' value=$i >";
      echo $i;
      echo "</button>"; 
      echo str_repeat("&nbsp;", 5);
      if($i%5 == 0)
      echo "<br><br>"; 
    }
    	
  echo "</form>";
  
    echo '<br>';
  echo "<br><br>";
  echo "<div id='stest'><form action='submitTest.php' method='POST'>
      <button type='submit' id='final_sub' class='btn btn-danger'  >Submit Test</button> 
      </form></div>
     ";
     ?>
      
    </div>

    
  </div>
</div>

<?php include'footer.php';?>

</body>
</html>
