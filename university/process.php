<?php
require_once "../database/database.php";
// Check if the required parameters are received
if(isset($_POST['Verify']) && $_SERVER['REQUEST_METHOD']=="POST")
{
    // Retrieve POST parameters
    // echo "sth";
    $uniName = $_POST['uniName'];
    $email = $_POST['email'];
    $hashedPassword = $_POST['password'];
    $typedOtp=$_POST['typeOtp'];
    $generateOtp=$_POST['generateOtp'];

    if($typedOtp===$generateOtp)
    {
        $sql = "INSERT INTO university(uniName, email, password) VALUES (?, ?, ?)";
        $stmt = mysqli_prepare($data, $sql);

        mysqli_stmt_bind_param($stmt, "sss", $uniName, $email, $hashedPassword);
        if (mysqli_stmt_execute($stmt)) {
            // echo "sth";
            header("Location: unilogin.php");
        } else {
            echo "Error: " . mysqli_error($data);
        }
    }
    else
    {
       echo
        '<link rel="stylesheet" href="../css/otpform.css">
        <div class="overlay">
        <div class="popup">
            <h5>Invalid OTP </h5>
            <a href="./uniregister.php ><button  type="submit" name="Verify">Return</button></a>
           
        </div>
    </div>';
     
    }

    echo "Invalid request";
}

?>