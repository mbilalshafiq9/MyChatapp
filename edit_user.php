<?php 
    include"db-conn.php";
    if(isset($_GET['submit']))
  {
  $nam=$_GET['name'];
  $mail=$_GET['email'];
  $pass=$_GET['password'];
   $count=$_GET['country'];
   $gend=$_GET['gender'];
  $sql=mysqli_query("UPDATE `users` SET `name`='$nam',`email`='$mail',`password`='$pass',`country`= '$count',`gender`='$gend' WHERE id=$id");
  $final=mysqli_query($conn,$sql);
  
  if(!$sql)
{
 echo "Error: ";
}
else {echo $nam;
 echo "<script type='text/javascript'>
      alert('Your Account  Succesfully Updated');
    </script>";

    header('location:home1.php');
  
}
}

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>MyChat</title>
	<link rel="stylesheet" type="text/css" href="signup.css">

</head>
<body>
  <div class="head">
    <h1>Update  Information of MyChat</h1><br>
  </div>
	

<form action="edit_user.php" method="GET" enctype="multipart/form-data">
  <div class="imgcontaine
  r">
    <img src="https://www.winhelponline.com/blog/wp-content/uploads/2017/12/user.png" alt="Avatar" class="avatar">
  </div>

  <div class="container">
    <label for="uname"><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="name" value="<?php echo $_GET['nam']; ?>" required>
     <label for="mail"><b>Email</b></label>
    <input type="Email" placeholder="Enter Email" name="email" value="<?php echo $_GET['mail']; ?>" required>
    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password" value="<?php echo $_GET['pass']; ?>"
    required>
   <div class="country"> <label> <b>Country</b></label>
    <select class="form-select" name="country" value="<?php echo $_GET['count']; ?>" required>
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
    <select class="form-select" name="gender"  value="<?php echo $_GET['gend']; ?>"required>
      <option disabled="">Select a Gender</option>
        <option>Male</option>
          <option>Female</option>
            <option>Other</option>
    </select>
    </div>

    <button  type="submit" name="submit" value="Update">Update</button>
    
  </div>

  <div class="contain">
  	
    <button type="button" class="cancelbtn">Cancel</button>
    <span class="psw">Already have an account. <a href="signin.php"> Sigin here</a></span>
  </div>
</form>

</body>
</html>