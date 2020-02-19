<?php
session_start();

$_SESSION['user']="";
$_SESSION['type']="";
$_SESSION['login']=False;
session_destroy();
include'header.php';
include'navbar.php';
echo "<br><br><br><br><p style='font-size:2em ;color:black;'> You Have been Successfully Logged Out !!<br><br> For Security reasons, please close this window</p><br><br><br><br><br><br><br><br><br><br><br>";
include'footer.php';
?>