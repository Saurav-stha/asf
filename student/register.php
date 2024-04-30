<?php

ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(E_ALL);

require_once "../database/database.php";

// require_once "../php/htmlFormat.php";
require_once "../mail/mailer.php";
$otp = mt_rand(100000, 999999);

session_start();

$otp = mt_rand(100000, 999999);

function emailExist($data,$email)
{
    if(filter_var($email,FILTER_VALIDATE_EMAIL)===false)
    {
        echo "<script>Please enter a valid email</script>";
    }
    else
    {
        $sql="SELECT *FROM student WHERE email='$email'";
        $stmt=mysqli_query($data,$sql);
        $user=mysqli_fetch_assoc($stmt);
        return $user;    
    }
}

if (isset($_POST['Submit']) && ($_SERVER['REQUEST_METHOD']=="POST")) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $province = $_POST['province'];
    $city = $_POST['city'];
    $password = $_POST['password'];
    $cpassword = $_POST['cPassword'];

	if(emailExist($data,$email))
	{
		echo "<script>alert(Email already exist)</script>";
        header("Location: login.php");
	}
	else
	{
		if (strcmp($password, $cpassword) != 0){
            die("Password and Confirm Password doesn't match!");
        }
		// Hashing the password using bcrypt
		$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

		$mailTemplate="

        <p>Verify your email address through OTP</p>
        <p>Your OTP is "  .$otp.  ".Enter the provided otp</p>"; 

        $subject="Email Verification from UniBridge";

		$emailSend=emailVerification($email,$mailTemplate,$subject);

		if($emailSend)
		{
			$_SESSION['otp']=$otp;
			$_SESSION['name']=$name;
			$_SESSION['email']=$email;
			$_SESSION['province']=$province;
			$_SESSION['city']=$city;
			$_SESSION['hashedPassword']=$hashedPassword;
			header("Location: otpVerification.php");
		}
		else
		{
			echo "<script>alert('Email Not Send')</script>";
		}
    
	}
}

// Close the database connection
mysqli_close($data);



?>
<!DOCTYPE html>
  <head>
    <meta charset="utf-8">
    <title>Registration</title>
    <link href="../css/register.css" type="text/css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@1,700&family=Merriweather:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" >
  </head>
 <body>
	<div>
		<div class="navbar">
		<span >
			 <a href="../index.php"><img class="logo"  src="../images/logo.png" alt="UniBridgeLogo" height="100px" width="100px"></a>
		</span>
		<span class="links">
					 <!-- <a href="#"class="navbar-item">Login</a> -->
					<a href="../index.php" class="navbar-item">Home</a> 
					<!-- <a href="./register.php" class="navbar-item">Register</a> -->
		</span>
  	<div class="container">
      <form name="myform" onsubmit="return validateform()" method="POST" >		
    		<div class="box">
          	<label for="name" class="fl fontLabel"> </label>
    			<div class="new iconBox"> <i class="fa fa-user" aria-hidden="true"></i> </div>
    			<div class="fr">
    			<input type="text" id="fname" name="name"  placeholder="Full Name" class="textBox" required>
				<p id=fnameError class="formerror"></span></p>
    			</div>
    			<div class="clr"></div>
    		</div>	
			<div class="box">
          	<label for="email" class="fl fontLabel">  </label>
    			<div class="fl iconBox"><i class="fa fa-envelope" aria-hidden="true"></i></div>
    			<div class="fr">
    					<input type="email" id="email" name="email" placeholder="Email address" class="textBox" required>
						<p id="emailError" class="formerror"></p>
    			</div>
    			<div class="clr"></div>
    		</div>
			<div class="box">
				<label for="province" class="fl fontLabel"></label>
				<div class="fl iconBox"><i class="fa fa-map" aria-hidden="true"></i></div>
				<div class="fr" id="province">
					<select name="province" class="province" required>
						<option value="" disabled selected>Select your province</option>
						<option value="bagmati">Bagmati</option>
						<option value="gandaki">Gandaki</option>
						<option value="karnali">Karnali</option>
						<option value="koshi">Koshi</option>
						<option value="lumbini">Lumbini</option>
						<option value="madhesh">Madhesh</option>
						<option value="sudurpashchim">Sudurpashchim</option>
					</select>
				</div>
				  <div class="box">
					<label for="City" class="fl fontLabel"> </label>
						  <div class="fl iconBox"><i class="fa fa-map-marker" aria-hidden="true"></i>
						  </div>
						  <div class="fr">
							<input type="text" id="city" name="city" placeholder="City / Village Name" class="textBox" required>
							<p id="addressError" class="formerror"></p>
						  </div>
						  <div class="clr"></div> 
					</div>
    	
    		<div class="box">
          <label for="password" class="fl fontLabel">  </label>
    			<div class="fl iconBox"><i class="fa fa-key" aria-hidden="true"></i></div>
    			<div class="fr">
    					<input type="password" id="pswd" name="password" placeholder="Password" class="textBox" required>
						<p id="pswdError" class="formerror"></p>
    			</div>
    			<div class="clr"></div>
    		</div>
			<div class="box">
				<label for="cpassword" class="fl fontLabel"> </label>
					<div class="fl iconBox"><i class="fa fa-key" aria-hidden="true"></i></div>
					<div class="fr">
					<input type="password" id ="cpswd" name="cPassword" placeholder=" Confirm Password" class="textBox" required>
						<p id="cpswdError" class="formerror"></p>
					  </div>
					  <div class="clr"></div>
				  </div>
    		
    		<div class="box" style="background: transparent">
    			<input type="Submit" name="Submit" class="submit" value="SUBMIT">
    		</div>
    		
      </form>
  </div>
  <script src="../register.js"></script>
</body> 
</html>