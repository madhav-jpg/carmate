<?php
           
        require 'assets/include/connect.php';
        $i=0;
        if(isset($_POST['cart']))
        {
            $service_id=$_POST['service_id'];
            foreach ($service_id as $id) {
                $is_exist=mysqli_query($c,"select * from gen_cart where num_plate='".$_POST[$id]."' && s_id=".$id);
                $is_exist=mysqli_num_rows($is_exist);
                if($is_exist!=0)
                    mysqli_query($c,"update gen_cart set count=count+1 where num_plate='".$_POST[$id]."' && s_id=".$id);
               elseif(!mysqli_query($c,"insert into gen_cart(cus_id,num_plate,s_id,count) values(".$data['cus_id'].",'".$_POST[$id]."',".$id.", ".$_POST[$i++].")"))
                echo mysqli_error($c);
            }
            header("Location:cart.php");
        }

        if(isset($_POST['book']))
            $service_list[0]=$_POST['service_id'];
        elseif (isset($_POST['checked_services']))
            $service_list=$_POST['checked'];
        else
          //  header("Location:404.php");  
        $cars_list=mysqli_query($c,"select c_m.brand_name, c_m.model_name, r_c.num_plate from reg_cars r_c, car_model c_m where r_c.cus_id=".$data['cus_id']." && r_c.model_id=c_m.model_id");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Cars - CarMate</title>
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

                <!--Select Cars-->

<div class='col-xl-15 col-lg-15 col-md-15' > 
<div class="card mb-18" style="width: 55rem"> 

<div class="card-header"> <h3 class="card-title">Select Car for Service</h3> 
</div> 

<div class="card-body"> 

<div class="table-responsive border-top"> 
    <form method='post'>
                <?php
                    


    //     $rows=mysqli_num_rows($q);

    // if($rows>0)
    // {
        echo "<table class='table table-bordered table-hover text-nowrap'> 
            <thead align='center'>
                <tr>
                    <th>Service Name
                    </th>
                    
                    <th>Select Car
                    </th>

                    <th>Number of Services
                    </th>
                </tr>
            </thead>";
            $i=0;
        foreach ($service_list as $service)
        {
            $cars_list=mysqli_query($c,"select c_m.brand_name, c_m.model_name, r_c.num_plate from reg_cars r_c, car_model c_m where r_c.cus_id=".$data['cus_id']." && r_c.model_id=c_m.model_id");
            $service_name=mysqli_query($c,"select name from service_price where id=".$service);
            $service_name=mysqli_fetch_assoc($service_name);
            echo "<tbody>
                <tr>
                    <td><div class='form-group'><p class='form-label' style='font-size:1em;'>".$service_name['name']."</p></div>
                    <input type='hidden' name='service_id[]' value='".$service."'>
                    </td>
                    <td> <div class='form-group'><select class='form-control' name='".$service."' required>
                    <option selected disabled>Select Here</option>";
                    while($cars=mysqli_fetch_assoc($cars_list))
                       echo "<option name='".$service."' value='".$cars['num_plate']."'>".$cars['brand_name']." ".$cars['model_name']." [".$cars['num_plate']."]</option>";
            echo "</select></div></td>
            <td><div class='form-group'><input type='number' min=1 max=10 value=1 name='".$i++."' class='form-control'></div></td>
            </tbody>";
        }
        echo "</table>"; 
        echo "
 </div></div>

<div class='card-footer pt-4 pb-4 text-center'><div class='item-card9-footer d-md-flex float-right'>
    
<input type='submit' class='btn btn-success' name='cart' value='Add to Cart'>
</div></div> ";
    // }
    // else
    // {
    //     echo "<br><div align='center'>Oops !<br>No Services Found.</div>";
    // }

                ?>
</form>
</div>
</div>

                <!--End of Select Cars-->
                </div> 
            </div> 
        </section> 

        <?php
            require 'assets/include/footer_dash.php';
        ?>
    </div>
</body>
</html>