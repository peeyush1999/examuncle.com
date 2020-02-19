<?php 
session_start();

$number = $_SESSION['qno'];



if($_POST['submit'] == 'reset')
{
	$_SESSION['response'][$number] = 0;	
}
else
{
$resp = $_POST['option'];
$number = $_SESSION['qno'];
$_SESSION['response'][$number] = $resp;
$len = $_SESSION['testlen'];
$_SESSION['qno'] = ($_SESSION['qno'])%$len + 1 ;


}



header('Location:takeTest.php');



?>