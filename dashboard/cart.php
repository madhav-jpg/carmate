<?php
        require 'assets/include/connect.php';
        $car_type = array('sm' => "Small",  'md' => "Medium", 'bg' => "Big", 'pr' => "Premium", 'sv' => "SUV");
        if (isset($_POST['remove_amc'])) 
        {
            mysqli_query($c,"update reg_cars set in_cart='n' where num_plate='".$_POST['num_plate']."'");
        }
        elseif (isset($_POST['remove_gen'])) 
        {
            mysqli_query($c,"delete from gen_cart where num_plate='".$_POST['num_plate']."' && s_id=".$_POST['s_id']);
        }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Cart - CarMate</title>
    <link rel="icon" href="assets/images/car.png" type="image/png"/>

    <?php
        require 'assets/include/link.php';
    ?>
    <script type="text/javascript">
        $(document).ready(function () {
    $(".content").hide();
    $(".show_hide").on("click", function () {
        var txt = $(".content").is(':visible') ? 'Read More' : 'Read Less';
        $(".show_hide").text(txt);
        $(this).next('.content').slideToggle(200);
    });
});
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

                


                


                <!--Your Cart-->



<div class="col-md-8"> 
    <div class="card"> 
        <div class="card-header"> <h3 class="card-title">Selected Services</h3> 
        </div>
        <div class="card-body"> 
                
        <?php
            $q="select `c`.`cus_id` AS `cus_id`,`c_m`.`model_id` AS `model_id`,`c_m`.`brand_name` AS `brand_name`,`c_m`.`model_name` AS `model_name`,`c_m`.`type` AS `type`,`r_c`.`num_plate` AS `num_plate`,`r_c`.`model_year` AS `model_year`,`a_p`.`price` AS `price` from (((`customer` `c` join `car_model` `c_m`) join `reg_cars` `r_c`) join `amc_price` `a_p`) where `r_c`.`model_id` = `c_m`.`model_id` and `c`.`cus_id` = `r_c`.`cus_id` and `a_p`.`type` = `c_m`.`type` and `r_c`.`in_cart` = 'y' and `c`.`cus_id`='".$data['cus_id']."'";
            $amc_cart=mysqli_query($c,$q);
            $rows_amc=mysqli_num_rows($amc_cart);
            // $model=mysqli_query($c,"select brand_name, model_name from car_model where model_id='".."'");
            // $car_model=mysqli_fetch_assoc($model);
            $amc_total=0;
            if($rows_amc!=0)
            {
                


                                while($service=mysqli_fetch_assoc($amc_cart))
                                {
                                    
                                    echo "<div class='card'>";
                                   
                                   echo " <div class='text-dark card-header'><h4 class='font-weight-semibold mt-1'>Annual Maintenance Service for ".$service['brand_name']." ".$service['model_name']."</h4> </div> 
                                    
                                    <div class='card-body'> 

                                            <dl>
                                                <dt>Services you will get</dt>";
                                                $s_names=mysqli_query($c,"select name from service_price where in_amc='y'");
                                              while($name=mysqli_fetch_assoc($s_names))
                                              {  
                                                echo "<dd>- ".$name['name']."</dd><br>";
                                              }
                                            
                                        
                                        echo "<dl><br>";



                                        
                                       echo " <div align='right'><i class='fa fa-car text-muted mr-1'></i>".$car_type[$service['type']]."</div>
                                    </div> 
                                    
                                    <div class='card-footer pt-4 pb-4 text-center'> 
                                        <div class='item-card9-footer d-md-flex float-left'>";
                                        echo "<b>Price &emsp;₹ ".$service['price']."</b>
                                        </div> 

                                        <div class='item-card9-footer d-md-flex float-right'>";
                                        echo "<b></b>";

                                        echo "<form method='post'>";
                                        echo "<input type='hidden' name='num_plate' value='".$service['num_plate']."'>
                                        <span><input type='submit' class='btn btn-danger' name='remove_amc' value='Remove'></span></form>
                                        
                                        </div> 
                                     </div> 


                                    </div>";
                                }
                                $price=mysqli_query($c,"select sum(a_p.price) from (((`customer` `c` join `car_model` `c_m`) join `reg_cars` `r_c`) join `amc_price` `a_p`) where `r_c`.`model_id` = `c_m`.`model_id` and `c`.`cus_id` = `r_c`.`cus_id` and `a_p`.`type` = `c_m`.`type` and `r_c`.`in_cart` = 'y' and `c`.`cus_id` = '".$data['cus_id']."'");
                                $price=mysqli_fetch_assoc($price);
                                $amc_total=$price['sum(price)'];
                                // echo "</form>";
        
            }
            // else
            // {
            //     echo "You have no selected car services. <br><a href='index.php'>Get Services Now !</a>";
            //     echo "</form></div>";
            // }





            $q="select * from gen_cart where cus_id='".$data['cus_id']."'";
            $gen_cart=mysqli_query($c,$q);
            $rows_gen=mysqli_num_rows($gen_cart);
            // $model=mysqli_query($c,"select brand_name, model_name from car_model where model_id='".."'");
            // $car_model=mysqli_fetch_assoc($model);
            $gen_service_total=0;
            if($rows_gen!=0)
            {
                

                                
                                while($service=mysqli_fetch_assoc($gen_cart))
                                {
                                    $service_price=mysqli_query($c,"select * from service_price where id=".$service['s_id']);
                                    $service_price=mysqli_fetch_assoc($service_price);
                                    echo "<div class='card'>";
                                   $car_details=mysqli_query($c,"select c_m.brand_name,c_m.model_name, c_m.type from car_model c_m, reg_cars r_c where c_m.model_id=r_c.model_id && r_c.num_plate='".$service['num_plate']."'");
                                   $car_details=mysqli_fetch_assoc($car_details);
                                   echo " <div class='text-dark card-header'><h4 class='font-weight-semibold mt-1'>One Time Service for ".$car_details['brand_name']." ".$car_details['model_name']."</h4> </div> 
                                    
                                    <div class='card-body'> 

                                            <dl>
                                                <dt>Services you will get</dt>";
                                                $s_names=mysqli_query($c,"select name from service_price where id=".$service['s_id']);
                                                $s_name=mysqli_fetch_assoc($s_names);
                                                echo "<dd>- ".$s_name['name']."</dd><br>";
                                                echo "<dl><br>";



                                        
                                       echo " <div align='right'><i class='fa fa-car text-muted mr-1'></i>".$car_type[$car_details['type']]."</div>
                                    </div> 
                                    
                                    <div class='card-footer pt-4 pb-4 text-center'> 
                                        <div class='item-card9-footer d-md-flex float-left'>";

                                        echo "<b>Price &emsp;₹ ".($service_price[$car_details['type']]*$service['count'])."</b>
                                        </div> 

                                        <div class='item-card9-footer d-md-flex float-right'>";
                                        echo "<b></b>";
                                        $gen_service_total+=($service_price[$car_details['type']]*$service['count']);
                                        echo "<form method='post'>";
                                        echo "<input type='hidden' name='num_plate' value='".$service['num_plate']."'>
                                        <input type='hidden' name='s_id' value=".$service['s_id'].">
                                        <span><input type='submit' class='btn btn-danger' name='remove_gen' value='Remove'></span></form>
                                        
                                        </div> 
                                     </div> 


                                    </div>";
                                }
                                // $price=mysqli_query($c,"select sum(price) from amc_cart where cus_id='".$data['cus_id'].
                                //     "'");
                                // $price=mysqli_fetch_assoc($price);
                                // echo "</form>";
        
            }
            // $total=$amc_total+$gen_service_total;
           $rows=$rows_amc+$rows_gen;
            if($rows==0)
            {
                echo "You have no selected car services. <br><a href='index.php'>Get Services Now !</a>";
                // echo "</form>";
            }
            else{

             echo "</div>
        <div class='card-footer text-center'> <b class='float-left'> <h4>Subtotal &emsp;₹ ".($amc_total+$gen_service_total)."</h4></b><a class='btn btn-success float-right' href='confirmation.php'>Pay for Services</a>
        </div>
    </div></div>";
        }

            ?> 
            


                <!--End of Cart-->

                
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