<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/unilanding-page.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/boxicons/2.1.0/css/boxicons.min.css"
        integrity="sha512-pVCM5+SN2+qwj36KonHToF2p1oIvoU3bsqxphdOIWMYmgr4ZqD3t5DjKvvetKhXGc/ZG5REYTT6ltKfExEei/Q=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
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
        </ol>
    </nav>
    <main>
<section class="collegeInfo">
    <?php
        require "../database/database.php";
        session_start();
        $sql="SELECT *FROM universityInformation where id=?";
        $stmt=mysqli_prepare($data,$sql);
        mysqli_stmt_bind_param($stmt,"i",$_SESSION['uniInfoId']);
        if(mysqli_stmt_execute($stmt))
        {
            $result=mysqli_stmt_get_result($stmt);
            $user=mysqli_fetch_assoc($result);
        }
    ?>
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
   

    <div class="buttonContainer">
    <form action="../html/unilanding.php" method="POST">
        <button type="submit" name="edit">Edit</button>
    </form>
    </div>
</section>

    </main>
   
</body>

</html>