<?php 
$conn=mysqli_connect("localhost","admin","admin","MyChat");//this is connection querry

	if(!$conn):
		echo "Database error". mysqli_connect_error();
	endif;

 ?>