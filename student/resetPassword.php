<?php

require_once "../database/database.php";

$token=$_GET['token'];

$token_hash=hash("sha256",$token);

$sql="SELECT *FROM student WHERE reset_token_hash=?";

$stmt=mysqli_prepare($data,$sql);

mysqli_stmt_bind_param($stmt,'s',$token_hash);

if(mysqli_stmt_execute($stmt))
{

    $result=mysqli_stmt_get_result($stmt);

    $user=mysqli_fetch_assoc($result);
    
    if($user===null)
    {
        die("Token not found");
    }

    if(strtotime($user['reset_token_expires_at'])<=time())
    {
        die("Token has expired");
    }
    
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
</head>
<body>
    <h1>Reset Password</h1>
    <form action="processResetPassword.php" method="POST">
        <input type="hidden" name="token" value="<?=htmlspecialchars($token)?>">
        <label for="password">New Password</label>
        <input type="password" name="password" id="password">
        <label for="repassword">Repeat Password</label>
        <input type="password" name="repassword" id="repassword">
        <button name="submit">Send</button>
    </form>
</body>
</html>