<?php

require_once "../database/database.php";

require_once "../mail/mailer.php";

session_start();

$otp=mt_rand(10000,999999);

//Checking provided email exist or not in database
function emailExist($data,$email)
{
    if(filter_var($email,FILTER_VALIDATE_EMAIL)===false)
    {
        echo "<script>Please enter a valid email</script>";
    }
    else
    {
        $sql="SELECT *FROM university WHERE email='$email'";
        $stmt=mysqli_query($data,$sql);
        $user=mysqli_fetch_assoc($stmt);
        return $user;    
    }
}

//Storing the univeristy data like name, email,location and password in variable and send the email verification to entered email
if (isset($_POST['Submit']) && $_SERVER["REQUEST_METHOD"]=="POST") {
    $uniName = mysqli_real_escape_string($data, $_POST['uniName']);
    $email = mysqli_real_escape_string($data, $_POST['email']);
    $password = mysqli_real_escape_string($data, $_POST['password']);
    $cpassword = mysqli_real_escape_string($data, $_POST['cpassword']);

    //Checking user already exist or not
    if(emailExist($data,$email))
    {
        echo "<script>alert(Email already exist)</script>";
        header("Location: unilogin.php");
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
        <p>Your OTP is " .$otp. ".Enter the provided otp</p>"; 

        $subject="Email Verification from <b>UniBridge</b>";

        $emailSend=emailVerification($email,$mailTemplate,$subject);  

        if($emailSend)
        {
            $_SESSION['otp']=$otp;
            $_SESSION['uniName']=$uniName;
            $_SESSION['email']=$email;
            $_SESSION['hashedPassword']=$hashedPassword;

            header("Location: otpVerification.php");
        }
        else
        {
            echo "<script>alert('Email Not Send')</script>";
        }

    }
}

?>