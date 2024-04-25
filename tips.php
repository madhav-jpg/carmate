<?php
    if(!isset($_GET['blog']))
        header("Location:404.html");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="irstheme">

    <title>Tips - CarMate</title>
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
                require 'assets/include/header.php';
         ?>


        <div class="service-page-style">
        <!-- start page-title -->
        <br>
        <br>
        <br>
        <br>
        <br>
        <!-- end page-title -->         
        

<br><br>

<?php
        require 'assets/include/connect.php';
        echo "<section class='about-section'>
            <div class='content-area'>
                <div class='left-content'>
                    <img src='assets/images/about/about-pic.png' alt>
                </div>
                <div class='right-content'>
                    <div class='about-content'>
                        <div class='section-title'>
                            <span>Must For A Good Car Care</span>";
                            $q=mysqli_query($c,"select blog_title,blog_sub from blogs where blog_id='".$_GET["blog"]."'");
                            $row=mysqli_fetch_assoc($q);
                           
                            echo "<h2>".$row['blog_title']."</h2>
                        </div>";
                    echo "<div class='details'>
                            <p>".
                            $row['blog_sub']."
                        </p>
                    </div>";
                        
                        
                   echo " </div>
                    </div>
                </div>
            </div>
        </section>";
                    
                    $q=mysqli_query($c,"select subtitle,blog_details from blog_text where blog_id='".$_GET["blog"]."'");
                            while($row=mysqli_fetch_assoc($q))
                            {


                        echo "<div class='details'>
                                    <h3><a href='#'>".
                                         $row['subtitle']."</a></h3>
                            </div>";
                        echo "<p>".
                            $row['blog_details']."
                        </p>";

                            }

                require 'assets/include/footer.php';
?>


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
