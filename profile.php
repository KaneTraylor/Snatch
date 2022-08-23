<?php
    require_once ('database.php');
    
    if(isset($_SESSION['is_active']) && $_SESSION['is_active'] == 0){
        header('Location: register-confirm.php');
    }

    if( !isset($_SESSION['email']) ){
        header('Location: register.php');
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile - page</title>
    <!-- Bootstrap css link -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="components/css/custom.css">
    <link rel="stylesheet" href="components/css/profile.css">
</head>

<body>


    <section class="profileBox">
        <header class="text-center my-4 pb-3">
            <nav>
                <img src="components/images/blak logo.png" alt="logo">
            </nav>
            <p class="py-3 text-center"><a class="customLinkColor" href="logout.php">Logout</a></p>
        </header>

        <div class="container">
            <div class="earnBox">
                <div>
                    <div class="icon my-3">
                        <img src="components/images/giftbox.png" alt="Gift box">
                    </div>
                    <p class="earnTitle">Earn 1% back on loans</p>
                    <a href="#" class="customBtn rewardBtn" anim="ripple">Discover Snatch Rewards</a>
                </div>
                <div class="justify-content-end styleLetter">
                    <h3>
                        S
                    </h3>
                </div>
            </div>

            <div class="accountBox my-4">
                <div>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <div>
                    <b>Your Account Status is Current</b>
                    <p>Next payment due 8/30/2022</p>
                </div>
            </div>

            <div class="mt-4">
                <h3 class="heading">Boost Your Credit Health</h3>
                <hr>
            </div>

            <div class="pb-2">
                <p>Welcome to Snatch! Please be sure to make your monthly payments on-time to build positive payment
                    history</p>
                <p>Visit our <a class="customLinkColor" href="#">FAQs</a> to learn more.</p>
            </div>

            <div class="my-4 text-center">
                <h3 class="heading">Courses</h3>
                <p>Select a course to start your journey</p>
            </div>

            <div class="my-4 text-center">
                <h3 class="smallTitle">And if you scroll down here are the courses they offer in the format they offer
                    them:</h3>
                <hr>
            </div>

            <div class="couseContainer my-4">
                <div class="singleCourse">
                    <a href="#">
                        <h3>Personal Branding Path To Top 1% influencer Personal Brand</h3>
                        <div class="imageContainer">
                            <img src="components/images/course-1.jpg" alt="Course image">
                        </div>
                        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Pariatur quos eos veniam similique
                            recusandae! Adipisci, soluta ipsa! Assumenda, inventore repellat!</p>
                        <a href="#" class="customBtn courseBtn" anim="ripple">Buy this course</a>
                    </a>
                </div>
                <div class="singleCourse">
                    <a href="#">
                        <h3>Job Interview Skills, Interview Strategy & Answer Scripts</h3>
                        <div class="imageContainer">
                            <img src="components/images/course-2.jpg" alt="Course image">
                        </div>
                        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Pariatur quos eos veniam similique
                            recusandae! Adipisci, soluta ipsa! Assumenda, inventore repellat!</p>
                        <a href="#" class="customBtn courseBtn" anim="ripple">Buy this course</a>
                    </a>
                </div>
            </div>


        </div>




    </section>

    <!-- Jquery js link -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <!-- Bootstrap js link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"
        crossorigin="anonymous"></script>
    <!-- custom js code -->
    <script src="components/js-code/main.js"></script>
    <script src="components/js-code/custom.js"></script>
</body>

</html>