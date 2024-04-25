<?php
        require 'assets/include/connect.php';
        $car_type = array('sm' => "Small",  'md' => "Medium", 'bg' => "Big", 'pr' => "Premium", 'sv' => "SUV");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Services - CarMate</title>
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
        <div class="card-header"> <h3 class="card-title">Booked Services</h3> 
        </div>
        <div class="card-body">
             <?php
                $q="select * from reg_services where cus_id='".$data['cus_id']."' && s_id=0";
            $reg_services=mysqli_query($c,$q);
            $rows=mysqli_num_rows($reg_services);
            // $model=mysqli_query($c,"select brand_name, model_name from car_model where model_id='".."'");
            // $car_model=mysqli_fetch_assoc($model);
            
            if($rows!=0)
            {
                                    echo "<div class='card'>";
                                   echo " <div class='text-dark card-header'><h4 class='font-weight-semibold mt-1'>Annual Maintenance Service</h4> </div> 
                                    
                                    <div class='card-body'> ";

                                     while($service=mysqli_fetch_assoc($reg_services)) {
                                        $car_details=mysqli_query($c,"select c_m.brand_name, c_m.model_name, r_c.model_year, c_m.type from car_model c_m, reg_services r_s, reg_cars r_c where r_s.num_plate=r_c.num_plate && r_c.model_id=c_m.model_id && r_s.num_plate='".$service['num_plate']."'");
                                         $car_details=mysqli_fetch_assoc($car_details);
                                         echo "<h4>For ".$car_details['brand_name']." ".$car_details['model_name']."&emsp;<span><small>".$service['num_plate']."</small></span></h4>";
                                         echo "<p></p>";
                                         echo "<p> Model Year : ".$car_details['model_year']."&emsp; &emsp; Model Type : ".$car_type[$car_details['type']]."</p>";
                                         $q=mysqli_query($c,"select count(*) from service_price where in_amc='y'");
                                         $total_services = mysqli_fetch_assoc($q);
                                         echo "<p>Services Left : ".$service['services_left']."</p>";
                                         
                                         echo "<br>";
                                     }
                                    

                                    echo "</div></div>" ;
                                    
                                    // <div class='card-footer pt-4 pb-4'> 
                                    //     <div class='item-card9-footer d-md-flex'>"
                                       
                                    //     // $q=mysqli_query($c,"select sum(price) as price from amc_cart where cus_id='".$data['cus_id']."'");
                                    //     // $total = mysqli_fetch_assoc($q);
                                    //     // $total_amc=$total['price'];
                                    //     //         echo "<h4>Total : ₹ ".$total_amc."</h4>";
                                    //     echo "</div> 
                                    //  </div>                               
            }



            $q="select * from reg_services where cus_id='".$data['cus_id']."' && s_id!=0";
            $reg_services=mysqli_query($c,$q);
            $rows=mysqli_num_rows($reg_services);
            // $model=mysqli_query($c,"select brand_name, model_name from car_model where model_id='".."'");
            // $car_model=mysqli_fetch_assoc($model);
            
            if($rows!=0)
            {
                                    echo "<div class='card'>";
                                   echo " <div class='text-dark card-header'><h4 class='font-weight-semibold mt-1'>One Time Service</h4> </div> 
                                    
                                    <div class='card-body'> ";

                                     while($service=mysqli_fetch_assoc($reg_services)) {
                                        $car_details=mysqli_query($c,"select c_m.brand_name, c_m.model_name, r_c.model_year, c_m.type from car_model c_m, reg_services r_s, reg_cars r_c where r_s.num_plate=r_c.num_plate && r_c.model_id=c_m.model_id && r_s.num_plate='".$service['num_plate']."'");
                                         $car_details=mysqli_fetch_assoc($car_details);
                                         echo "<h4>For ".$car_details['brand_name']." ".$car_details['model_name']."&emsp;<span><small>".$service['num_plate']."</small></span></h4>";
                                         echo "<p></p>";
                                         echo "<p> Model Year : ".$car_details['model_year']."&emsp; &emsp; Model Type : ".$car_type[$car_details['type']]."</p>";
                                         $q=mysqli_query($c,"select count(*) from service_price where in_amc='y'");
                                         $total_services = mysqli_fetch_assoc($q);
                                         echo "<p>Services Left : ".$service['services_left']."</p>";
                                         
                                         echo "<br>";
                                     }
                                    

                                    echo "</div></div>" ;
                                    
                                    // <div class='card-footer pt-4 pb-4'> 
                                    //     <div class='item-card9-footer d-md-flex'>"
                                       
                                    //     // $q=mysqli_query($c,"select sum(price) as price from amc_cart where cus_id='".$data['cus_id']."'");
                                    //     // $total = mysqli_fetch_assoc($q);
                                    //     // $total_amc=$total['price'];
                                    //     //         echo "<h4>Total : ₹ ".$total_amc."</h4>";
                                    //     echo "</div> 
                                    //  </div>                               
            }


            // else
            // {
            //     echo "You have no selected car services. <br><a href='index.php'>Get Services Now !</a>";
            // }
            ?> 

        </div>
        <div class='card-footer pt-4 pb-4 text-center'> 
            <!-- <div class='item-card9-footer d-md-flex float-left'>
                <b>Subtotal &emsp;₹ <?php echo $total_amc+$total_gen; ?></b>
            </div>  -->
            <div class='item-card9-footer d-md-flex float-right'>
                
                    <a href="appointments.php" class="btn btn-primary">Take Appointment</a>
                
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