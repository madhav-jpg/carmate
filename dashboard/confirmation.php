<?php
        require 'assets/include/connect.php';
        $car_type = array('sm' => "Small",  'md' => "Medium", 'bg' => "Big", 'pr' => "Premium", 'sv' => "SUV");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Bookings - CarMate</title>
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

                <!--Appointments-->

                <div class="col-md-8"> 
    <div class="card"> 
        <div class="card-header"> <h3 class="card-title">Confirm Car & Service</h3> 
        </div>
        <div class="card-body">
             <?php
                $q="select `c`.`cus_id` AS `cus_id`,`c_m`.`model_id` AS `model_id`,`c_m`.`brand_name` AS `brand_name`,`c_m`.`model_name` AS `model_name`,`c_m`.`type` AS `type`,`r_c`.`num_plate` AS `num_plate`,`r_c`.`model_year` AS `model_year`,`a_p`.`price` AS `price` from (((`customer` `c` join `car_model` `c_m`) join `reg_cars` `r_c`) join `amc_price` `a_p`) where `r_c`.`model_id` = `c_m`.`model_id` and `c`.`cus_id` = `r_c`.`cus_id` and `a_p`.`type` = `c_m`.`type` and `r_c`.`in_cart` = 'y' and `c`.`cus_id`='".$data['cus_id']."'";
            $amc_cart=mysqli_query($c,$q);
            $rows=mysqli_num_rows($amc_cart);
            // $model=mysqli_query($c,"select brand_name, model_name from car_model where model_id='".."'");
            // $car_model=mysqli_fetch_assoc($model);
            $total_amc=0;
            if($rows!=0)
            {
                                    echo "<div class='card'>";
                                   echo " <div class='text-dark card-header'><h4 class='font-weight-semibold mt-1'>Annual Maintenance Service</h4> </div> 
                                    
                                    <div class='card-body'> ";

                                     while($service=mysqli_fetch_assoc($amc_cart)) {
                                         echo "<h4>For ".$service['brand_name']." ".$service['model_name']."&emsp;<span><small>".$service['num_plate']."</small></span></h4>";
                                         echo "<p></p>";
                                         echo "<p> Model Year : ".$service['model_year']."&emsp; &emsp; Model Type : ".$car_type[$service['type']]."</p>";
                                         $q=mysqli_query($c,"select count(*) from service_price where in_amc='y'");
                                         $total_services = mysqli_fetch_assoc($q);
                                         echo "<p>Total Services : ".$total_services['count(*)']."&emsp; &emsp; Service Price : ₹ ".$service['price']."</p>";
                                         
                                         echo "<br>";
                                     }
                                    

                                    echo "</div> 
                                    
                                    <div class='card-footer pt-4 pb-4'> 
                                        <div class='item-card9-footer d-md-flex'>";
                                       
                                        $price=mysqli_query($c,"select sum(a_p.price) from (((`customer` `c` join `car_model` `c_m`) join `reg_cars` `r_c`) join `amc_price` `a_p`) where `r_c`.`model_id` = `c_m`.`model_id` and `c`.`cus_id` = `r_c`.`cus_id` and `a_p`.`type` = `c_m`.`type` and `r_c`.`in_cart` = 'y' and `c`.`cus_id` = '".$data['cus_id']."'");
                                        $total = mysqli_fetch_assoc($q);
                                        $total_amc=$total['price'];
                                                echo "<h4>Total : ₹ ".$total_amc."</h4>";
                                        echo "</div> 
                                     </div> 


                                    </div>";
                                
            }



            $q="select `g_c`.`cus_id` AS `cus_id`,`c_m`.`model_id` AS `model_id`,`c_m`.`brand_name` AS `brand_name`,`c_m`.`model_name` AS `model_name`,`c_m`.`type` AS `type`,`g_c`.`num_plate` AS `num_plate`,`r_c`.`model_year` AS `model_year`,`g_c`.`s_id` AS `s_id`,`g_c`.`count` AS `count` from ((`car_model` `c_m` join `reg_cars` `r_c`) join `gen_cart` `g_c`) where `g_c`.`num_plate` = `r_c`.`num_plate` and `r_c`.`model_id` = `c_m`.`model_id` and `g_c`.`cus_id` = '".$data['cus_id']."'";
            $gen_cart=mysqli_query($c,$q);
            $rows=mysqli_num_rows($gen_cart);
            // $model=mysqli_query($c,"select brand_name, model_name from car_model where model_id='".."'");
            // $car_model=mysqli_fetch_assoc($model);
            $total_gen=0;
            if($rows!=0)
            {
                                    echo "<div class='card'>";
                                   echo " <div class='text-dark card-header'><h4 class='font-weight-semibold mt-1'>One Time Service</h4> </div> 
                                    
                                    <div class='card-body'> ";
                                    
                                     while($service=mysqli_fetch_assoc($gen_cart)) {
                                        echo "<br>";
                                         echo "<h4>For ".$service['brand_name']." ".$service['model_name']."&emsp;<span><small>".$service['num_plate']."</small></span></h4>";
                                         echo "<p></p>";
                                         echo "<p> Model Year : ".$service['model_year']."&emsp; &emsp; Model Type : ".$car_type[$service['type']]."</p>";
                                         $q=mysqli_query($c,"select name, ".$service['type']." from service_price where id=".$service['s_id']);
                                         $service_details = mysqli_fetch_assoc($q);
                                         $total_gen+=($service_details[$service['type']]*$service['count']);
                                         echo "<p>Service Name : ".$service_details['name']."&emsp; &emsp; Service Price : ₹ ".$service_details[$service['type']]."</p>";
                                         echo "<p>Number of Services : ".$service['count']."</p>";
                                         
                                     }
                                    

                                    echo "</div> 
                                    
                                    <div class='card-footer pt-4 pb-4'> 
                                        <div class='item-card9-footer d-md-flex'>";
                                       
                                        
                                                echo "<h4>Total : ₹ ".$total_gen."</h4>";
                                        echo "</div> 
                                     </div> 


                                    </div>";
                                
            }


            // else
            // {
            //     echo "You have no selected car services. <br><a href='index.php'>Get Services Now !</a>";
            // }
            ?> 

        </div>
        <div class='card-footer pt-4 pb-4 text-center'> 
            <div class='item-card9-footer d-md-flex float-left'>
                <b>Subtotal &emsp;₹ <?php echo $total_amc+$total_gen; ?></b>
            </div> 
            <div class='item-card9-footer d-md-flex float-right'>
                <form method='post' action="payment_gateway.php">
                    <input type="submit" name="pay" value="Proceed to Pay" class="btn btn-success">
                </form>
            </div>
        </div>
    </div>
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