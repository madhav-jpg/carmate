<?php
		session_start();
        if (isset($_SESSION["mob_num"]))
                header("Location:dashboard");
		require 'assets/include/connect.php';
		
		if(isset($_POST["signup"]))
		{
			$mob_num=$_POST['mob_num'];
			$f_name=$_POST['f_name'];
			$s_name=$_POST['s_name'];
			$email=$_POST['email'];
			$city=$_POST['city'];
			$pincode=$_POST['pincode'];
			$is_exists=mysqli_query($c,"select cus_id from customer where mob_num=".$mob_num." or email='".$email."'");
			if(mysqli_num_rows($is_exists)!=false)
				$usr_exists="Mobile Number or Email is already linked with us";
			else if(($_POST['pass']==$_POST['re_pass'])&&(isset($_POST["agree-term"])))
			{
				$password=hash("sha256",$_POST['pass']);
				$ins="insert into customer(mob_num,f_name,s_name,email,city,pincode,password) values($mob_num,'$f_name','$s_name','$email','$city',$pincode,'$password')";
				if(mysqli_query($c,$ins))
				{
					setcookie("Registration","Successful",time()+5);
					$_SESSION["mob_num"]=$mob_num;
					header("Location:dashboard");
				}
			}
			else
			{
				if(!isset($_POST['agree-term']))
					$chk_err='Please agree the Terms and Conditions';
				if($_POST['pass']!=$_POST['re_pass'])
					$pass_err="Password not matched!";
			}
		}

	?>




<html>
<head>
	<link rel="stylesheet" href="background.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>



<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="irstheme">

    <title>Register - CarMate</title>
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

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">
    <style type="text/css">
    	.centered{
  margin: 0 auto;
  width: 80%;
}

@media screen and (min-width: 480px) {
    .centered{
          margin: 0 auto;
          width: 95%;
        }
 }

    </style>
</head>
<body>
	
	<br><br>

			<?php 
			require 'assets/include/header_lg.php';
			require 'assets/include/register_form.php';
			require 'assets/include/footer_lg.php';
			?>

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