<?php
        require 'assets/include/connect.php';
        if(isset($_POST["add"]))
        {
            $qry=mysqli_query($c,"select cus_id from reg_cars where num_plate='".$_POST['num_plate']."'");
            $rows=mysqli_num_rows($qry);
            if($rows==0)
            {
            $details=mysqli_query($c,"select model_id from car_model where model_name='".$_POST['car_model']."' && brand_name='".$_POST['brand_name']."'");
            $model=mysqli_fetch_assoc($details);
                if(mysqli_query($c,"insert into reg_cars values('".$_POST['num_plate']."','".$data['cus_id']."','".$model['model_id']."',".$_POST['year'].",'n')"))
                {
                    echo "<div class='container-fluid'>
                        <div class='alert alert-success alert-dismissible'>
                            <button type='button' class='close' data-dismiss='alert'> &times; </button>
                            <strong>Your Car Added Successfully !</strong> Book Services Now
                        </div>
                        </div>";
                }
                else
                    echo mysqli_error($c);
            }
            else 
            {
                $tmp=mysqli_fetch_assoc($qry);
                if($data['cus_id']==$tmp['cus_id'])
                {
                    echo "<div class='container-fluid'>
                    <div class='alert alert-danger alert-dismissible'>
                        <button type='button' class='close' data-dismiss='alert'> &times; </button>
                        <strong>You already added this car before !</strong>
                    </div>
                    </div>";
                }
                else
                {
                    echo "<div class='container-fluid'>
                    <div class='alert alert-danger alert-dismissible'>
                        <button type='button' class='close' data-dismiss='alert'> &times; </button>
                        <strong>Someone already added this car before !</strong>
                    </div>
                    </div>";
                }
            }
        }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Add Cars - CarMate</title>
    <link rel="icon" href="assets/images/car.png" type="image/png"/>

    <?php
        require 'assets/include/link.php';
    ?>
    <script language="javascript" type="text/javascript">
    function doReload(brand_name){
            document.location = 'add_cars.php?brand_name='+brand_name;
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

                <!--Add Cars-->

             <div class="card-deck mb-12 text-center">
   <div class='col-xl-24 col-lg-24 col-md-24' > 

<div class='card mb-0' style="width: 55rem"> 

<div class='card-header'> <h3 class='card-title'>Link Your Cars to Book Services</h3> 
</div> 

<form method='post'>
<div class='card-body'>     

        <div class="row">
    <div class='card mb-12 box-shadow'>
          
          <div class='card-header'>
            <h4 class='my-0 font-weight-normal'>Select Car Brand and Model</h4>
          </div>
          <div class='card-body'>
            <div class="form-group">
                                    <div class="row form-group">
                                        
                                        <select name="brand_name" class="form-control" id="brand_name" onchange="doReload(this.value);"> 
                                            <option disabled selected>Select Brand</option>
                                            <?php
                                            
                                                $disp=mysqli_query($c,"select distinct brand_name from car_model");
                                                while($brand=mysqli_fetch_assoc($disp)) 
                                                {
                                                    echo "<option ";
                                                    if(isset($_GET['brand_name']))
                                                    {
                                                        if($_GET['brand_name']==$brand['brand_name'])
                                                            echo "selected";
                                                    }
                                                    echo ">".$brand['brand_name']."</option>";
                                                }
                                            ?>
                                        </select>
                                    </div>  
                                       <br>
                                    <div class="row form-group">
                                        <select name="car_model" class="form-control" id="car_model"> 
                                                <option disabled selected>Select Model</option>
                                                <?php
                                                    if(isset($_GET['brand_name']))
                                                    {
                                                    $cars=mysqli_query($c,"select model_name from car_model where brand_name='".$_GET['brand_name']."'");
                                                        while($model=mysqli_fetch_assoc($cars)) 
                                                        {
                                                        echo "<option>".$model['model_name']."</option>";
                                                        }
                                                    }
                                                ?>
                                        </select>
                                    </div>
            </div> 








            
          </div>
    </div> 
    <div class='card mb-12 box-shadow'>
          
          <div class='card-header'>
            <h4 class='my-0 font-weight-normal'>Details of Car</h4>
          </div>
          <div class='card-body'>
            

        <div class="form-group"> 
            <div class="row form-group">
                    <label class="form-label">Registration Plate
                    </label> 
                    <input type="text" name="num_plate" class="form-control" placeholder="Number Plate of Vehicle" pattern="^[A-Z]{2}[ -][0-9]{1,2}(?: [A-Z])?(?: [A-Z]*)? [0-9]{4}$" title="eg. GJ 03 AB 1234"> 
            </div> 
            
            <div class="row form-group"> 
                    <label class="form-label">Registration Year
                    </label> 
                    <input type="number" name="year" class="form-control" min="1990" max="2021" id="datepicker"> 
            </div> 
        </div> 



            
          </div>
        </div> 
    </div>
    
</div>
<div class="card-footer"><input type='submit' name='add' value='Add Car' class='btn btn-lg btn-outline-primary'></div>
</div>
</form>
</div>
</div>



                <!--End of Add Cars-->
                </div> 
            </div> 
        </section> 

        <?php
            require 'assets/include/footer_dash.php';
        ?>
    </div>
</body>
</html>