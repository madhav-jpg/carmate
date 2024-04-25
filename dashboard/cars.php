<?php
        require 'assets/include/connect.php';
        $car_type = array('sm' => "Small",  'md' => "Medium", 'bg' => "Big", 'pr' => "Premium", 'sv' => "SUV");
        
        if(isset($_POST['remove']))
        {
            if(mysqli_query($c,"delete from reg_cars where num_plate='".$_POST['num_plate']."'"))
            {
                echo "<div class='container-fluid'>
                    <div class='alert alert-success alert-dismissible'>
                        <button type='button' class='close' data-dismiss='alert'> &times; </button>
                        <strong>Your Car Removed Successfully !</strong>
                    </div>
                    </div>";
            }
        }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Your Cars - CarMate</title>
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

                


                


                <!--Your Cars-->



<div class="col-md-8"> 
    <div class="card"> 
        <div class="card-header"> <h3 class="card-title">Your Cars</h3> 
        </div>
        <div class="card-body"> 
                
                <?php
                $q="select num_plate,model_id from reg_cars where cus_id='".$data['cus_id']."'";
            $cars=mysqli_query($c,$q);
            $rows=mysqli_num_rows($cars);
            // $model=mysqli_query($c,"select brand_name, model_name from car_model where model_id='".."'");
            // $car_model=mysqli_fetch_assoc($model);
            if($rows!=0)
            {
                


                                while($reg_cars=mysqli_fetch_assoc($cars))
                                {
                                    
                                    echo "<div class='card'>";
                                    $model=mysqli_query($c,"select brand_name,model_name, type from car_model where model_id=".$reg_cars['model_id']);
                                    $car_model=mysqli_fetch_assoc($model);
                                   echo " <div class='text-dark card-header'><h4 class='font-weight-semibold mt-1'>".$reg_cars['num_plate']."</h4> </div> 
                                    
                                    <div class='card-body'> 
                                        <span>".$car_model['brand_name']."</span> <label>".$car_model['model_name']."</label>
                                        <p class=' leading-tight'>";
                                        $q=mysqli_query($c,"select reg_no from reg_services where num_plate='".$reg_cars['num_plate']."'");
                                        $rows=mysqli_num_rows($q);
                                        if($rows>0)
                                        {
                                            $flag=true;
                                            echo $rows." Registered Services";
                                        }
                                        else
                                            echo "No Registered Services</p>";
                                       echo " <div align='right'><i class='fa fa-car text-muted mr-1'></i>".$car_type[$car_model['type']]."</div>
                                    </div> 
                                    
                                    <div class='card-footer pt-4 pb-4'> 
                                        <div class='item-card9-footer d-md-flex'>";
                                        // echo "<form method='post' action='view_services.php'><input type='hidden' name='num_plate' value='".$reg_cars['num_plate']."''>";
                                        // echo "<span><input type='submit' class='btn btn-success' name='view' value='View Services'";
                                        //     if(!isset($flag))
                                        //         echo "disabled";
                                        // echo "></span></form> &emsp; &emsp;";

                                        echo "<form method='post'>";
                                        echo "<input type='hidden' name='num_plate' value='".$reg_cars['num_plate']."''>
                                        <span><input type='submit' class='btn btn-danger' name='remove' value='Remove'></span></form>
                                        
                                        </div> 
                                     </div> 


                                    </div>";
                                }
            }
            else
            {
                echo "You have no cars registered with us. <br>Please Link Your Cars";
            }
            ?> 
            </form>
        </div>
        <div class="card-footer"> <a class="btn btn-success" href="add_cars.php">Add Cars</a>
        </div>
    </div>


                <!--End of Your Cars-->

                
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