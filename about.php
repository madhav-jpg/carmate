<?php
        // require "assets/include/connect.php";
                                
        //     if(isset($_POST['contact_sb']))
        //     {
        //         $q="insert into contact values('".$_POST["name"]."',".$_POST["mob_num"].",'".$_POST["email"]."','".$_POST["subject"]."','".$_POST["note"]."')";
        //         if (mysqli_query($c,$q)) 
        //         {
        //             echo "<div class='alert alert-success alert-dismissible'>
        //                         <button type='button' class='close' data-dismiss='alert'>&times;</button>
        //                         <strong>Success !</strong> <a href='#'>We Noted Your Query, We will Contact you within a day</a>
        //                 </div><br>";
        //         }
        //         else
        //         {
        //             echo "<div class='alert alert-danger alert-dismissible'>
        //                         <button type='button' class='close' data-dismiss='alert'>&times;</button>
        //                         <strong>Sorry</strong> <a href='#'>Your Query not submitted, Please try again later</a>
        //                 </div><br>";
        //             echo mysqli_error($c);
        //         }
        //     }
        //     else
        //         echo mysqli_error($c);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="irstheme">

    <title>About - CarMate</title>
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
        <br><br><br><br><br><br>

        <!-- start about-section -->
        <section class="about-section">
            <div class="content-area">
                <div class="left-content">
                    <br><br>
                    <img src="assets/images/location.jpg" style="border-radius: 10px">
                </div>
                <div class="right-content">
                    <div class="about-content">
                        <div class="section-title">
                            <h2>About Our Company</h2>
                        </div>

                        <div class="details">
                            <p>CarMate provides a way to book your Car Services of Multiple Brands and get Services of your Cars from Top Car Service Providers near to you.</p>
                            <p>With help of CarMate you can book and manage your multiple Cars anytime and from anywhere.</p>
                        </div>

                        <div class="details">
                            <p>If you are peripatetic person, CarMate will best suit for you. You can get your Car Service done from where you are</p>
                            <p>CarMate provides option to book and get services done from best and near to you Car Service Workshops</p>
                        </div>
                        
                    </div>
                </div>
            </div>
        </section>
        <!-- end about-section -->

        <!-- start about-section -->
        <section class="about-section">
            <div class="content-area">
                
                <div class="left-content">
                    <div class="about-content">
                        <div class="section-title">
                            <br><br>
                            <h2>About Our Company</h2>
                        </div>
                        <div class="details">
                            
                            <p>Diagnostics of your car will give you the report that which part of your Car needs Maintenance</p>
                            <p>The Complete Car Maintenance will provide the complete check-up of your Car and Maintenance so that your Car does not die unexpectedly in the middle of your journey</p>
                        </div>
                        <div class="details">
                            <p>If you using your Car regularly, Annual Maintenance Contract will provide regular maintenance at intervals</p>
                            <p>With CarMate, you will get truely AMC Service as you can service your car from which workshop near you</p>
                        </div>
                    </div>
                </div>

                <div class="right-content">
                    <br><br>
                    <img src="assets/images/complete_service.jpg" style="border-radius: 10px; max-width: 80%">
                </div>
            </div>
        </section>
        <!-- end about-section -->

        
            

<br><br><br>
<!-- <section class="signup" style="max-width: 100%">
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
</section>-->

    <div class="hx-contact-grid-area section-padding">
        <div class="centered">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                    <div class="hx-contact-gd-wrap">
                        <div class="hx-contact-gd-icon">
                            <i class="fi flaticon-call"></i>
                        </div>
                        <div class="hx-contact-gd-text">
                            <h4>Call Us</h4>
                            <span>+91 70169 62649 </span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                    <div class="hx-contact-gd-wrap">
                        <div class="hx-contact-gd-icon">
                            <i class="fi flaticon-message"></i>
                        </div>
                        <div class="hx-contact-gd-text">
                            <h4>Mail Us</h4>
                            <span>madhavkotecha99@gmail.com</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                    <div class="hx-contact-gd-wrap">
                        <div class="hx-contact-gd-icon">
                            <i class="fi flaticon-placeholder"></i>
                        </div>
                        <div class="hx-contact-gd-text">
                            <h4>Any Query?</h4>
                            <span>
                    <a href="contact.php">Contact Us</a></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

   <!--  <section class="about-section" align="center">
            
            <div class="btns left-content">
                    <a href="contact.php" class="theme-btn">Contact Us</a>
            </div>
            <div class="btns left-content">
                    <a href="register.php" class="theme-btn">Register with Us</a>
            </div>

        </section> -->
    
    <?php
        require 'assets/include/footer_lg.php';
    ?>
</div>

<!-- All JavaScript files
    ================================================== -->
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