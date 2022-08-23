<?php
    require_once ('database.php');
    
    if(isset($_SESSION['is_active']) && $_SESSION['is_active'] == 1){
        header('Location: how-it-work.php');
    }

    if( !isset($_SESSION['email']) ){
        header('Location: register.php');
    }

    $errorMessage = "";
    if(isset($_POST) & !empty($_POST)){
        $email_verify_code = $database->sanitize($_POST['email_verify_code']);
        
        //Check Login
        $res = $database->check_login_details($email, $password);

        if($email_verify_code == $_SESSION['email_verify_code']){
            //Update Database Status
            if($database->make_user_active($_SESSION['id'])){
                header('LOCATION: how-it-work.php');
            }else{
                $errorMessage = "Unable To Make User Active!";
            }
            
        }else{
            $errorMessage = "The Entered OTP Code Does Not Matched!";
        }
    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify Page</title>
    <!-- Bootstrap css link -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="components/css/custom.css?v=1">
    <link rel="stylesheet" href="components/css/signup.css">
</head>
<body>
    


    <section class="customBox">
        <header class="text-center my-4 pb-3">
            <nav>
                <img src="components/images/blak logo.png" alt="logo">
            </nav>
        </header>
    
        <div class="container text-center">
            <div class="row">
                <div class="col-12 py-3">
                    <h2 class="customHeading">Verify your email</h2>

                    <p class="py-3 text-center">Check your email for a verification code.</p>

                   <div class="text-center mt-3">
                        <form class="cmxform" id="signupForm" method="POST" action="register-confirm.php">

                            <?php if(isset($errorMessage) && !empty($errorMessage)){ ?>
                                <div id="alertMsg">
                                    <p><?php echo $errorMessage; ?></p>
                                </div>
                            <?php } ?>

                            <div class="customForm">
                                <input required id="email" name="email_verify_code" type="text" class="form__input" placeholder=" " autocomplete="off">
                                <span class="form__label">Enter Code</span>
                                <p class="py-3 text-center">Didn’t get the code?<a class="customLinkColor" href="">Resend.</a></p>
                            </div>
                            
                            <div class="text-center py-3 mt-3">
                                <button type="submit" class="customBtn" anim="ripple">VERIFY EMAIL</button>
                            </div>
                        </form>
                    </div> 
    
                    <p class="py-3 text-center">
                        Need help? Reach out to us at <a class="customLinkColor" href="">support@snatchcredit.com</a>
                    </p>
                    
                </div>
            </div>
        </div>
    </section>



       
    <!-- Jquery js link -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <!-- Bootstrap js link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <!-- custom js code -->
    <script src="components/js-code/main.js"></script>
    <!-- form validation plugin link -->
    <script src="components/js-code/jquery.validate.min.js"></script>
    <script src="components/js-code/signup.js"></script>


</body>
</html>