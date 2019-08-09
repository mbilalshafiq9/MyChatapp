<?php 
		session_start();
		 $username= $_SESSION['name'];
		include("db-conn.php");
		$query='SELECT * FROM users';
	$reslut=mysqli_query($conn,$query);
	$total=mysqli_fetch_all($reslut,MYSQLI_ASSOC);
	
 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<style type="text/css">

 	</style>
 	<title>Friend List</title>
 	
 </head>
 <body>
 		  <?php foreach ($total as $totals ) { ?>
 		<ul>
 		<a href="?user=<?php echo $totals[name] ?>"><?php echo "<h4>$totals[name]</h4> "; ?></a>
        	<img style="height: 50px; width: 50px; border-radius: 50px " src=" <?php  echo $totals['picture']; ?>"> 
        </ul>

     
      <?php } ?>



 </body>
 </html>