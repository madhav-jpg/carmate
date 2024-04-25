<?php
        session_start();
        require 'assets/include/connect.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="irstheme">

    <title> CarMate </title>
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

        <!-- start of hero -->
        <section class="hero hero-static-image-2">
            <div class="container">
                <div class="row">
                    <div class="col col-md-6 col-sm-7">
                        <div class="slide-title">
                            <h2 align="center">One Stop Quality Solution for Car Maintenance</span></h2>
                        </div>
                        <div class="slide-subtitle">
                            <p style="text-align:justify"> Book your Car Services and Maintain your Cars to Make your journey hassle free. For your any Queries related to Cars CarMate is there Just book Car Services and let the Expert handle it. </p>
                        </div>
                        <div class="btns">
                            <a href="about.php" class="theme-btn">Learn More</a>
                        </div>
                    </div>
                    <div class="hero-image-2"></div>
                </div>
            </div>
        </section>
        <!-- end of hero slider -->


        <div class="hx-client-area">
            <div class="container">
                <div class="hx-client-item">
                    <div class="col-12">
                    <div class="section-title-s2 text-center">
                        <span>We Provides Car Services to</span>
                        <h2 id="services"> Multiple Brands of Car </h2>
                    </div>
                    </div>
                    <div class="Gift-carousel owl-carousel">
                        <?php
                        $i=1;
                        while ($i<=17) 
                        {
                            echo "<img src='assets/images/car_logo/".$i.".png'>";
                            $i++;
                        }
                        ?>
                    </div>
                </div>
            </div>
       </div>


        <!-- start of hero -->
        <section class="hero hero-static-image">
            <div class="container">
                <div class="row">
                    <div class="col col-md-6 col-sm-7">
                        <div class="slide-title">
                            <h2>We Ensure Your Safe<span> & Happy Journey</span></h2>
                        </div>
                        <div class="slide-subtitle">
                            <p>We offers cost-friendly repairs from best Car Service Providers so you won’t need to spend a lot to get your vehicle back on the road.</p><p> When Car dies in the middle of your journey and there's no Car Service Providers near you, CarMate is always there to help you. </p>
                        </div>
                        <div class="btns">
                            <a href="about.php" class="theme-btn-s2">Learn More</a>
                        </div>
                    </div>
                    <div class="hero-image"></div>
                </div>
            </div>
        </section>
        <!-- end of hero slider -->


        <!-- start about-section -->
        <section class="about-section">
            <div class="content-area">
                <div class="left-content">
                    <img src="assets/images/about/about-pic.png" alt>
                </div>
                <div class="right-content">
                    <div class="about-content">
                        <div class="section-title">
                            <span>About Our Company</span>
                            <h2>How We Can Help you</h2>
                        </div>
                        <div class="details">
                            <p>CarMate provides a way to book your Car Services of Multiple Brands and get Services of your Cars from Top Car Service Providers near to you.</p>
                            <p>With help of CarMate you can book and manage your multiple Cars anytime and from anywhere.</p>
                            <a href="about.php" class="theme-btn-s2">Learn more</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- end about-section -->


        <!--service area start -->
        <div class="service-style-1 section-padding">
            <div class="container">
                <div class="col-12">
                    <div class="section-title-s2 text-center">
                        <span>Which Car Services We Provides</span>
                        <h2 id="services">Provided types of Car Services</h2>
                    </div>
                </div>
                
                <div class="row">
                    <?php
                        
                        $q=mysqli_query($c,"select service_name,description,type from basic_services");
                        $i=1;
                        while ($row=mysqli_fetch_assoc($q)) {
                            echo "<div class='col-md-4 col-sm-6'>
                                    <div class='service-wrap'>
                                        <div class='service-icon";
                                        if($i>1)
                                                echo "-".$i;
                                        echo "'>";
                                          echo "  <i class='fi flaticon-".$row['type']."'></i>
                                        </div>";
                                        echo "<div class='service-text'>
                                            <h2>".$row['service_name']."</h2>
                                            <p>".$row['description']."</p>
                                        </div>  
                                    </div>
                                </div>";
                                $i++;
                        }
                    
                    ?>
                    
                </div>
            </div>
        </div>
        <!-- service area end -->
      
        
        <!-- start blog-section -->
        <section class="blog-section section-padding">
            <div class="container">
                <div class="row">
                    <div class="col col-xs-12">
                        <div class="section-title-s2 text-center">
                            <span>Our Blogs</span>
                            <h2>Important Tips for Your Cars</h2>
                        </div>                        
                    </div>
                </div>


    <?php
            
            $q=mysqli_query($c,"select a.author_name,b.blog_title,b.blog_id,b.blog_date from blog_authors a,blogs b where a.author_id=b.author_id");
             echo "<div class='row'>
                    <div class='col col-xs-12'>
                        <div class='blog-grids clearfix'>";
                        $i=1;
            while($r=mysqli_fetch_assoc($q)) 
            {
                echo "<div class='grid'>
                                <div class='entry-media'>
                                    <img src='assets/images/blog/img-".$i.".jpg' alt>
                                </div>";

                            echo "<div class='details'>
                                    <h3><a href='tips.php?blog=".$r['blog_id']."'>";
                                    echo $r['blog_title'];
                                    echo "</a></h3>";
                                    echo "<ul class='entry-meta'>
                                        <li>
                                            <img src='assets/images/blog/author.jpg' alt>";
                                            echo "By <a href='#'>";
                                               echo $r['author_name'];
                                            echo "</a>";
                                        echo "</li>";
                                        echo "<li>";
                                        echo $r['blog_date'];
                                        echo "</li>";
                                   echo" </ul>
                                </div>
                       </div>";
                       $i++;
            }
                       echo"</div>
                    </div>
                </div>";
                ?>
            

            </div> <!-- end container -->
        </section>
        <!-- end blog-section -->
      
       <?php
                require 'assets/include/footer.php';
        ?>
             <!-- .contact area end -->
        
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