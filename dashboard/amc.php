<?php
        require 'assets/include/connect.php';
        // $r_c=mysql_query($c,"select count(*) from reg_cars where cus_id='".$data['cus_id']."' && in_cart='");

        if (isset($_POST['book'])) 
        {
            mysqli_query($c,"update reg_cars set in_cart='y' where num_plate='".$_POST['num_plate']."'");
                header("Location:cart.php");
        }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>AMC - CarMate</title>
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

                <!--AMC-->


<!-- <div class="card-deck mb-12 text-center ">
   <div class='col-xl-24 col-lg-24 col-md-24' > 


<div class='card mb-0' style="height: 40rem; width: 55rem"> 

<div class='card-header'> <h3 class='card-title'>Annual Maintenance Contracts for Your Cars</h3> 
</div> -->  

<div class='card-body'>    
    <!-- <div class="card-group"> -->
        <?php
            $q="select model_id from reg_cars where cus_id='".$data['cus_id']."'";
            $cars=mysqli_query($c,$q);
            $rows=mysqli_num_rows($cars);
    if($rows!=0)
    {
        $q="select c_m.model_id, c_m.brand_name,c_m.model_name,a_p.id,a_p.price, r_c.num_plate, r_c.in_cart from reg_cars r_c,amc_price a_p,car_model c_m where r_c.model_id=c_m.model_id && c_m.type=a_p.type && r_c.cus_id=".$data['cus_id'];
        $car_data=mysqli_query($c,$q);
        $i=0;
        while ($details=mysqli_fetch_assoc($car_data)) 
        {
            if($details['in_cart']=='n')
            {
            $i++;
            if($i==1)
             {   echo "<div class='row'>";}
            echo "<div class='col mb-6'>";
        echo "<div class='card'>";
            echo "<div class='card-header'>
                <h4 class='my-0 font-weight-normal'> For ".$details['brand_name']." ".$details['model_name']."</h4>
            </div>";
            echo "<div class='card-body'>
                <h1 class='card-title pricing-card-title'>₹ ".$details['price']."<span class='text-muted'>/ Year</span></h1>
                <ul class='list-unstyled mt-3 mb-4'>
                    <li>Wheel Alignment & Balancing</li>
                    <li>Diesel Injector Service</li>
                    <li>Interior Cleaning</li>
                    <li>Car Scanning and Reporting etc.</li>
                </ul>
                <div class='row d-flex justify-content-between'>
                    <form method='post' action='annual_package.php'>
                        <input type='hidden' name='model_id' value='".$details['model_id']."'>
                        <input type='submit' name='view' value='View Services' class='btn btn-md btn-outline-danger'>
                    </form>
                    
                    <form method='post'>
                        <input type='hidden' name='num_plate' value='".$details['num_plate']."'>
                        <input type='submit' name='book' value='Book AMC' class='btn btn-md btn-success'>
                    </form>
                </div>  
            </div>";
        echo "</div>";
    echo "</div>";
                    if($i==2)
                     {   echo "</div>";
                        $i=0;}
        }
        }
    }
    else
    {
        echo "<div class='row'>";
        echo "<div class='col mb-6'>";
        echo "<div class='card'>";
        echo "<div class='card-body'>";
        echo "You have no cars registered with us. <br>Please <a href='cars.php'>Register your cars first.</a>";
       echo "</div></div></div></div>";
    }
        ?>
        </div>
<!-- </div>
</div>
</div>
</div> -->

                <!--End of AMC-->
                </div> 
            </div> 
        </section> 

        <?php
            require 'assets/include/footer_dash.php';
        ?>
    </div>
</body>
</html>