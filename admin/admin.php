<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Document</title>
    <style>
        * {
            padding: 0;
            margin: 0;
            font-family: 'poppins';
        }

        body {
            background-color: rgba(222, 222, 222, 0.2);
        }

        nav {
            padding: 15px 30px;
            background-color: #fff;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        nav img{
            height: 80px;
            object-fit: contain;
            border-radius: 100px;
        }

        .logout-btn {
            cursor: pointer;
            font-size: 1.1rem;
            border-radius: 40px;
            padding: 0.3em 0.9em;
            border: 2px solid blue;
            background-color: #fff;
            color: blue;
            font-weight: 500;
        }

        main {
            padding: 20px;
        }

        h1 {
            padding-left: 10px;
        }

        h2 {
            text-align: center;
        }

        .college-list {
            margin-top: 20px;
            padding: 10px;
            display: grid;
            grid-template-columns: 1fr 1fr 1fr;
            gap: 10px;
        }

        .college-card {
            padding: 10px 15px;
            border-radius: 10px;
            background-color: #fff;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: 15px;
            position: relative;
            box-shadow: 0px 3px 11px -3px rgba(0, 0, 0, 0.259);

        }

        .college-logo-container {
            margin-top: 20px;
        }

        .college-logo-container img {
            display: block;
            height: 100px;
            object-fit: contain;
        }

        .actions {
            display: flex;
            gap: 20px;
            font-size: 1.3rem;
        }

        .college-approval {
            position: absolute;
            top: 10px;
            right: 10px;
            border-radius: 40px;
            padding: 0.4em 0.8em;
            color: white;
        }

        .approved {
            background-color: green;
        }

        .unapproved {
            background-color: red;
        }
    </style>
</head>

<body>
    <nav>
        <img src="../images/logo2.png" alt="logo">
        <a href="../php/logout.php">
        <button class="logout-btn">Logout</button>
    </a>
    </nav>
    <main>
        <h1>
            Colleges
        </h1>
        <section class="college-list">
            <?php
                require_once "../database/database.php";

                $sql="SELECT * FROM universityinformation";

                $result=mysqli_query($data,$sql);

                while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){

            ?>
            <!-- -------------------------------colege other dummy------------------------------- -->
            <div class="college-card">
                <div class="college-logo-container">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRRtOCoXq8Tu6A11DXToQmvJ9Jg7uKCPzaJB-Lurf_lEQ&s"
                        alt="college-logo">
                </div>
                <h2 class="college-name"><?=$row['name'];?></h2>
                <p class="college-address"><?=$row['address'];?></p>
                <p class="actions">
                    <a href="approval-page.php?id=<?=$row['id'];?>"><i class="fa-solid fa-magnifying-glass-plus" style="color:blue"></i></a>
                    <!-- <a href="" class="delete"><i class="fa-solid fa-trash" style="color:red"></i></a> -->
                    <form action="../php/deleteColl.php" method="POST">
                        <input name="deleteCollId" value="<?=$row['id'];?>" hidden>
                        <button type="submit" class="delete" name="deleteColl"><i class="fa-solid fa-trash" style="color:red"></i></button>
                    </form>
                </p>
                <?php
                if ($row['approve']){
                    ?>
                <span class="college-approval approved">Approved</span>
                <?php
                }else{
                ?>
                <span class="college-approval unapproved">Unapproved</span>
                <?php
                }
                ?>
            </div>
            <?php
                }
            ?>
            <!-- -------------------------------colege other dummy------------------------------- -->
        </section>
    </main>
    <script>
    
    const btn=documnet.querySelector("delete");
    fetch("deleteUniveristy.php", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
            },
            body: JSON.stringify({
                text: txtLower,
            }),
            })
                .then((response) => {
                    console.log("Response status:", response.status);
                    return response.text();
                })
                .then((data) => {
                    if (data.includes("done")) {
                        location.reload(true);
                    }
                })
                .catch((error) => console.error("Error:", error));
    
    </script>
</body>

</html>