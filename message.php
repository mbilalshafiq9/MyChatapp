<?php 
	session_start();
		include("db-conn.php");
		$msg=$_POST['message'];
		$reciver=$_POST['user'];
		$sender=$_SESSION['name'];
		echo $msg.$reciver.$sender;
		 $time = date("Y-m-d H:i:s");
		$query="INSERT INTO `messages` ( `sender_name`, `reciver_name`, `messsage`, `time`) VALUES ('$sender','$reciver','$msg','$time')";
	$result=mysqli_query($conn,$query);
	

    if($result)
    {
    	header("location:home1.php?user=".$reciver);

    }
    else
    {
    	echo "message not sent";
    }
    


 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title>Messages</title>
 </head>
 <body>
 		


 
 </body>
 </html>