<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UniBridge</title>
    <link rel="stylesheet" href="./css/styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">


</head>
<body>
    <section class="header">
        <nav>
            <a href="index.php"><img class="logo" src="images/logo2.png" alt=""></a>
            <div class="nav-links">
               
                <ul>
                    <li><a href="./index.php">HOME</a></li>
                    <li><a href="#about">ABOUT</a></li>
                    <?php
                     if (!isset ($_SESSION)) session_start();
                     if (!isset($_SESSION['email'])){
                    ?>
                    <li><a id="popupBtn1" href="./student/login.php">LOGIN</p></a></li>

                        <div id="mypopup1" class="popup">
                            <!-- Popup content -->
                            <div class="popup-content">
                                <div class="popup-header">
                                    <span class="close1">&times;</span>
                                    <h2>Choose a field:</h2>
                                </div>
                                <div class="popup-body">
                                    <p id="selectopt">Select Your Role:</p>
                                    
                                </div>
                                <div class="popup-footer">
                                   <a href="./university/unilogin.php"> <button>University</button></a>
                                 <a href="./student/login.php"><button>Student </button></a>   
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                    else{

                        ?>
                       <li><a href="./student/logout.php" id="popupBtn1" onclick="popup('mypopup1','popupBtn1','close1')">LOGOUT</p></a></li>
                        <?php

                    }
                    ?>
                    
                    
                </ul>
            </div>
         
        </nav>
        <div class="text-box">
            <!-- ?php
                if (!isset ($_SESSION)) session_start();
                if (!isset($_SESSION['email'])){
            ?> -->
            <h1><b>UniBridge</b></h1>
            <p>Connecting universities and students across the Nepal <br>enhancing collaboration, networkind and university studies.</p>
            <!-- <a href="#" class="hero-btn" id="popupBtn" onclick="popup('mypopup','popupBtn','close')"> Get Started</a> -->
            <a href="./student/landing-page.php" class="hero-btn"> Browse Colleges </a>

                <div id="mypopup" class="popup">
                    <!-- Popup content -->
                    <div class="popup-content">
                        <div class="popup-header">
                            <span class="close">&times;</span>
                            <h2>Choose a field:</h2>
                        </div>
                        <div class="popup-body">
                            <p id="selectopt">Select Your Role:</p>
                            
                        </div>
                        <div class="popup-footer">
                           <a href="./university/unilogin.php"> <button>University</button></a>
                         <a href="./student/login.php"><button>Student </button></a>   
                        </div>
                    </div>
                </div>
            <!-- ?php
                
                else{

                        ?>
                        <h1><b>Welcome To Uni-Bridge</b></h1>
                         <p>"Your Gateway to Infinite Possibilities!"</p>
                        <a href="./php/landing-page.php" class="hero-btn"> Browse Colleges </a>
                        ?php

                    }
                    ?> -->
            
        </div>
    </section>
    <section class="course">
        <h1>What We Offer</h1>
        <p>"Your Gateway to Infinite Possibilities!"</p>
        <div class="row">
            <div class="course-col">
                <h3>Navigating Futures</h3>
                <p>Embark on a journey of discovery with UniBridge, where the future begins and dreams take flight. We understand that choosing the right path after high school can be a daunting task, and that's where UniBridge steps in as your trusted companion.</p>

            </div>
            <div class="course-col">
                <h3>Explore Boundless Horizons</h3>
               <p> At UniBridge, we believe in empowering high school students to explore the vast landscape of academic opportunities awaiting them.  Uncover the wealth of bachelor programs offered by renowned universities and colleges around the country. Your journey towards higher education starts here, where possibilities are as limitless as your aspirations.</p>
            </div>

            
            <div class="course-col">
                <h3>Bridging Dreams and Realities</h3>
                <p> Our mission is to bridge the gap between ambition and achievement. UniBridge acts as the catalyst that connects you to universities and colleges, providing invaluable insights into bachelor programs, campus life, and the vibrant communities that shape your academic experience. No dream is too big when UniBridge is by your side.</p>
            </div>
           
        </div>

    </section>
    <!-- ----------Universities--------- -->
    <section class="campus">
    <?php
                     if (!isset ($_SESSION)) session_start();
                     if (!isset($_SESSION['email'])){
                    ?>
        <h1>Explore universities and Colleges</h1>
        <?php
                    }
                    else{

                        ?>
                    <h1>Featured Universities and Colleges</h1>
                        <?php

                    }
                    ?>
        <p>Persue your dream career in top and renowned universities and colleges.</p>
        <div class="row">
            <div class="campus-col">
                <img src="images/KU.jpg" alt="">
                <div class="layer"><h3>Kathmandu University</h3></div>

            </div>
            <div class="campus-col">
                <img src="images/TU.jpg" alt="">
                <div class="layer"><h3>Tribhuvan university</h3></div>

            </div>
            <div class="campus-col">
                <img src="images/icp.jpg" alt="">
                <div class="layer"><h3>Informatics College</h3></div>

            </div>
        </div>
    </section>
    <!-- ---------Facilities---------- -->
    <scetion class="facilities">
        <h1>Our Facilities</h1>
        <p>Uni-Bridge  provide a variety of facilities and features to enhance the user experience for both students and universities.</p>
        <div class="row">
            <div class="facilities-col">
                <img src="images/uniprofile.jpg" alt="">
                <h3>University Profiles</h3>
                <p>Detailed profiles for each university, including information on courses offered, admission criteria, faculty, campus facilities, and more.</p>

            </div>
            <div class="facilities-col">
                <img src="images/admission.jpg" alt="">
                <h3>Admission Criteria</h3>
                <p>A clear breakdown of the admission requirements for each university and course, including minimum GPA, standardized test scores, application deadlines, and additional documents needed for the application process</p>

            </div>
            <div class="facilities-col">
                <img src="images/customize.jpg" alt="">
                <h3>Customizable Platform</h3>
                <p> The system can be customizable to the needs and branding of each university, allowing them to tailor the information and features they want to showcase to prospective students.</p>

            </div>
        </div>
    </scetion>


    <section id="about" style="text-align:center">
        <h2>About</h2>
        <p>Welcome to UniBridge, your centralized destination for comprehensive information about universities, courses, admission criteria, and campus updates. We understand that navigating the higher education landscape can be overwhelming, and our mission is to simplify this process for students, parents, and educators alike.At UniBridge, we aggregate data from various universities and educational institutions, providing users with a one-stop platform to explore and compare different universities and academic programs. Our goal is to empower individuals with the knowledge they need to make informed decisions about their educational journey.Whether you're researching potential universities, comparing courses, or staying updated on the latest campus news, UniBridge is here to support you every step of the way. Our user-friendly interface and comprehensive database ensure that you have access to the information you need, whenever you need it.</p>
        <p style="margin-bottom:20px;">Join us on UniBridge and embark on your journey towards higher education with confidence. Let us help you bridge the gap between your aspirations and academic success.</p>
    </section>
    <script>
        function popup(popupId, popupBtnId, closeBtnId ){
        var popup = document.getElementById(popupId);
        
        var btn = document.getElementById(popupBtnId);
        
        var closeb = document.getElementsByClassName(closeBtnId)[0];
        
        btn.onclick = function () {
            popup.style.display = "block";
        }
        
        closeb.onclick = function () {
            popup.style.display = "none";
        }
        
        window.onclick = function (event) {
            if (event.target == popup) {
                popup.style.display = "none";
            }
        }
}
    </script>
</body>
</html>