<?php
        require 'assets/include/connect.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>CarMate</title>
    <link rel="icon" href="assets/images/car.png" type="image/png"/>

    <?php
        require 'assets/include/link.php';
    ?>
</head>

<body>

    <div class="page-wrapper">

        <div class="preloader">
            <div class="lds-ripple">
                <div></div>
                <div></div>
            </div>
        </div>

        <?php
         require 'assets/include/header_dash.php';
        ?>
        <section class="sptb"> 
            <div class="container"> 
                <div class="row"> 
                 <!-- start error-404-section -->
        <section class="error-404-section section-padding">
            <div class="container">
                <div class="row">
                    <div class="col col-xs-12">
                        <div class="content clearfix">
                            <div class="error">
                                <img src="../assets/images/404.png" alt>
                            </div>
                            <div class="error-message">
                                <h3>Oops! Page Not Found!</h3>
                                <p>We’re sorry but we can’t seem to find the page you requested. This might be because you have typed the web address incorrectly.</p>
                                <a href="index.php" class="theme-btn-s2">Back to home</a>
                            </div>
                        </div>
                    </div>
                </div> <!-- end row -->
            </div> <!-- end container -->
        </section>  
        <!-- end error-404-section --> 


                </div> 
            </div> 
        </section> 

        <?php
            require 'assets/include/footer_dash.php';
        ?>
    </div>
</body>
</html>