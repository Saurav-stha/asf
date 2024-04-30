<?php

    if(isset($_POST['Verify']) && $_SERVER['REQUEST_METHOD']=="POST")
    {
        require_once "../database/database.php";
        session_start();

        $otp=intval($_SESSION['otp']);
        $enteredOtp=intval($_POST['enteredOtp']);
        $name=$_SESSION['name'];
        $email=$_SESSION['email'];
        $city=$_SESSION['city'];
        $province=$_SESSION['province'];
        $hashedPassword=$_SESSION['hashedPassword'];

        if($otp===$enteredOtp)
        {
        
            $sql = "INSERT INTO student(name, email, province,city,hashedPassword) VALUES (?,?,?,?,?)";
            $stmt = mysqli_prepare($data, $sql);
            mysqli_stmt_bind_param($stmt, "sssss", $name, $email, $province,$city,$hashedPassword);

            if (mysqli_stmt_execute($stmt)) {
                header("Location: login.php");
            } else {
                echo "Error: " . mysqli_error($data);
            }
        }

        else
        {
             
            echo
        '<script>
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