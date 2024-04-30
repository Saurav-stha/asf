<?php
require_once "../database/database.php";

require_once "../mail/mailer.php";

require_once "../php/htmlFormat.php";

$token=bin2hex(random_bytes(16));

$tokenHash=hash("sha256",$token);

//Token expiry
$expiry=date("Y-m-d H:i:s",time()+60*10);

if(isset($_POST['submit']) && ($_SERVER["REQUEST_METHOD"]=="POST"))
{
    $email=$_POST['email'];
    $sql="UPDATE student SET reset_token_hash=?,
            reset_token_expires_at=?
            WHERE email=?";
    $stmt = mysqli_prepare($data, $sql);

    mysqli_stmt_bind_param($stmt,"sss",$tokenHash,$expiry,$email);

    mysqli_stmt_execute($stmt);
    if(mysqli_affected_rows($data))
    {
        if((isset($_SERVER['HTTPS'])) && $_SERVER['HTTPS']!='off'){
                        $protocol='https';
        }
        else
        {
            $protocol='http';
        }
        
        $template = "
        Click <a href=\"$protocol://" . $_SERVER['HTTP_HOST'] . "/student/resetPassword.php?token=$token\">here</a> 
        to reset your password";

        $subject="Password Reset";

        //Displaying an page of We have sent you a password reset link if email send succesfully.
        if(emailVerification($email,$template,$subject))
        {
            $subject="Check your Email";
            $text="We have sent you a password reset link. Please check your email.";
            $url="../student/login.php";
            echo htmlFormat($subject,$url,$text);
        
        }
        //Displaying an page of We apologize for the inconvenience if email not send
        else
        {
            $subject="Sorry";
            $text="We apologize for the inconvenience.";
            $url="../student/login.php";
            echo htmlFormat($subject,$url,$text);
        }
    }
}
else
{
    echo mysqli_error($data);
}
?>