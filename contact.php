<?php
        require "assets/include/connect.php";
                                
            if(isset($_POST['contact_sb']))
            {
                $q="insert into contact values('".$_POST["name"]."',".$_POST["mob_num"].",'".$_POST["email"]."','".$_POST["subject"]."','".$_POST["note"]."')";
                if (mysqli_query($c,$q)) 
                {
                    echo "<div class='alert alert-success alert-dismissible'>
                                <button type='button' class='close' data-dismiss='alert'>&times;</button>
                                <strong>Success !</strong> <a href='#'>We Noted Your Query, We will Contact you within a day</a>
                        </div><br>";
                }
                else
                {
                    echo "<div class='alert alert-danger alert-dismissible'>
                                <button type='button' class='close' data-dismiss='alert'>&times;</button>
                                <strong>Sorry</strong> <a href='#'>Your Query not submitted, Please try again later</a>
                        </div><br>";
                    echo mysqli_error($c);
                }
            }
            else
                echo mysqli_error($c);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="irstheme">

    <title>Contact Us - CarMate</title>
    <link rel="icon" href="assets/images/car.png" type="image/png"/>
    
    <link href="assets/css/themify-icons.css" rel="stylesheet">
    <link href="assets/css/font-awesome.min.css" rel="stylesheet">
    <link href="assets/css/flaticon.css" rel="stylesheet">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/animate.css" rel="stylesheet">
    <link href="assets/css/owl.carousel.css" rel="stylesheet">
    <link href="assets/css/owl.theme.css" rel="stylesheet">
    <link href="assets/css/slick.css" rel="stylesheet">
    <link href="assets/css/slick-theme.css" rel="stylesheet">
    <link href="assets/css/owl.transitions.css" rel="stylesheet">
    <link href="assets/css/jquery.fancybox.css" rel="stylesheet">
    <link href="assets/css/odometer-theme-default.css" rel="stylesheet">
    <link href="assets/css/jquery.bxslider.min.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/responsive.css" rel="stylesheet">

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">
    
</head>

<body>
    <!-- start page-wrapper -->
    <div class="page-wrapper">

        <!-- start preloader -->
        <div class="preloader">
            <div class="lds-ripple">
                <div></div>
                <div></div>
            </div>
        </div>
        <!-- end preloader -->


         <?php
        require 'assets/include/header_lg.php';
        ?>
<br><br><br><br><br>
<section class="signup" style="max-width: 100%">
    <div class="container">
        <div class="signup-content">
                    <div class="signup-form">
                            <h2>Contact Us</h2>
                              <br>
                                <form method="POST" class="register-form" id="register-form">
                                    <div class="form-group">
                                        <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                        <input type="text" name="name" id="name" placeholder="Your Name" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="mob_num"><i class="zmdi zmdi-smartphone-android material-icons-name"></i></label>
                                        <input type="text" name="mob_num" id="mob_num" placeholder="Mobile Number" required>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="email"><i class="zmdi zmdi-email material-icons-name"></i></label>
                                        <input type="email" name="email" id="email" placeholder="Email Address" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="name"><i class="zmdi zmdi-comment-alt material-icons-name"></i></label>
                                        <input type="text" name="subject" id="subject" placeholder="Subject" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="email"><i class="zmdi zmdi-format-align-left material-icons-name"></i></label>
                                        <textarea name='note' id='note' placeholder='Description...' rows="5" cols="34"></textarea>
                                    </div>
                                   
                                   <div class="form-group form-button">
                                        <input type="submit" name="contact_sb" id="contact_sb" class="form-submit" value="Send Message"/>
                                    </div>
                                </form>
                    </div>
                    <div class="signin-image">
                        <figure><img src="assets/images/contactus.jpg" alt="Contact Us"></figure>
                        
                    </div>                
        </div>
    </div>
</section>

<?php
        require 'assets/include/footer_lg.php';
?>

 <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <!-- Plugins for this template -->
    <script src="assets/js/jquery-plugin-collection.js"></script>

    <!-- Custom script for this template -->
    <script src="assets/js/script.js"></script>

    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>

</body>
</html>