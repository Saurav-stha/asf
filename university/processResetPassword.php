<?php

require_once "../database/database.php";

require_once "../php/htmlFormat.php";

if(isset($_POST['submit'])&& $_SERVER['REQUEST_METHOD']=="POST")
{

    $token=$_POST['token'];

    $token_hash=hash("sha256",$token);

    $sql="SELECT *FROM university WHERE reset_token_hash=?";

    $stmt=mysqli_prepare($data,$sql);

    mysqli_stmt_bind_param($stmt,'s',$token_hash);

    if(mysqli_stmt_execute($stmt))
    {

        $result=mysqli_stmt_get_result($stmt);

        $user=mysqli_fetch_assoc($result);
        
    }
    if(strlen($_POST['password']<8))
    {
        die("Password must be at least 8 characters");
    }
    if(!preg_match("/[a-z]/i",$_POST['password'])){
        die("Password must contain at least one letter");
    }
    if(!preg_match("/[0-9]/",$_POST['password']))
    {
        die("Password must contain at least one number");
    }
    if (strcmp($_POST['password'], $_POST['repassword']) != 0){
        die("Password and Confirm Password doesn't match!");
    }
    $password_hash=password_hash($_POST['password'],PASSWORD_DEFAULT);

    $sql1="UPDATE university
            SET password=?,
            reset_token_hash=NULL,
            reset_token_expires_at=NULL
            WHERE id=?";
    $stmt1=mysqli_prepare($data,$sql1);

    mysqli_stmt_bind_param($stmt1,'ss',$password_hash,$user['id']);

    if(mysqli_stmt_execute($stmt1))
    {
        $subject="Check Your Email";
        $text="We have updated your password";
        $url="unilogin.php";
        echo htmlFormat($subject,$url,$text);
    }
    else
    {
        $subject="Sorry";
        $text="Error in updating you password,try again";
        $url="unilogin.php";
        echo htmlFormat($subject,$url,$text);
    }
}
