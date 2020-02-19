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
//	$pdf->Cell(0,10,'Printing line number '.$i,0,1);
//$pdf->Output();
?>

<?php

session_start();
include'dbconnect.php';


$len = $_SESSION['testlen'];

$i=1;



$unattempted =0;
$correct = 0;
$wrong = 0;
echo "Total Number Of Questions : <H1>$len</H1>";

$query = $conn->prepare("SELECT qno,question,op1,op2,op3,op4,ans FROM questions WHERE test_id = 'cs' ORDER BY qno ASC");

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
			$wrongattempts->Cell(0,10,"A. ".$op1."		B. ".$op2,0,1);
			$wrongattempts->Cell(0,10,"C. ".$op3."		B. ".$op4,0,1);
	}

	


	$answerkey->Cell(0,15,$qno." ".$question,0,1);
	$answerkey->Cell(0,10,"A. ".$op1."		B. ".$op2,0,1);
	$answerkey->Cell(0,10,"C. ".$op3."		B. ".$op4,0,1);
	$answerkey->Cell(0,10,"Ans. ".$ans."		Your Response. ".$_SESSION['response'][$i],0,1);


	$questionbook->Cell(0,15,$qno." ".$question,0,1);
	$questionbook->Cell(0,10,"A. ".$op1."		B. ".$op2,0,1);
	$questionbook->Cell(0,10,"C. ".$op3."		B. ".$op4,0,1);
	//$questionbook->Cell(0,10,"Ans. ".$ans."		Your Response. ".$_SESSION['response'][$i],0,1);
	
	}

	$answerkey->Cell(0,15,"Test  : ",0,1);
	$answerkey->Cell(0,10,"Total Correct :".$correct."		Total Wrong : ".$wrong,0,1);
	$answerkey->Cell(0,10,"Marks : ".$correct."/".$len,0,1);
	

	$questionbook->Cell(0,15,"Test  : ",0,1);
	$questionbook->Cell(0,10,"Total Correct :".$correct."		Total Wrong : ".$wrong,0,1);
	$questionbook->Cell(0,10,"Marks : ".$correct."/".$len,0,1);
	
	echo "No of Correct Attempt : <h1>$correct</h1> <br><br>";
	echo "No of Wrong Attempt : <h1>$wrong</h1> <br><br>";
	echo "No of UnAttempted : <h1>$unattempted</h1> <br><br>";

	ob_start();
	$answerkey->Output('F','testpdf/Answerkey_filename.pdf');
	ob_flush();
	ob_start();
	$questionbook->Output('F','testpdf/Questionbook_filename.pdf');
	ob_flush();

	echo "<a href='udashboard.php'>Click Here to go on DashBoard !!</a>";

?>