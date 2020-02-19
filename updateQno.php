<?php 

session_start();
ob_start(); 

$_SESSION['qno'] = $_POST['queButton'];

header('Location:takeTest.php');

?>