<?php
session_start();


	$mysqli = mysqli_connect("localhost","root","","research_portal");
	
	if (mysqli_connect_errno())
	{
	  echo "Failed to connect to MySQL: " . mysqli_connect_error();
	  die();
  	}
	  else{
		  echo "Success";
	  }
?>
