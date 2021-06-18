<?php
session_start();
include'dbconnection.php';
		$query = "DELETE FROM users WHERE email='".$_GET['id']."'";
		
		
		if (!mysqli_query($con, $query))
		{
		echo "DELETE failed: $query<br />" .
		mysqli_connect_error() . "<br /><br />";
		}
		else
		{
			echo "successfully DELETED";
			$host=$_SERVER['HTTP_HOST'];
			$uri  = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
			$extra="manage-users.php";		
			header("Location: http://$host$uri/$extra");
		}	
	

?>