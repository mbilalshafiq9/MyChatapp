<?php 
		include"db-conn.php"; 
		if(isset($_POST['submit'])){
		$email=$_POST['email'];
		$sql="SELECT * FROM users where email='$email'";
		$result=mysqli_query($conn,$sql);
		$final=mysqli_fetch_assoc($result);

require 'PHPMailer-master/PHPMailerAutoload.php';

$mail = new PHPMailer();
  
  //Enable SMTP debugging.
  //Set PHPMailer to use SMTP.
  $mail->isSMTP();
  //Set SMTP host name
  $mail->Host = "smtp.gmail.com";
  $mail->SMTPOptions = array(
                    'ssl' => array(
                        'verify_peer' => false,
                        'verify_peer_name' => false,
                        'allow_self_signed' => true
                    )
                );
  //Set this to true if SMTP host requires authentication to send email
  $mail->SMTPAuth = TRUE;
  //Provide username and password
  $mail->Username = "mbilalshafiq9@gmail.com";
  $mail->Password = "mianbilal";
  //If SMTP requires TLS encryption then set it
  $mail->SMTPSecure = "false";
  $mail->Port = 587;
  //Set TCP port to connect to
  
  $mail->From = "mbilalshafiq9@gmail.com";
  $mail->FromName = "MyChat";
  
  $mail->addAddress($final["email"]);
  
  $mail->isHTML(true);
 
  $mail->Subject = "Forgot Password";
  $mail->Body = "<i>This is your password:</i>".$final["password"];
  $mail->AltBody = "This is the plain text version of the email content";
  if(!$mail->send())
  {
   echo "Mailer Error: " . $mail->ErrorInfo;
  }
  else
  {
   echo "Message has been sent successfully";
  }
		}
 ?>



 <!DOCTYPE html>
 <html>
 <head>
 	<title>MyChat</title>
 	<link rel="stylesheet" type="text/css" href="signin.css">
 </head>
 <body>
 	<form method="POST" action="forget_pass.php">
    <label for="mail"><b>Email</b></label>
    <input type="text" placeholder="Enter Your Account Email" name="email" required>
    <button type="submit" name="submit">Send</button>
    
  </form>


 </body>
 </html>


