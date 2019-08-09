<?php 
    include"db-conn.php";
    if(isset($_POST['submit']))
  {
  $nam=$_POST['name'];
  $mail=$_POST['email'];
  $pass=$_POST['password'];
   $count=$_POST['country'];
   $gend=$_POST['gender'];
   $filename= $_FILES["image"]["name"];
  $tempname=$_FILES["image"]["tmp_name"];
  $folder="images/".$filename;
  move_uploaded_file($tempname, $folder);

  $query="INSERT INTO `users`(`name`, `Email`, `Password`,`Country`,`gender`,`picture`) VALUES ('$nam','$mail','$pass','$count','$gend','$folder')";
  $result=mysqli_query($conn,$query);
  
  if(!$result)
{
 echo mysqli_error();
}
else {
 echo "<script type='text/javascript'>
      alert('Congratulation $nam! you created an account Succesfully')
    </script>"; 
    header('location:sigin.php');
  
}
}

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Signup to MyChat</title>
	<link rel="stylesheet" type="text/css" href="signup.css">

</head>
<body>
  <div class="head">
    <h1>Signup to MyChat</h1>
<h2> Create New Account</h2>
  </div>
	

<form action="signup.php" method="POST" enctype="multipart/form-data">
  <div class="imgcontainer">
    <img src="https://www.winhelponline.com/blog/wp-content/uploads/2017/12/user.png" alt="Avatar" class="avatar">
  </div>

  <div class="container">
    <label for="uname"><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="name" required>
     <label for="mail"><b>Email</b></label>
    <input type="Email" placeholder="Enter Email" name="email" required>
    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password" 
    required>
     <label for="img"><b>Profile Picture</b></label><br><br>
     <input  type="file" name="image" value=""><br><br>
   <div class="country"> <label> <b>Country</b></label>
    <select class="form-select" name="country" required>
      <option disabled="">Select a Country</option>
        <option>Pakistan</option>
          <option>Australia</option>
            <option>England</option>
            <option>Newzeland</option>
              <option>India</option>
               <option>China</option>
               <option>Other</option>
    </select>
    </div>
          <div class="gender"> <label><b>Gender</b></label>
    <select class="form-select" name="gender" required>
      <option disabled="">Select a Gender</option>
        <option>Male</option>
          <option>Female</option>
            <option>Other</option>
    </select>
    </div>

    <button type="submit" name="submit">Signup</button>
    
  </div>

  <div class="contain">
  	
    <button type="button" class="cancelbtn">Cancel</button>
    <span class="psw">Already have an account. <a href="signin.php"> Sigin here</a></span>
  </div>
</form>

</body>
</html>