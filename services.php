<?php
        require 'assets/include/connect.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="irstheme">

    <title>Services - CarMate</title>
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

<!--     <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css"> -->
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link href="assets/css/pricing.css" rel="stylesheet">

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

        <!-- Start header -->
        <?php
        session_start();
            require 'assets/include/header.php';
        ?>
        <!-- end of header -->
        
<br>
<br>
<br>
<br>
        <div class="service-page-style">
        <!-- start page-title -->
        <section class="page-title">
            <div class="container">
                <div class="row">
                    <div class="col col-xs-12">
                        <h2>Our Services</h2>
                        <ol class="breadcrumb">
                            <li><a href="index.php">Home</a></li>
                            <li>Services</li>
                        </ol>
                    </div>
                </div> <!-- end row -->
            </div> <!-- end container -->
        </section>
        <!-- end page-title -->        
        
        <!-- pricing-area -->
        
        <div class="pricing-section">
            <div class="container">
                <div class="col-12">
                    <div class="section-title-s2 text-center">
                        <span>Best Pricing Plan</span>
                        <h2>Services Packages</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="tabs-site-button">
                            <div class="row pricing-tabs">
                                <div class="col-md-12 col-12">
                                    <ul class="nav nav-tabs">
                                        <li class="pricing-content-1"><a data-toggle="tab" href="#turbo"><i class="fi flaticon-turbo"></i></a></li>
                                        <li class="pricing-content-2"><a data-toggle="tab" href="#tyre"><i class="fi flaticon-tyre"></i></a></li>
                                        <li class="pricing-content-3"><a data-toggle="tab" href="#car-1"><i class="fi flaticon-car-1"></i></a></li>
                                        <li class="pricing-content-4"><a data-toggle="tab" href="#repair"><i class="fi flaticon-car-repair"></i></a></li>
                                        <li class="pricing-content-5"><a data-toggle="tab" href="#battery"><i class="fi flaticon-battery"></i></a></li>
                                        <li class="pricing-content-6"><a data-toggle="tab" href="#electricity"><i class="fi flaticon-electricity"></i></a></li>
                                    </ul>
                                </div>
                                <div class="col-md-12 col-12">
                                    <div class="tab-content">
                                        <?php 
                                            $q=mysqli_query($c,"select service_name,starting_price,description,type from basic_services");                                                  
                                        ?>
                                        <div id="turbo" class="tab-pane active">
                                            <div class="row">
                                                <div class="col-lg-12 col-md-12 col-12">
                                                    <div class="pricing-wrap">
                                                        <div class="pricing-single">
                                                            <div class="pricing-img">
                                                                <div class="pricing-text">
                                                                <?php
                                                                    $row=mysqli_fetch_assoc($q);
                                                                    echo "<span><small>₹</small>".$row['starting_price']."</span>
                                                                    <h4><a href='#'>".$row['service_name']."</a></h4>
                                                                    <p>".$row['description']."</p>";
                                                                ?>

                                                                </div>
                                                                <img src="assets/images/pricing/img-1.png" alt="">
                                                            </div> 
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="tyre" class="tab-pane">
                                            <div class="row">
                                                <div class="col-lg-12 col-md-12 col-12">
                                                    <div class="pricing-wrap">
                                                        <div class="pricing-single">
                                                            <div class="pricing-img-2">
                                                                <div class="pricing-text-1">
                                                                <?php
                                                                    $row=mysqli_fetch_assoc($q);
                                                                    echo "<span><small>₹</small>".$row['starting_price']."</span>
                                                                    <h4><a href='#'>".$row['service_name']."</a></h4>
                                                                    <p>".$row['description']."</p>";
                                                                ?>

                                                                </div>
                                                                <img src="assets/images/pricing/img-1.png" alt="">
                                                            </div> 
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>  
                                        </div>
                                        <div id="car-1" class="tab-pane">
                                            <div class="row">
                                                <div class="col-lg-12 col-md-12 col-12">
                                                    <div class="pricing-wrap">
                                                        <div class="pricing-single">
                                                            <div class="pricing-img-3">
                                                                <div class="pricing-text-2">
                                                                <?php
                                                                    $row=mysqli_fetch_assoc($q);
                                                                    echo "<span><small>₹</small>".$row['starting_price']."</span>
                                                                    <h4><a href='#'>".$row['service_name']."</a></h4>
                                                                    <p>".$row['description']."</p>";
                                                                ?>

                                                                </div>
                                                                <img src="assets/images/pricing/img-1.png" alt="">
                                                            </div> 
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>  
                                        </div>
                                        <div id="repair" class="tab-pane">
                                            <div class="row">
                                                <div class="col-lg-12 col-md-12 col-12">
                                                    <div class="pricing-wrap">
                                                        <div class="pricing-single">
                                                            <div class="pricing-img-4">
                                                                <div class="pricing-text-3">
                                                                <?php
                                                                    $row=mysqli_fetch_assoc($q);
                                                                    echo "<span><small>₹</small>".$row['starting_price']."</span>
                                                                    <h4><a href='#'>".$row['service_name']."</a></h4>
                                                                    <p>".$row['description']."</p>";
                                                                ?>

                                                                </div>
                                                                <img src="assets/images/pricing/img-1.png" alt="">
                                                            </div> 
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>  
                                        </div>
                                        <div id="battery" class="tab-pane">
                                            <div class="row">
                                                <div class="col-lg-12 col-md-12 col-12">
                                                    <div class="pricing-wrap">
                                                        <div class="pricing-single">
                                                            <div class="pricing-img-5">
                                                                <div class="pricing-text-4">                                                                
                                                                <?php
                                                                    $row=mysqli_fetch_assoc($q);
                                                                    echo "<span><small>₹</small>".$row['starting_price']."</span>
                                                                    <h4><a href='#'>".$row['service_name']."</a></h4>
                                                                    <p>".$row['description']."</p>";
                                                                ?>

                                                                </div>
                                                                <img src="assets/images/pricing/img-1.png" alt="">
                                                            </div> 
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>  
                                        </div>
                                        <div id="electricity" class="tab-pane">
                                            <div class="row">
                                                <div class="col-lg-12 col-md-12 col-12">
                                                    <div class="pricing-wrap">
                                                        <div class="pricing-single">
                                                            <div class="pricing-img-6">
                                                                <div class="pricing-text-5">
                                                                <?php
                                                                    $row=mysqli_fetch_assoc($q);
                                                                    echo "<span><small>₹</small>".$row['starting_price']."</span>
                                                                    <h4><a href='#'>".$row['service_name']."</a></h4>
                                                                    <p>".$row['description']."</p>";
                                                                ?>

                                                                </div>
                                                                <img src="assets/images/pricing/img-1.png" alt="">
                                                            </div> 
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>  
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!--pricing area-->
        <!-- pricing-area end -->
        <?php
                require 'assets/include/footer.php';
        ?>
        <!-- .hx-site-footer-area end -->
        </div>
    </div>
    <!-- end of page-wrapper -->



    <!-- All JavaScript files
    ================================================== -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <!-- Plugins for this template -->
    <script src="assets/js/jquery-plugin-collection.js"></script>

    <!-- Custom script for this template -->
    <script src="assets/js/script.js"></script>
</body>

</html>