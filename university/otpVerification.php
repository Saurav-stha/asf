<?php

    if(isset($_POST['Verify']) && $_SERVER['REQUEST_METHOD']=="POST")
    {
        require_once "../database/database.php";
        session_start();

        $otp=intval($_SESSION['otp']);
        $enteredOtp=intval($_POST['enteredOtp']);
        $uniName=$_SESSION['uniName'];
        $email=$_SESSION['email'];
        $hashedPassword=$_SESSION['hashedPassword'];

        if($otp===$enteredOtp)
        {
        
            $sql = "INSERT INTO university(uniName, email, password) VALUES (?, ?, ?)";
            $stmt = mysqli_prepare($data, $sql);

            mysqli_stmt_bind_param($stmt, "sss", $uniName, $email, $hashedPassword);
            if (mysqli_stmt_execute($stmt)) {
                header("Location: unilogin.php");
            } else {
                echo "Error: " . mysqli_error($data);
            }
        }
        else
        {
            echo '<script>
            alert("Invalid OTP");
            
            </script>';
        }

    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enter OTP</title>
    <link rel="stylesheet" href="../css/otpform.css">
</head>
<body>
<div class="overlay">
            <div class="popup">
                <h5>Check Your mail and enter the OTP below:</h5>
    <form method="POST" id="otpForm">
                <div>
                    <input type="text" name="enteredOtp" maxlength="6" required>
                </div>
                <button type="submit" name="Verify" id="hideButton">Submit</button>
    </form>
</div>
</div>
</body>
</html>