<?php 
	session_start();
	include("db-conn.php");
	error_reporting(0);
/*	echo "<script type='text/javascript'>
     alert('Congratulation ! You have Succesfully Loged in')
    </script>"; */
   $username= $_SESSION['name'];
   if($_SESSION['name']==true){

   }
   else{
   	header('location:signin.php');
   }
   $query="SELECT * FROM users WHERE name ='$username' ";
  $result=mysqli_query($conn,$query);
  $total=mysqli_fetch_assoc($result);
//.....................................................................
     if (isset($_GET['user'])) {
        	$_GET['user']=$_GET['user'];
        }
        else{
        	$sql='SELECT `sender_name` , `reciver_name` FROM `messages` WHERE `sender_name`="'.$_SESSION[`name`].'" OR `reciver_name`="'.$_SESSION['name'].'"';
        	 $result=mysqli_query($conn,$sql);
        	 $final=mysqli_fetch_all($result,MYSQLI_ASSOC);
        	 if($final)
        	 {
        	 	foreach ($final as $finals ) { 
        	 		if ($finals['sender_name']==$_SESSION['name']) {
        	 			$_GET['user']=$finals['reciver_name'];
        	 		}
        	 		else{
        	 			$_GET['user']=$finals['sender_name'];	
        	 		}
        	 	}

        	 }
        }
	  $sql='SELECT * FROM `messages` WHERE `sender_name`="'.$_SESSION['name'].'" AND `reciver_name`="'.$_GET['user'].'" 
	  OR `sender_name`="'.$_GET['user'].'" AND `reciver_name`="'.$_SESSION['name'].'"';
	  $out=mysqli_query($conn,$sql);
	  $final=mysqli_fetch_all($out,MYSQLI_ASSOC);

 ?>


<!DOCTYPE html>
<html>
<head>
	<title> MyChat</title>
	<link rel="stylesheet" type="text/css" href="home.css">
  <style type="text/css">
   
  </style>
</head>
<body>
		<div class="head"><br>
			<div style="float:left" onclick="document.getElementById('newchat').style.display='block'" class="new">
				<h3>New Chat</h3>
			</div>
    <a style="float: right; color: white;padding-top: 30px; font-weight: bold;" href="logout.php">Logout</a>
    <h1>Welcome to MyChat</h1>

  </div>
	<div class="row">
		<div class="column1">
			<div class="imgcontainer">
			<img  src=" <?php  echo $total['picture']; ?>">
			<h4><?php echo "Welcome ".$username; ?></h4>
			</div>
			<div class="info"> 
			<a style="float: right;" href="logout.php">Edit Profile</a>
   More <a onclick="details();" href="#">Details</a>
   <p id="nam"></p>
   <p id="mail"></p>
   <p id="count"></p>
   <p id="gndr"></p> 										
   <a  id='less' onclick="less();"  href="#"></a>
   <hr>	</div>
   <div class="friends">
    <h2>Friend List</h2>
   <?php include("friend_list.php"); ?>	
      </div>
<br>
<p>Powered By Bilal Shafiq.</p> <br>

   </div>
	<div class="column2">
		
    <div class="messages"> 
    <?php  foreach ($final as $finals ) { 
	
	  if ($finals['sender_name']==$_SESSION['name']) {	 ?> 
	  	 <div class="grey-msg"> 
	  		<a href="#"><?php echo "Me"?></a>
	  		 <p style="float: right; "> <?php    echo $finals['time']; ?></p>
     <h5> <?php   echo $finals['messsage']; ?></h5> 
            </div>
	 <?php  } else
	  {?> 
	  <div class="white-msg"> 
	  		<a href="#"> <?php echo $finals['sender_name']?></a>
	  		 <p style="float: right; "> <?php    echo $finals['time']; ?></p>
     <h5> <?php   echo $finals['messsage']; ?></h5> 
            </div>
	 <?php } 
       }?> 
     
      </div>
      <form  action="message.php" method="POST">
      	<input type="text" name="user" placeholder="Enter Reciever Name" value="<?php echo $_GET['user']; ?>">
           <textarea  name="message" placeholder="Write Your Message"></textarea>
            <button type="submit"  name="submit" value="">Send</button> 
      </form>

</div>
</div>
<script >
	function details(){
 		document.getElementById("nam").innerHTML = "<?php echo "<b>Name :</b>".$totals['name']  ?>";
 		document.getElementById("mail").innerHTML = "<?php echo "<b>Email :</b>". $totals['email'] ?>";
 		document.getElementById("count").innerHTML = "<?php echo "<b>Country :</b>".  $totals['country']?>";
 		document.getElementById("gndr").innerHTML = "<?php echo "<b>Gender :</b>". $totals['gender']?>";
 		document.getElementById("less").innerHTML = "<?php echo '<b>Show less</b>'?>";
 		}
 		function less(){
 			document.getElementById("nam").innerHTML = "";
 		document.getElementById("mail").innerHTML = "";
 		document.getElementById("count").innerHTML = "";
 		document.getElementById("gndr").innerHTML = "";
 		document.getElementById("less").innerHTML = "";
 		}

</script> 	
	
</body>
</html>
<?php 
	
 ?>