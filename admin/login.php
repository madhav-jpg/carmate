<?php
        session_start();
        if (isset($_SESSION["adm_num"]))
                header("Location:dashboard");
        if(isset($_POST["lg"]))
        {
           	require 'assets/include/connect.php';
            $mob_num=$_POST["mob_num"];
            $u_id=mysqli_query($c,"select password from admin where mob_num=".$mob_num);
            $data=mysqli_fetch_array($u_id);
            if($data!=null)
            {
                $_POST["pass"]=hash("sha256", $_POST["pass"]);
                if($data['password']==$_POST["pass"])
                {   
                    $_SESSION['adm_num']=$_POST['mob_num'];
                    header("Location:dashboard");
                }
                else
                {
                    $alert="Incorrect Mobile Number or Password !";
                }
            }
            else
                $alert="Your number not registered with us.";
        }
		
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="irstheme">

    <title>Login - CarMate</title>
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
    <div class="page-wrapper" >

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
            require "assets/include/header_lg.php";
         ?>
        <!-- end of header -->


        <br>

        
        


        <!-- Login Form Attachment -->
        <?php require 'assets/include/login_form.php'; ?>
        <!-- end Login-section --> 


        <!-- hx-site-footer-area start -->
       <?php require 'assets/include/footer_lg.php'; ?>
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