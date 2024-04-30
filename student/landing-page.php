<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/landing-page.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>UniBridge</title>
</head>

<body>
    <nav>
        <a href="../index.php"><img id="logo" src="../images/logo.png" alt="UniBridgeLogo">
        </a>

        <ol class="nav-lists">
            <li href="#" class="navbar-item">Home</li>
            <li href="#" class="navbar-item">Programs</li>
            <li href="#" class="navbar-item">Events</li>
            <li href="#" class="navbar-item">News</li>
            <li>
               <?php
                    if (isset($_SESSION['studentId'])){
                ?>
                <a href="studentInfo.php?id=<?=$_SESSION['studentId'];?>">Profile</a>
                <?php
                    }else{
                    ?>
                    <a href="./login.php" id="popupBtn1">Login</p></a>
                    <?php
                    }
               ?>
            </li>
                
                <div class="search">
                    <form action="../php/searchCollege.php" method="POST">
                        <input id="searchbox" type="text" placeholder="Search Colleges..." name="search">
                        <button type="submit" name="submit">
                            <i class="fa fa-search" id="search-btn" style="font-size: 18px;"></i>
                        </button>
                    </form>
                </div>
            </li>

        </ol>
    </nav>
    <section class="featured-colleges">
        <h2>Featured Colleges</h2>
        <div class = "college-cardlist">
        <?php

            require_once "../database/database.php";
            $sql="SELECT * FROM universityInformation";

            $result=mysqli_query($data,$sql);

            while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){

        ?>
       
            <div class="collegecard">
            <a href="./getCollegeDetails.php?id=<?=$row['id'];?>">
                <img src="../images/clzLogo/<?=$row['fileName'];?>" class="collegelogo">
                <p class="college-name"><?=$row['name'];?></p>
                <p class="college-location"><?=$row["address"];?></p>
            </a>
            </div>
        
        <?php } ?>
        </div>
    </section>
</body>

</html>