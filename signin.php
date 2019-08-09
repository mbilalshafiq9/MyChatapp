<?php 
	session_start();
	include"db-conn.php"; 
	    if(isset($_POST['submit']))
  {
  $nam=$_POST['name'];

  $pass=$_POST['password'];

  $query="SELECT * FROM users WHERE name='$nam' AND password='$pass'";
  $result=mysqli_query($conn,$query);
  $total=mysqli_num_rows($result);
  echo $total;
  if ($total==1) {
  	$_SESSION['name']=$nam;
  	header('location:home1.php');}
    else{
      echo "Invalid Email or Password";
    }
 }

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Login to MyChat</title>
	<link rel="stylesheet" type="text/css" href="signin.css">
	<style type="text/css">
		


	</style>
</head>
<body>
	<div class="head">
    <h1>Login to MyChat</h1>
  </div>
<form action='' method="POST">
  <div class="imgcontainer">
    <img src="https://www.winhelponline.com/blog/wp-content/uploads/2017/12/user.png" alt="Avatar" class="avatar">
  </div>

  <div class="container">
    <label for="uname"><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="name" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password" required>
        
    <button type="submit" name="submit">Login</button>
     <span class="psw">Forgot <a href="forget_pass.php">password?</a></span>
    <label>
      <input type="checkbox" checked="checked" name="remember"> Remember me
    </label>
  </div>

  <div class="contain">
  	
    <button type="button" class="cancelbtn">Cancel</button>
    <span class="psw">Don't have an account. <a href="Signup.php"> Create New</a></span>
  </div>
</form>

</body>
</html>
<?php 
		


 ?>