<?php 
	$server_localhost='localhost';
	$server_uname = 'root';
	$server_pass ='';
	$db='examportal';
	
	
	$conn = new mysqli($server_localhost,$server_uname,$server_pass,$db);
	
	if (!$conn) 
		{
			die("Connection failed: " . mysqli_connect_error());
		}
	
?>