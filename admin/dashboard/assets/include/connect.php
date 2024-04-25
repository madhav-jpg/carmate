<link rel="icon" href="assets/images/con.png">
<?php
		session_start();
        if(!isset($_SESSION["adm_num"]))
            header("Location:../login.php");
		$c=mysqli_connect("localhost","root","");
		mysqli_select_db($c,"carmate");

		$data=mysqli_query($c,"select f_name, s_name, email, type, wshop_no from admin where mob_num=".$_SESSION["adm_num"]);
    	$data=mysqli_fetch_assoc($data);
    	// $wshop_details=mysqli_query($c,"select name from workshops where wshop_no=".$data['wshop_no']);
    	// $wshop_details=mysqli_fetch_assoc($wshop_details);
    	if($data['type']=='Superuser')
    	{
    		$list=array(array("index.php","zmdi zmdi-time material-icons-name","Today's Appointments"),array("add_admin.php","zmdi zmdi-plus material-icons-name","Add Admin"),array("add_wshop.php","zmdi zmdi-plus material-icons-name","Add Workshop"),array("queries.php","zmdi zmdi-alert-circle-o material-icons-name","View Queries"),/*array("add_deals.php","zmdi zmdi-calendar-check material-icons-name","Add Deals"),*/array("profile.php","icon icon-user","Edit Profile"),array("payments.php","icon icon-credit-card","Payments Received"),array("logout.php","icon icon-power","Logout"));
            $sites=array("index.php","add_admin.php","add_wshop.php","queries.php",/*"add_deals.php",*/"profile.php","payments.php","logout.php");
    		$adm_type=array("Owner","Manager","Mechanic","Superuser");
    		$wshop=mysqli_query($c,"select wshop_no,name from workshops");
    	}
    	elseif($data['type']=='Owner')
    	{
    		$list=array(array("index.php","zmdi zmdi-time material-icons-name","Today's Appointments"),array("add_admin.php","zmdi zmdi-plus material-icons-name","Add Employees"),array("add_deals.php","zmdi zmdi-calendar-check material-icons-name","Add Deals"),array("profile.php","icon icon-user","Edit Profile"),array("logout.php","icon icon-power","Logout"));
            $sites=array("index.php","add_admin.php","add_deals.php","profile.php","logout.php");
    		$adm_type=array("Owner","Manager","Mechanic");
    		$wshop=mysqli_query($c,"select wshop_no,name from workshops where wshop_no=".$data['wshop_no']);
    	}
    	elseif($data['type']=='Manager')
    	{
    		$list=array(array("index.php","zmdi zmdi-time material-icons-name","Today's Appointments"),array("add_admin.php","zmdi zmdi-plus material-icons-name","Add Employees"),array("profile.php","icon icon-user","Edit Profile"),array("logout.php","icon icon-power","Logout"));
            $sites=array("index.php","add_admin.php","profile.php","logout.php");
    		$adm_type=array("Mechanic");
    		$wshop=mysqli_query($c,"select wshop_no,name from workshops where wshop_no=".$data['wshop_no']);
    	}
		elseif($data['type']=='Mechanic')
    	{
    		$list=array(array("index.php","zmdi zmdi-time material-icons-name","Today's Appointments"),array("profile.php","icon icon-user","Edit Profile"),array("logout.php","icon icon-power","Logout"));
    		$sites=array("index.php","profile.php","logout.php");
    		$wshop=mysqli_query($c,"select wshop_no,name from workshops where wshop_no=".$data['wshop_no']);
    	}
    
    $curPageName = substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1);

    // if(!in_array($curPageName, $list))
    // 	header("Location:404.php");


        $r_wshop=mysqli_num_rows($wshop);
   
?>