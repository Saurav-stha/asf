<?php

require_once "../database/database.php";

require_once "../php/htmlFormat.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/unilanding.css" />
</head>
<body>
    <section class="container">
    <?php

        session_start();

        $sql="SELECT *FROM student WHERE id=?";

        $id=$_SESSION['studentId'];

        $stmt=mysqli_prepare($data,$sql);

        mysqli_stmt_bind_param($stmt,"i",$id);

        if(mysqli_stmt_execute($stmt))
        {
            $result=mysqli_stmt_get_result($stmt);
            $user=mysqli_fetch_assoc($result);
        }

    ?>
        <header>Fill out the Form Below</header>
       
        <form action="../php/apply.php" class="form" method="POST">
            
            <div class = "input-box">
                <label>Name</label>
                <input
                    type="text"
                    name="name"
                    placeholder="Full Name"
                    required
                   value="<?=$user['name'];?>"
                />
            </div>
            <div class="input-box ">
                <label>Address</label>
                <input
                    type="text"
                    name="address"
                    placeholder="Enter address"
                    required
                    value="<?=$user['city'] . " , "  . $user['province'] . " Province";?>"
                />
            </div>

            <div class="input-box">
                <label>Email Address</label>
                <input
                    type="text"
                    name="aEmail"
                    placeholder="Enter email address"
                    required  
                    value="<?=$user['email'];?>"
                />
            </div>

            <div class="column">
                <div class="input-box">
                    <label>Contact</label>
                    <input
                        type="text"
                        name="phoneNumber"
                        placeholder="Enter Contact number"
                        required
                    />
                </div>
            </div>
            <div class="input-box address">
                <div class="form-group">
                    <label>Academic Qualification</label>
                <textarea name="academicQualification" required>
                    
                </textarea>
                </div>
            </div>
            <button type="submit" name="applyStud">Apply</button>
        </form>
    
</body>
</html>