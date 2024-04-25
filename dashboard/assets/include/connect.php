<?php
		session_start();
        if(!isset($_SESSION["mob_num"]))
            header("Location:../login.php");
		$c=mysqli_connect("localhost","root","");
		mysqli_select_db($c,"carmate");

		$list=array(array("index.php","zmdi zmdi-car-wash material-icons-name","Car Services"),array("profile.php","zmdi zmdi-account material-icons-name","Edit Profile"),array("amc.php","zmdi zmdi-collection-item material-icons-name","Apply for AMC"),array("deals.php","zmdi zmdi-calendar-check material-icons-name","Today's Deals"),array("booked_services.php","zmdi zmdi-badge-check material-icons-name","Booked Services"),array("appointments.php","zmdi zmdi-time material-icons-name","Take Appointment"),array("cars.php","zmdi zmdi-car material-icons-name","Your Cars"),array("payments.php","zmdi zmdi-card material-icons-name","Your Payments"),array("cart.php","zmdi zmdi-shopping-cart material-icons-name","Selected Services"),array("logout.php","zmdi zmdi-power material-icons-name","Logout"));
    
    $curPageName = substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1);
    $data=mysqli_query($c,"select cus_id, f_name, s_name, email, city, pincode from customer where mob_num=".$_SESSION["mob_num"]);
    $data=mysqli_fetch_assoc($data);

    //icon icon-user
?>

<link href="https://dfm8vuuzt40ty.cloudfront.net/css/gzip/bootstrap.min.css.gz" rel="stylesheet prefetch" media="all">
<link href="https://dfm8vuuzt40ty.cloudfront.net/css/gzip/common1.4.min.css.gz" type="text/css" rel="stylesheet prefetch" media="all">
            <link rel="icon" href="../images/car.png" type="image/png"/>           
           <!--  <link media="all" href="https://fonts.googleapis.com/css?family=Alex+Brush:300,400,500,600,700&amp;display=swap" rel="stylesheet" type="text/css">
            <link media="all" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700&amp;display=swap" rel="stylesheet" type="text/css"> -->
            
            <!-- Custom Fonts -->
      <!--       <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.css" media="all"> -->
                    

        <!-- crisp.io --> 
    <!-- <script src="https://client.crisp.chat/l.js" async=""></script><link href="https://client.relay.crisp.chat" rel="dns-prefetch" crossorigin=""><link href="https://client.crisp.chat" rel="preconnect" crossorigin=""><script src="https://client.crisp.chat/static/javascripts/client.js?762ce15" type="text/javascript" async=""></script><link href="https://client.crisp.chat/static/stylesheets/client_default.css?762ce15" type="text/css" rel="stylesheet"> -->