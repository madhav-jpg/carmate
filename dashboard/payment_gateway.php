<?php
        require 'assets/include/connect.php';
        if(isset($_POST['done']))
        {
            $q=mysqli_query($c,"select `g_c`.`cus_id` AS `cus_id`,`c_m`.`model_id` AS `model_id`,`c_m`.`brand_name` AS `brand_name`,`c_m`.`model_name` AS `model_name`,`c_m`.`type` AS `type`,`g_c`.`num_plate` AS `num_plate`,`r_c`.`model_year` AS `model_year`,`g_c`.`s_id` AS `s_id`,`g_c`.`count` AS `count` from ((`car_model` `c_m` join `reg_cars` `r_c`) join `gen_cart` `g_c`) where `g_c`.`num_plate` = `r_c`.`num_plate` and `r_c`.`model_id` = `c_m`.`model_id` and `g_c`.`cus_id` = '".$data['cus_id']."'");

            while($gen_cart_view=mysqli_fetch_assoc($q)) 
            {
                $rows=mysqli_query($c,"select services_left from reg_services where num_plate='".$gen_cart_view['num_plate']."' && s_id=".$gen_cart_view['s_id']);
                $rows=mysqli_num_rows($rows);
                if($rows!=0)
                    mysqli_query($c,"update reg_services set services_left=services_left+".$gen_cart_view['count'].", exp_date='".date("Y-m-d", strtotime("+1 year"))."' where num_plate='".$gen_cart_view['num_plate']."' && s_id=".$gen_cart_view['s_id']);
                else
                    mysqli_query($c,"insert into reg_services(cus_id, num_plate, s_id, reg_date, services_left, exp_date) values(".$data['cus_id'].", '".$gen_cart_view['num_plate']."', ".$gen_cart_view['s_id'].", '".date("Y-m-d")."', ".$gen_cart_view['count'].", '".date("Y-m-d", strtotime("+1 year"))."')");

                $service=mysqli_query($c,"select ".$gen_cart_view['type']." from service_price where id=".$gen_cart_view['s_id']);
                $service=mysqli_fetch_assoc($service);
                $reg=mysqli_query($c,"select reg_no from reg_services where num_plate='".$gen_cart_view['num_plate']."' && s_id=".$gen_cart_view['s_id']);
                $reg=mysqli_fetch_assoc($reg);
                if(!mysqli_query($c,"insert into payment_status(payment_date, cus_id, s_id, reg_no, amount) values('".date("Y-m-d")."', ".$data['cus_id'].", ".$gen_cart_view['s_id'].", ".$reg['reg_no'].", ".($service[$gen_cart_view['type']]*$gen_cart_view['count'])." )"))
                    echo mysqli_error($c);
                mysqli_query($c,"delete from gen_cart where num_plate='".$gen_cart_view['num_plate']."' && s_id=".$gen_cart_view['s_id']);
            }
            
            $q="select `c`.`cus_id` AS `cus_id`,`c_m`.`model_id` AS `model_id`,`c_m`.`brand_name` AS `brand_name`,`c_m`.`model_name` AS `model_name`,`c_m`.`type` AS `type`,`r_c`.`num_plate` AS `num_plate`,`r_c`.`model_year` AS `model_year`,`a_p`.`price` AS `price` from (((`customer` `c` join `car_model` `c_m`) join `reg_cars` `r_c`) join `amc_price` `a_p`) where `r_c`.`model_id` = `c_m`.`model_id` and `c`.`cus_id` = `r_c`.`cus_id` and `a_p`.`type` = `c_m`.`type` and `r_c`.`in_cart` = 'y' and `c`.`cus_id`='".$data['cus_id']."'";

            while($amc_cart=mysqli_fetch_assoc($q)) 
            {
                mysqli_query($c,"insert into reg_services(cus_id, num_plate, s_id, reg_date, services_left, exp_date) values(".$data['cus_id'].", '".$amc_cart['num_plate']."', 0, '".date("Y-m-d")."', 4, '".date("Y-m-d", strtotime("+1 year"))."')");
                $reg=mysqli_query($c,"select reg_no from reg_services where num_plate='".$amc_cart['num_plate']."' && s_id=0");
                $reg=mysqli_fetch_assoc($reg);

                if(!mysqli_query($c,"insert into payment_status(payment_date, cus_id, s_id, reg_no, amount) values('".date("Y-m-d")."', ".$data['cus_id'].", 0, ".$reg['reg_no'].", ".$amc_cart['price']." )"))
                    echo mysqli_error($c);
                mysqli_query($c,"update reg_cars set in_cart='n' where cus_id=".$data['cus_id']." && model_id='".$amc_cart['model_id']."'");
            }
            setcookie("payment_status","done",time()+5);
            header("Location:payments.php");
        }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Pay @ CarMate</title>
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
                <?php
                    require 'assets/include/sidebar.php';
                    
                ?>

                <div class="col-xl-9 col-lg-12 col-md-12"> 

<div class="card"> 

<div class="card-header"> <h3 class="card-title">Payment Method</h3> 
</div> 

<div class="card-body"> 

<div class="card-pay"> 
<ul class="tabs-menu nav"> 
<li><a href="#tab1" class="active" data-toggle="tab"><i class="fa fa-credit-card"></i> Credit Card</a></li> 
<li><a href="#tab2" data-toggle="tab" class=""><i class="fa fa-credit-card"></i> Debit Card</a></li> 
<li><a href="#tab3" data-toggle="tab" class=""><i class="fa fa-university"></i> UPI</a></li> 
</ul> 

<div class="tab-content"> 

<div class="tab-pane fade in active" id="tab1"> 

<div class="form-group" visible='false'> 
<label class="form-label">Card Holder Name
</label> 
<input type="text" class="form-control" id="name1" placeholder="Name as on Card"> 
</div> 

<div class="form-group"> 
<label class="form-label">Card Number
</label> 

<div class="input-group"> 
<input type="text" class="form-control" placeholder="Enter your Card Number"> 

<span class="input-group-append"> <button class="btn btn-info" type="button"><i class="fa fa-cc-visa"></i> &nbsp; <i class="fa fa-cc-amex"></i> &nbsp; <i class="fa fa-cc-mastercard"></i></button> 
</span> 
</div> 
</div> 

<div class="row"> 

<div class="col-sm-8"> 

<div class="form-group"> 
<label class="form-label">Expiration
</label> 

<div class="input-group"> 
<input type="number" class="form-control" placeholder="MM" name="expire-month" min="1" max="12"> 
<input type="number" class="form-control" placeholder="YY" name="expire-year" min="2021" max="2035"> 
</div> 
</div> 
</div> 

<div class="col-sm-4"> 

<div class="form-group"> 
<label class="form-label">CVV <i class="fa fa-question-circle"></i>
</label> 
<input type="password" class="form-control" required="" maxlength="3"> 
</div> 
</div> 
</div> <form method="post"><input type="submit" name="done" value="Make Payment" class="btn btn-primary"> </form>
</div> 

<div class="tab-pane fade" id="tab2">

<div class="form-group" visible='false'> 
<label class="form-label">Card Holder Name
</label> 
<input type="text" class="form-control" id="name1" placeholder="Name as on Card"> 
</div> 

<div class="form-group"> 
<label class="form-label">Card Number
</label> 

<div class="input-group"> 
<input type="text" class="form-control" placeholder="Enter your Card Number"> 

<span class="input-group-append"> <button class="btn btn-info" type="button"><i class="fa fa-cc-visa"></i> &nbsp; <i class="fa fa-cc-amex"></i> &nbsp; <i class="fa fa-cc-mastercard"></i></button> 
</span> 
</div> 
</div> 

<div class="row"> 

<div class="col-sm-8"> 

<div class="form-group"> 
<label class="form-label">Expiration
</label> 

<div class="input-group"> 
<input type="number" class="form-control" placeholder="MM" name="expire-month" min="1" max="12"> 
<input type="number" class="form-control" placeholder="YY" name="expire-year" min="2021" max="2035"> 
</div> 
</div> 
</div> 

<div class="col-sm-4"> 

<div class="form-group"> 
<label class="form-label">CVV <i class="fa fa-question-circle"></i>
</label> 
<input type="password" class="form-control" maxlength="3" required=""> 
</div> 
</div> 
</div> <form method="post"><input type="submit" name="done" value="Make Payment" class="btn btn-primary"> </form>

</div> 

<div class="tab-pane fade" id="tab3">

<div class="form-group" visible='false'> 
<label class="form-label"> UPI ID
</label> 
<input type="text" class="form-control" id="name1" placeholder="like : carmate@upi"> 
</div> 
<form method="post"><input type="submit" name="done" value="Make Payment" class="btn btn-primary"> </form>
</div> 


</div> 
</div> 
</div> 
</div> 
</div>
                </div> 
            </div> 
        </section> 

        <?php
            require 'assets/include/footer_dash.php';
        ?>
    </div>
</body>
</html>