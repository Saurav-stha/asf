<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link
            href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
            rel="stylesheet"
        />
        <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
            integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
            crossorigin="anonymous"
            referrerpolicy="no-referrer"
        />
        <title>Approval Page</title>
        <style>
            * {
                padding: 0;
                margin: 0;
                font-family: "poppins";
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
            nav img {
                height: 60px;
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
                padding: 25px;
                display: grid;
                grid-template-columns: 1fr 1.8fr;
                gap: 20px;
            }
            .left-container {
                height: fit-content;
            }
            .college-heading-info {
                padding: 10px;
                border-radius: 12px;
                box-shadow: 0px 3px 11px -3px rgba(0, 0, 0, 0.259);
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
                gap: 20px;
                margin-bottom: 10px;
            }
            .college-name {
                font-size: 2rem;
            }
            .college-address {
                text-align: center;
                font-size: 1.4rem;
            }

            .college-logo-container {
                text-align: center;
            }
            .college-logo-container img {
                height: 70px;
                object-fit: contain;
                padding: 5px;
            }
            #approval-button {
                cursor: pointer;
                border-radius: 10px;
                display: block;
                width: 100%;
                font-size: 1.5rem;
                padding: 0.2em 0.7em;
                font-weight: 500;
                color: #fff;
                border: none;
            }
            .approve {
                background-color: green;
            }
            .disapprove {
                background-color: red;
            }
            .right-container {
                padding: 10px;
                border-radius: 12px;
                box-shadow: 0px 3px 11px -3px rgba(0, 0, 0, 0.259);
            }
            table {
                padding: 20px;
                font-size: 1.3rem;
                border-spacing: 10px;
            }
            .infoTitle {
                padding-right: 20px;
            }
        </style>
    </head>
    <body>
        <nav>
            <a href="./admin.php">
                <img src="../images/logo2.png" alt="logo" />
            </a>

            <a href="../php/logout.php">
                <button class="logout-btn">Logout</button>
            </a>
        </nav>
        <main>
        <?php
            if(isset($_GET['id']) && $_SERVER['REQUEST_METHOD']=="GET")
            {
                require_once "../database/database.php";
                $id=intval($_GET['id']);
                $sql="SELECT *FROM universityInformation WHERE id=?";
                $stmt=mysqli_prepare($data,$sql);
                mysqli_stmt_bind_param($stmt,"i",$id);

                if(mysqli_stmt_execute($stmt))
                {
                    $result=mysqli_stmt_get_result($stmt);
                    $user=mysqli_fetch_assoc($result);
                }
            }
        ?>
            <section class="left-container">
                <div class="college-heading-info">
                    <div class="college-logo-container">
                        <img src="../images/uniprofile.jpg" alt="" />
                    </div>
                    <h1 class="college-name"><?=$user['name'];?></h1>
                    <p class="college-address"><?=$user['address'];?></p>
                </div>

                <form method="POST" action="../php/approve.php">
                    <input value="<?=$user['id'];?>" name="approveId" hidden>
                    <?php
                        if ($user['approve']){
                    ?>
                        <button type="submit" id="approval-button" name="approve" class="approve" disabled>Approved</button>
                    <?php
                        }else{
                    ?>
                        <button type="submit" id="approval-button" name="approve" class="approve">Approve</button>
                    <?php
                        }
                    ?>
                </form>
            </section>
            <section class="right-container">
                <table>
                    <tr>
                        <td class="infoTitle">Email</td>
                        <td class="colon">:</td>
                        <td class="value"><?=$user['aEmail'];?></td>
                    </tr>

                    <tr>
                        <td class="infoTitle">Contact Number</td>
                        <td class="colon">:</td>
                        <td class="value"><?=$user['phoneNumber'];?></td>
                    </tr>
                    <tr>
                        <td class="infoTitle">University Type</td>
                        <td>:</td>
                        <td class="value"><?=$user['uniType'];?></td>
                    </tr>
                    <tr>
                        <td class="infoTitle">About Institution</td>
                        <td class="colon">:</td>
                        <td class="value"><?=$user['aboutUniversity'];?></td>
                    </tr>
                    <tr>
                        <td class="infoTitle">Available Programs</td>
                        <td class="colon">:</td>
                        <td class="value"><?=$user['availablePrograms'];?></td>
                    </tr>
                    <tr>
                        <td class="infoTitle">Scholarships</td>
                        <td class="colon">:</td>
                        <td class="value"><?=$user['scholarship'];?></td>
                    </tr>
                    <tr>
                        <td class="infoTitle">Fee Structure</td>
                        <td class="colon">:</td>
                        <td class="value"><?=$user['feeStructure'];?></td>
                    </tr>
                </table>
            </section>
        </main>
        <script>
            // fetch("mysearch.php", {
            //     method: "POST",
            //     headers: {
            //         "Content-Type": "application/json",
            //     },
            //     body: JSON.stringify({
            //         text: txtLower,
            //     }),
            // })
            //     .then((response) => {
            //         console.log("Response status:", response.status);
            //         return response.text();
            //     })
            //     .then((data) => {
            //         if (data.includes("done")) {
            //             location.reload(true);
            //         }
            //     })
            //     .catch((error) => console.error("Error:", error));
        </script>
    </body>
</html>
