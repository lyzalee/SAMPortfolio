<?php
	
	$hostname = "sql112.infinityfree.com"; 
	$username = "if0_36448790"; 
	$password = "lylore1401"; 
	$dbname   = "if0_36448790_lylore";
	 
	
	$con = new mysqli($hostname, $username, $password, $dbname); 
	 

	if ($con->connect_error) { 
	    die("Connection failed: " . $con->connect_error); 
	}
?>