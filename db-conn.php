<?php 
$conn=mysqli_connect("localhost","admin","admin","MyChat");

	if(!$conn):
		echo "Database error". mysqli_connect_error();
	endif;

 ?>