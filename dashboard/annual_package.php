<?php
        require 'assets/include/connect.php';
        if(isset($_POST['view']))
        {
            $res=mysqli_query($c,"select brand_name,model_name,type from car_model where model_id='".$_POST['model_id']."'");
            $car_model=mysqli_fetch_assoc($res);
            $price=mysqli_query($c,"select name,".$car_model['type'].", in_amc from service_price");
            $other_price=mysqli_query($c,"select name,".$car_model['type'].", in_amc from service_price");
        }
        else
            header("Location:404.php");
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

                <!--Car Services-->


<div class='card mb-0' style="height: 110rem; width: 55rem"> 
    <div class='card-header'> <h3 class='card-title'>Services for Your <?php echo $car_model['brand_name']." ".$car_model['model_name'] ?></h3> 
    </div> 
    
    <div class='card-body'> 
    <div class="card">    
        <div class='card-header'> <h3 class='card-title'>Annual Services</h3> </div>
        <div class="card-body">
            <div class="row row-cols-1 row-cols-md-3 g-4">



<?php
        $i=0;
        $j=0;
    while($service_price=mysqli_fetch_assoc($price))
    {
        $j++;
        if($service_price['in_amc']=='y')
        {
            $i++;
            
            if($i>5)
            {
                echo "<div class='row'>";
            }
                echo "<div class='col'>
                <div class='card'>
                    <img src='assets/images/services/".$j.".png' class='card-img-top' alt=''>
                        <div class='card-body'>
                        <h5 class='card-title'>".$service_price['name']."</h5>
                        <p class='card-text'>₹".$service_price[$car_model['type']]."</p>
                        </div>
                </div>
                </div>";

            if($i>5)
            {
                echo "</div>";
                $i=0;
            }
        }
    }
?>
        </div>
        </div>
    </div>

    <div class="card">    
        <div class='card-header'> <h3 class='card-title'>Other Add-Ons Services</h3> </div>
        <div class="card-body">
            <div class="row row-cols-1 row-cols-md-3 g-4">
<?php
    $i=0;
    $j=0;

    while($other_service=mysqli_fetch_assoc($other_price))
    {
        $j++;
        if($other_service['in_amc']=='n')
        {
            $i++;
            
            if($i>5)
            {
                echo "<div class='row'>";
            }
                echo "<div class='col'>
                <div class='card'>
                    <img src='assets/images/services/".$j.".png' class='card-img-top' alt=''>
                        <div class='card-body'>
                        <h5 class='card-title'>".$other_service['name']."</h5>
                        <p class='card-text'>₹".$other_service[$car_model['type']]."</p>
                        </div>
                </div>
                </div>";

            if($i>5)
            {
                echo "</div>";
                $i=0;
            }
        }
    }
?>

    </div>
  </div>
</div>
                </div>
  </div>
</div>

                <!--End of Car Services-->
                </div> 
            </div> 
        </section> 

        <?php
            require 'assets/include/footer_dash.php';
        ?>
    </div>
</body>
</html>