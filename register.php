<?php
    require_once ('database.php');

    if(isset($_SESSION['email'])){
        if(isset($_SESSION['is_active']) && $_SESSION['is_active'] == 0){
            header('Location: register-confirm.php');
        }else if(isset($_SESSION['is_active']) && $_SESSION['is_active'] == 1){
            header('Location: how-it-work.php');
        }
    }

    $errorMessage = "";
    if(isset($_POST) & !empty($_POST)){
        $email = $database->sanitize($_POST['email']);
        $password = $database->sanitize($_POST['password']);
        
        //Check Duplicate
        $res = $database->check_duplicate($email);

        if($res == "NEW"){
            //Continue the Register Process
            $res = $database->register($email, $password);
            
            if($res){
                //Send Email Verify Code Here
                $EMAIL_TO = $email;

                $EMAIL_SUBJECT = 'Email Address Verification - OTP';

                $EMAIL_MESSAGE = "The email verification code is: " . $res;
                
                // To send HTML mail, the Content-type header must be set
                $HEARDERS  = 'MIME-Version: 1.0' . "\r\n";
                $HEARDERS .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

                // Additional headers
                $FROM = 'From: SNATCH <' . EMAIL_FROM . '>';
                $HEARDERS .= $FROM . "\r\n";

                // Send Mail
                if(mail($EMAIL_TO, $EMAIL_SUBJECT, $EMAIL_MESSAGE, $HEARDERS)){
                    //Redirect Toward OTP Page
                    $_SESSION['EMAIL'] = $email;
                    header('LOCATION: register-confirm.php');
                }else{
                    $errorMessage = "Send OTP Email Failed, Please Login and Try Again!";
                }

            }else{
                $errorMessage = "Failed to Register User due to some problem!";
            }
        }else{
            $errorMessage = "This Email Address Already Registered!";
        }
    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Snatch | Register</title>
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
                    <h2 class="customHeading">Set Up Your Profile</h2>

                    <div class="py-3 ">
                        <p class="text-center">Just a few more steps and you're ready to start improving your credit health.</p>
                        <p class="smallTxt mt-1">Already have an account? <a class="customLinkColor" href="login.php">Log in</a> .</p>
                    </div>
    

                   <div class="text-center mt-3">
                        <form class="cmxform" id="signupForm" method="POST" action="register.php">

                            <?php if(isset($errorMessage) && !empty($errorMessage)){ ?>
                                <div id="alertMsg">
                                    <p><?php echo $errorMessage; ?></p>
                                </div>
                            <?php } ?>

                            <div class="customForm">
                                <input id="email" name="email" type="email" class="form__input" placeholder=" " autocomplete="off">
                                <span class="form__label">Email</span>
                            </div>
                            <div class="customForm">
                                <div class="toggleFix">
                                    <input class="form__input" type="password" name="password" id="password" placeholder=" " autocomplete="off">
                                    <span class="form__label">Password</span>
                                    <div id="firsTtoggle" onclick="showHideFirst()"></div>
                                </div>
                            </div>
                            <div class="customForm">
                                   <div class="toggleFix">
                                        <input class="form__input" type="password" name="confirm_password" id="confirm_password" placeholder=" " autocomplete="off">
                                        <span class="form__label">Confirm Password</span>
                                        <div id="secondToggle" onclick="showHideSecond()"></div>
                                   </div>
                            </div>
                            <div class="text-center py-3 mt-3">
                                <button type="submit" class="customBtn" anim="ripple">Continue</button>
                            </div>
                        </form>
                    </div> 
    
                    <p class="py-3 text-center">By continuing, I agree to the snatch  <a class="customLinkColor" href="#">Privacy Policy</a> and <a class="customLinkColor" href="#">Terms of Use</a> </p>
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