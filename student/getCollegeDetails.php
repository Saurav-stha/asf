<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>University Information</title>
<link rel="stylesheet" href="../css/collegeDetails.css">
</head>
<body>
<?php
        require_once "../database/database.php";
        session_start();
        if(isset($_GET['id']) && ($_SERVER['REQUEST_METHOD']=="GET"))
        {
            $id=intval($_GET['id']);
            $sql="SELECT * FROM universityInformation WHERE id=?";
            $stmt=mysqli_prepare($data,$sql);
            mysqli_stmt_bind_param($stmt,"i",$id);
        }
        else if(isset($_GET['name']) && ($_SERVER['REQUEST_METHOD']=='GET'))
        {
            $name=$_GET['name'];
            $sql="SELECT * FROM universityInformation WHERE name=?";
            $stmt=mysqli_prepare($data,$sql);
            mysqli_stmt_bind_param($stmt,"s",$name);
        }
        else
        {
            die("No id and name in get params");
        }

        if(mysqli_stmt_execute($stmt))
        {
            $result=mysqli_stmt_get_result($stmt);

            $user=mysqli_fetch_assoc($result);
            
        }
    ?>
    <nav>
        <a href="../index.php"><img id="logo" src="../images/logo.png" alt="UniBridgeLogo">
        </a>

        <ol class="nav-lists">
            <li href="#" class="navbar-item">Home</li>
            <li href="#" class="navbar-item">Programs</li>
            <li href="#" class="navbar-item">Events</li>
            <li href="#" class="navbar-item">News</li>
    </nav>
    <main>
    <h1>Institution Information</h1>
    <!-- ---------------------------------------------------------------------------------------------------- -->
    <section class="collegeInfo">
    <div class="logoAndName">
        <div class="logoContainer">
        <img src="../images/clzLogo/<?=$user['fileName'];?>" alt="University Logo">
        </div>
        <h2><?=$user['name'];?></h2> 
    </div>
    <table>
        <tr>
            <td class="infoTitle">Email  </td>
            <td class ="colon">:</td>
            <td class="value"><?=$user['aEmail'];?></td>
        </tr>
        <tr>
            <td class="infoTitle">Address  </td>
            <td class ="colon">:</td>
            <td class="value"><?=$user['address'];?></td>
        </tr>
        <tr>
            <td class="infoTitle">Contact Number  </td>
            <td class ="colon">:</td>
            <td class="value"><?=$user['phoneNumber'];?></td>
        </tr>
        <tr>
            <td class="infoTitle">University Type  </td>
            <td>:</td>
            <td class="value"><?=$user['uniType'];?></td>
        </tr>
        <tr>
            <td class="infoTitle">About Institution  </td>
            <td class ="colon">:</td>
            <td class="value"><?=$user['aboutUniversity'];?></td>
        </tr>
        <tr>
            <td class="infoTitle">Available Programs  </td>
            <td class ="colon">:</td>
            <td class="value"><?=$user['availablePrograms'];?></td>
        </tr>
        <tr>
            <td class="infoTitle">Scholarships  </td>
            <td class ="colon">:</td>
            <td class="value"><?=$user['scholarship'];?></td>
        </tr>
        <tr>
            <td class="infoTitle">Fee Structure  </td>
            <td class ="colon">:</td>
            <td class="value"><?=$user['feeStructure'];?></td>
        </tr>
    </table>
        <div class="button-container">
            <?php
                if (isset($_SESSION['studentId'])){
                    ?>
                    <form method="POST" action="./applyForm.php">
                        <button id="approval-button" class="approve">Apply Now</button>
                    </form>
                    <?php
                } else {
                    ?>
                    <form method="POST" action="./login.php">
                        <button id="approval-button" class="approve">Apply Now</button>
                    </form>
                <?php
                }
                ?>
        </div>
   
</section>
</main>
    <!-- ----------------------------------------------------------------------------------------------------- -->

</body>
</html>