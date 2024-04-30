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
        $studentId=intval($_GET['id']);
        $sql="SELECT *FROM student where id=?";
        $stmt=mysqli_prepare($data,$sql);
        mysqli_stmt_bind_param($stmt,"i",$studentId);
        if(mysqli_stmt_execute($stmt))
        {
            $result=mysqli_stmt_get_result($stmt);
            $user=mysqli_fetch_assoc($result);
        }
    ?>
    <div class="logoAndName">
        <h2><?=$user['name'];?></h2> 
    </div>
    <table>
        <tr>
            <td class="infoTitle">Email  </td>
            <td class ="colon">:</td>
            <td class="value"><?=$user['email'];?></td>
        </tr>
        <tr>
            <td class="infoTitle">Province  </td>
            <td class ="colon">:</td>
            <td class="value"><?=$user['province'];?></td>
        </tr>
        <tr>
            <td class="infoTitle">City </td>
            <td class ="colon">:</td>
            <td class="value"><?=$user['city'];?></td>
        </tr>
    </table>
</section>
    </main>
   
</body>

</html>