<?php
        require 'assets/include/connect.php';
        $q['ots']=mysqli_query($c,"select distinct s_p.name,r_s.num_plate, c_m.brand_name, c_m.model_name, r_s.reg_no from reg_services r_s, service_price s_p, car_model c_m, reg_cars r_c where r_s.cus_id=".$data['cus_id']." && r_s.s_id=s_p.id && r_c.num_plate=r_s.num_plate && r_c.model_id=c_m.model_id && r_s.services_left>0");
        $q['amc']=mysqli_query($c,"select distinct r_s.num_plate, c_m.brand_name, c_m.model_name, r_s.reg_no from reg_services r_s, car_model c_m, reg_cars r_c where r_s.cus_id=".$data['cus_id']." && r_s.s_id=0 && r_c.num_plate=r_s.num_plate && r_c.model_id=c_m.model_id && r_s.services_left>0");
                    
        // $ots=mysqli_fetch_all($ots,MYSQLI_ASSOC);
        // $amc=mysqli_fetch_all($amc,MYSQLI_ASSOC);

        if(isset($_POST['get_apmt']))
        {
            if(!mysqli_query($c,"INSERT INTO `appointments`(`reg_no`, `wshop_no`, `apmt_date`, `status`) VALUES (".$_POST['available'].",".$_POST['wshop'].", '".$_POST['apmt_date']."','Remaining')"))
            if(!mysqli_query($c,"insert into appointments(reg_no,wshop_no,apmt_date,status) values(".$_POST['available'].", ".$_POST['wshop'].", '".$_POST['apmt_date']."', 'Remaining');"))
                echo mysqli_error($c);

            if(!$selected=mysqli_query($c,"select * from reg_services where reg_no=".$_POST['available']))
                echo mysqli_error($c);
            $selected=mysqli_fetch_assoc($selected);
            if(isset($selected))
            {   if($selected['services_left']>=1)
                {   if(!mysqli_query($c,"update reg_services set services_left=services_left-1 where reg_no=".$_POST['available']))
                        echo mysqli_error($c);
                }
                // else if($selected['services_left']==1)
                // {   if(!mysqli_query($c,"delete from reg_services where reg_no=".$_POST['available']))
                //         echo mysqli_query($c);
                // }
            }
            echo "<div class='container-fluid'>
                    <div class='alert alert-success alert-dismissible'>
                        <button type='button' class='close' data-dismiss='alert'> &times; </button>
                        <strong>Appointment taken successfully !</strong>
                    </div>
                    </div>";
        }

        if((!isset($_GET['service']))||(!isset($_GET['city'])))
            $isDisabled=true;
        else
            $isDisabled=false;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Appointments - CarMate</title>
    <link rel="icon" href="assets/images/car.png" type="image/png"/>

    <?php
        require 'assets/include/link.php';
    ?>

<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <!--   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
    <script language="javascript" type="text/javascript">
        
        $(function() {
            $( "#datepicker" ).datepicker({ minDate: 0, maxDate:30, dateFormat: 'yy-mm-dd', beforeShowDay: noSunday});
        });

      function noSunday(date){ 
         return [date.getDay() != 0, ''];
      }; 
       
       function doReload(type){
            var filename=location.pathname.substring(location.pathname.lastIndexOf("/") + 1);
            document.location = filename+'?service='+type;
        }
        function fetchWshop(city){      
            var filename=location.pathname.substring(location.pathname.lastIndexOf("/") + 1);
            var service=document.getElementById('service').value;
            document.location = filename+'?service='+service+'&city='+city;
        } 

    </script>
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
                <?php
                    require 'assets/include/sidebar.php';
                ?>

                <!--Appointments-->

                <div class="col-xl-9 col-lg-12 col-md-12"> 

<form method="post">

<div class="card mb-0"> 

<div class="card-header"> <h3 class="card-title">Take Appointments</h3> 
</div> 

<div class="card-body"> 


<div class="row"> 
 


<div class="col-sm-8 col-md-6"> 

<div class="form-group"> 
<label class="form-label">Service type
</label> 
<select class="form-control" id="service" name="service" onchange="doReload(this.value);"> 
    <?php
        // if(isset($_GET['service']))
        //     if($_GET=="ots")
        //         $i=1;
        //     else
        //         $i=2;
        // else
        //     $i=3;
    ?>
    <option disabled <?php $flag=false; if(!isset($_GET['service'])) echo "selected"; else $flag=true; ?>>Select Service type</option>
    <option value="ots" <?php if(($flag)&&($_GET['service']=='ots')) echo "selected"; ?>>One Time Service</option>
    <option value="amc" <?php if(($flag)&&($_GET['service']=='amc')) echo "selected"; ?>>Annual Maintenance Service</option>
</select>


</div> 
</div> 


<div class="col-sm-8 col-md-6"> 

<div class="form-group"> 
<label class="form-label">From where you want to service car
</label> 
<select class="form-control" name="city" onchange="fetchWshop(this.value);" <?php if(!isset($_GET['service'])) echo "disabled"; ?>> 
    <option disabled <?php $flag=false; if(!isset($_GET['city'])) echo "selected"; else $flag=true; ?>>Select City</option>
    <?php
            $cities=mysqli_query($c,"select name from city");
            while ($city=mysqli_fetch_assoc($cities)) {
               echo "<option";
                if(($flag==true)&&($_GET['city']==$city['name']))
                 {   echo " selected";  }
               echo ">".$city['name']."</option>";
            }
    ?>
</select>


</div> 
</div> 



</div> 

<div class="row">
<div class="col-sm-16 col-md-12"> 

<div class="form-group"> 
<label class="form-label">Available Services
</label> 
<select id="available" name="available" class="form-control" <?php if($isDisabled) echo "disabled"; ?> > 
    <?php
        echo "<option selected disabled>Select Service</option>";
        if(isset($_GET['service']))
        {   
            if($_GET['service']=="amc")
            {
            while($service=mysqli_fetch_assoc($q[$_GET['service']]))
                echo "<option value=".$service['reg_no'].">Maintenance Service for ".$service['brand_name']." ".$service['model_name']." [ ".$service['num_plate']." ]</option>";
            }
            else if($_GET['service']=="ots")
            {
            while($service=mysqli_fetch_assoc($q[$_GET['service']]))
                echo "<option value=".$service['reg_no'].">".$service['name']." for ".$service['brand_name']." ".$service['model_name']." [ ".$service['num_plate']." ]</option>";
            }
        }
        // else
        //     echo "<option>Select service type first</option>";
    ?>    
</select>


</div> 
</div>
</div> 




<div class="row"> 


<div class="col-sm-8 col-md-6"> 

<div class="form-group"> 
<label class="form-label">Workshop Name
</label> 
<select class="form-control" id="wshop" name="wshop" <?php if($isDisabled) echo "disabled"; ?>> 
    <?php
            $workshops=mysqli_query($c,"select wshop_no, name from workshops where city='".$_GET['city']."'");
            while($wshop=mysqli_fetch_assoc($workshops)) {
                echo "<option value=".$wshop['wshop_no'].">".$wshop['name']."</option>";
            }
    ?>
</select>


</div> 
</div> 



<div class="col-sm-8 col-md-6"> 

<div class="form-group"> 
<label class="form-label">Appointment Date
</label> 
<input type="text" id="datepicker" class="form-control" name="apmt_date" required <?php if($isDisabled) echo "disabled"; ?>>

</div> 
</div> 



</div> 





</div>
<div class="card-footer">
    <input type="submit" class="btn btn-success" name="get_apmt" value="Confirm Appointment"> 
</div>

</div>
</form>
</div>


                <!--End of Appointments-->
                </div> 
            </div> 
        </section> 

        <?php
            require 'assets/include/footer_dash.php';
        ?>
    </div>
   
</body>
</html>