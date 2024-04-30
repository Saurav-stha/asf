<?php
// ini_set('display_errors', 1);
// error_reporting(E_ALL);

session_start();

if (isset($_POST['uniLogin']) && ($_SERVER["REQUEST_METHOD"] == "POST") ) {
    require_once "../database/database.php";
    $email = $_POST['email'];
    $password = $_POST['uniPassword'];
    $remember=(isset($_POST['remember']))?$_POST['remember']:" ";
    //Using prepared Statement
    $sql = "SELECT * FROM university WHERE email=?";
    $stmt = mysqli_prepare($data, $sql);

    mysqli_stmt_bind_param($stmt,'s',$email);

    if(mysqli_stmt_execute($stmt))
    {
        $result=mysqli_stmt_get_result($stmt);

        $user=mysqli_fetch_assoc($result);

        if(password_verify($password,$user['password']))
        {
            $_SESSION['email']=$email;
            $_SESSION['universityId']=$user['uniId'];
            //If remember me is checked
            if(isset($_POST['remember']))
            {
                $remember=$_POST['remember'];
                //Remeber user for 7 days
                setcookie("rememberEmail",$email,time()+(3600247));
                setcookie("remember",$remember,time()+(3600247));
            }
            //If remember me isn't checked
            else
            {
                //Delete the cokkie by setting its expireation time in past
                setcookie("rememberEmail","",time()-3600);
                setcookie("remember","",time()-3600);
            }
            header("Location: ../php/landing-page.php");
        }
        else
        {
            echo "<script>alert('Incorrect password')</script>";
        }
    }
    else
    {
        echo "
        <script>
            Swal.fire({
                title: 'Error :(', 
                text: 'Please first register to login succesfully. Please try again..', 
                icon: 'error', 
                confirmButtonColor: 'gray', 
                confirmButtonText: 'OK' 
            }).then((result) => { 
                if (result.isConfirmed) { // Check if the confirmation button was clicked
                    window.location.href = './doUniRegistration.php'; // Redirect the user to '../index.php'
                }
            });
        </script>
        ";
    }

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UniBridge</title>
    <link rel="stylesheet" href="../css/unilogin.css" >
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@1,700&family=Merriweather:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" 
    href=
"https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	
</head>
<body>
    <div>
    
    <div class="navbar">
    <span >
        <a href="../index.php"><img class="logo"  src="../images/logo.png" alt="UniBridgeLogo" height="100px" width="100px"></a>
    </span>
    <span class="links">
                <a href="../index.php" class="navbar-item">Home</a>
                <a href="./doUniRegistration.php" class="navbar-item">Register</a>
                
    </span>

<div class="container">
<div class="content">
    <form action="#" method="post">
        <div class="login-field">
        <div class="email">
            <i class="fa fa-user icon"></i>
                <input type="text" name="email" id="input-field" required placeholder="Email"
                value=
                "<?php
                echo (isset($email))?$email:'';                
                ?>"
                >
           </div>
        <div class="password">
            <i class="fa fa-lock icon"></i>

            <input type="password" name="uniPassword" id="input-field" required placeholder="Password">
        </div>
  
        <div class="login-button-wrapper">
            <label class="switch">
                <input type="checkbox">
                
                <span class="slider round"></span>
              </label>
              <span class="list-login">Remember Me</span>
            <span>
            <button type="submit" name="uniLogin" class="login-button">Login</button>
        </div>
    </div>
        <div class="list-login-bottom">
            <span >
                <a href="forgotPassword.php" class="password-reset">Forgot Password?</a>
                
            </span>
            <span >
                <a href="#" class="help-section">Need Help?</a>
            </span>
        </div>
        <br>
        <div>
            <p id="createacc">Don't have an account?</p>
            <a  href="./doUniRegistration.php"  class="registration">
               Register Here</a>
        </div>   
    </form>
</div>
</div>
</body>
</html>