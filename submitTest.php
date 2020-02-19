<?php
require('fpdf/fpdf.php');

class PDF extends FPDF
{
// Page header
/*function Header()
{
  // Logo
  //$this->Image('logo.png',10,6,30);
  // Arial bold 15
  $this->SetFont('Arial','B',15);
  // Move to the right
  $this->Cell(80);
  // Title
  $this->Cell(30,10,'Title',1,0,'C');
  // Line break
  $this->Ln(20);
}

// Page footer
function Footer()
{
  // Position at 1.5 cm from bottom
  $this->SetY(-15);
  // Arial italic 8
  $this->SetFont('Arial','I',8);
  // Page number
  $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}*/
}

// Instanciation of inherited class
$questionbook = new PDF();
$questionbook->AliasNbPages();
$questionbook->AddPage();
$questionbook->SetFont('Times','',12);

$answerkey = new PDF();
$answerkey->AliasNbPages();
$answerkey->AddPage();
$answerkey->SetFont('Times','',12);


$wrongattempts = new PDF();
$wrongattempts->AliasNbPages();
$wrongattempts->AddPage();
$wrongattempts->SetFont('Times','',12);
//for($i=1;$i<=40;$i++)
//  $pdf->Cell(0,10,'Printing line number '.$i,0,1);
//$pdf->Output();
?>
<?php

session_start();
include'dbconnect.php';


$len = $_SESSION['testlen'];
$uname = $_SESSION['user'];
$test = $_SESSION['test'];

$i=1;



$unattempted =0;
$correct = 0;
$wrong = 0;


$query = $conn->prepare("SELECT qno,question,op1,op2,op3,op4,ans FROM questions WHERE test_id = '$test' ORDER BY qno ASC");

  $query->execute();

  $query->bind_result($qno,$question,$op1,$op2,$op3,$op4,$ans);
  //include'navbar.php';
  


  for($i=1;$i<=$len;$i++)
  {



  

  
  //include'navbar.php';
  
  $query->fetch();

  

  
  


  if($_SESSION['response'][$i] == 0)
  {
    $unattempted++;
      
     
  }
  else if($_SESSION['response'][$i] == $ans)
  {
    $correct++;
  }
  else
  {
    
    $wrong++;
    
      $wrongattempts->Cell(0,15,$qno." ".$question,0,1);
      $wrongattempts->Cell(0,10,"A. ".$op1."    B. ".$op2,0,1);
      $wrongattempts->Cell(0,10,"C. ".$op3."    B. ".$op4,0,1);
  }

  


  $answerkey->Cell(0,15,$qno." ".$question,0,1);
  $answerkey->Cell(0,10,"A. ".$op1."    B. ".$op2,0,1);
  $answerkey->Cell(0,10,"C. ".$op3."    B. ".$op4,0,1);
  $answerkey->Cell(0,10,"Ans. ".$ans."    Your Response. ".$_SESSION['response'][$i],0,1);


  $questionbook->Cell(0,15,$qno." ".$question,0,1);
  $questionbook->Cell(0,10,"A. ".$op1."   B. ".$op2,0,1);
  $questionbook->Cell(0,10,"C. ".$op3."   B. ".$op4,0,1);
  //$questionbook->Cell(0,10,"Ans. ".$ans."   Your Response. ".$_SESSION['response'][$i],0,1);
  
  }

  
  $answerkey->Cell(0,15,"User  : ".$uname ,0,1);
  $answerkey->Cell(0,15,"Test  : ".$test ,0,1);
  $answerkey->Cell(0,10,"Total Correct :".$correct."    Total Wrong : ".$wrong,0,1);
  $answerkey->Cell(0,10,"Marks : ".$correct."/".$len,0,1);
  
 
  $questionbook->Cell(0,15,"User  : ".$uname ,0,1);
  $questionbook->Cell(0,15,"Test  :". $test ,0,1);
  $questionbook->Cell(0,10,"Total Correct :".$correct."   Total Wrong : ".$wrong,0,1);
  $questionbook->Cell(0,10,"Marks : ".$correct."/".$len,0,1);


  $wrongattempts->Cell(0,15,"User  :".$uname ,0,1);
  $wrongattempts->Cell(0,15,"Test  : ".$test ,0,1);
  $wrongattempts->Cell(0,10,"Total Correct :".$correct."   Total Wrong : ".$wrong,0,1);
  $wrongattempts->Cell(0,10,"Marks : ".$correct."/".$len,0,1);
  
  $query->close();

        $stmt = $conn->prepare("INSERT INTO testcompleted (username,testid,marksscored,totalmarks) VALUES (?,?,?,?)");
        //echo $uname.$test.$correct.$len;
        $stmt->bind_param("ssii",$uname,$test,$correct,$len);
        //include'navbar.php';
        if (!$stmt->execute()) 
        {
          echo "<br><br><center><h2 style='font-weight:bold;color:white'>";
          echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
          echo "</h2></center>";
        }
       
        $stmt->close();


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
  <link rel="icon" type="image/png" href="assets/img/icon.png"/>
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
      margin:0px;
      max-width: 379px !important;
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
    .result
    {

          font-size:  28px;
      font-weight:  100;
    }
    .result1
    {

          font-size:  18px;
      font-weight:  100;
    }
     .resultval
    {

          font-size:  28px;
           font-weight:  100;
           color:red;
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
	<div class="row header">

	</div>
  <div class="row content">

    <div class="col-sm-9">
      <br>

      <?php
      echo "
      <span class='result'><u><h1><center>Result</center></h1></u> </span><br><br>
      <div class='row'><div class='col-sm-6'>
        ";
      echo "<span class='result'>Total Number Of Questions :</span><br>";
        echo "<span class='result'>No of Correct Attempt : </span><br>";
        echo "<span class='result'>No of Wrong Attempt : </span><br>";
        echo "<span class='result'>No of UnAttempted : </span><br>";
        echo "<span class='result'>Marks Scored : </span><br>
        </div>

        <div class='col-sm-6'>
        <span class='resultval'> $len</span><br>
        <span class='resultval'>$correct</span><br>
        <span class='resultval'>$wrong</span><br>
        <span class='resultval'>$unattempted </span></br>
        <span class='resultval'>";
          
        if($len != 0)
        echo ($correct/$len)*100;
        else
          echo "0";
        echo " %</span><br>
        </div>
        </div>

        ";

        ob_start();
        $answerkey->Output('F','testpdf/Answerkey_'.$uname.'_'.$test.'.pdf');
        ob_flush();
        ob_start();
        $questionbook->Output('F','testpdf/Questionbook_'.$uname.'_'.$test.'.pdf');
        ob_flush();
        
        ob_start();
        $wrongattempts->Output('F','testpdf/Wattempts_'.$uname.'_'.$test.'.pdf');
        ob_flush();
        echo "<br><br><br><center><a href='udashboard.php'><span class='result'><u>Click Here to go on DashBoard !!</u><center></span></a>";
      ?>

      
    </div>
    <div class="col-sm-3 sidenav" id ="scrollDiv">

      <?php
      $dir    = 'testpdf/';
      $files1 = scandir($dir);
      //print_r($files1);
      $ak = 'Answerkey_'.$uname.'_'.$test.'.pdf';
      $qb = 'Questionbook_'.$uname.'_'.$test.'.pdf';
      $wa = 'Wattempts_'.$uname.'_'.$test.'.pdf';
      if( array_search($ak,$files1) >0 AND array_search($qb,$files1) > 0 AND array_search($wa,$files1) >0 )
      {
        echo "<br>
        <span class='resultval'><center><u>Download Pdf !!</u></center> </span><br>
        <span class='result1'>AnswerKey : </span>
        <a href='testpdf/$ak'>$ak</a><br><br>
        <span class='result1'>Question Booklet : </span>
        <a href='testpdf/$qb'>$qb</a><br><br>
        <span class='result1'>Wrong Attempts : </span>
        <a href='testpdf/$wa'>$wa</a><br>";
        
      }





      $response = array(0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0);

      $_SESSION['test']=''; 
      $_SESSION['qno'] = 1 ;
      $_SESSION['teststarted']=0;
      $_SESSION['testlen'] = 0 ;
      $_SESSION['response'] = $response;


      ?>



</div>

<?php include'footer.php';?>

</body>
</html>
