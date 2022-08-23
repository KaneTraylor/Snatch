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
    <title>How it work</title>
    <!-- Bootstrap css link -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="components/css/custom.css">
</head>
<body>


<section class="customBox">
    <header class="text-center my-4 pb-3">
        <nav>
            <img src="components/images/blak logo.svg" alt="logo">
        </nav>
    </header>

    <div class="container text-center">
        <div class="row">
            <div class="col-12 py-3">
                <h2 class="customHeading">How To Build Credit Health With Kovo</h2>

                <p class="py-3 text-left">1. Apply for Kovo Monthly Installments to purchase Kovo Grow - a curated set of courses delivered by creators with subject matter expertise.</p>

                <img class="customImg" src="components/images/handshake.svg" alt="Handshake">

                <p class="py-3 text-left">2. You pay $10/mo for 24 months with Kovo Monthly Installments. 0% APR. $0 fees. No credit check.</p>

                <img class="customImg" src="components/images/path.svg" alt="path">

                <p class="py-3 text-left">3. Build your credit health and positive payment history by making on-time payments.</p>

                <img class="customImg" src="components/images/credit-history.svg" alt="credit credit-history">
                <h2 class="customHeading">What You Get</h2>

                <p class="py-3 text-left">Kovo is a new way to build your credit health. You can learn more by visiting our <a class="customLinkColor" href="#"> FAQs</a>.</p>

                <div class="py-3 text-left">
                    <p>Starting today you can get:</p>
                    <p>✅ 24-month contract with Kovo</p>
                    <p>✅ $10 monthly installment plan</p>
                    <p>✅ Access to online courses</p>
                    <p>✅ Ability to build your credit health</p>
                    <p>✅ No hidden fees</p>
                </div>

                <div class="py-3 text-left">
                    <p>We don’t offer any of the following:</p>
                    <p>❌ Cash Loan</p>
                    <p>❌ Payday Advance</p>
                    <p>❌ Credit Card</p>
                    <p>❌ Secured Card</p>
                    <p>❌ Savings Account</p>
                </div>

                <div class="text-center py-3">
                    <a href="apply.php" class="customBtn" anim="ripple">Apply</a>
                </div>

                <p class="py-3 text-left">You can buy Kovo Grow without Kovo Monthly Installments by making an upfront payment of $240 <a class="customLinkColor" href="#">here</a>.</p>
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
</body>
</html>