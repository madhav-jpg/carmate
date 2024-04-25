<?php
        require 'assets/include/connect.php';
        if(!in_array($curPageName,$sites))
            header("Location:404.php");
        if(isset($_POST["add"]))
        {
            
            $qry="insert into workshops(`name`, `area`, `landmark`, `city`, `pincode`) values('".$_POST['wshop_name']."','".$_POST['area']."','".$_POST['landmark']."','".$_POST['city']."',".$_POST['pincode'].")";
            
            if(mysqli_query($c,$qry))
            {    echo "<div class='container-fluid'>
                    <div class='alert alert-success alert-dismissible'>
                        <button type='button' class='close' data-dismiss='alert'> &times; </button>
                        <strong>New Workshop Added Successfully !</strong>
                    </div>
                    </div>";
            }
            else
                echo mysqli_error($c);
        }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Add Workshop - CarMate</title>
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


<div class="col-xl-9 col-lg-12 col-md-12"> 

<form method="post">

<div class="card mb-0"> 

<div class="card-header"> <h3 class="card-title">Add New Workshop</h3> 
</div> 

<div class="card-body"> 



<div class="row"> 

<div class="col-sm-6 col-md-8"> 

<div class="form-group"> 
<label class="form-label">Workshop Name
</label> 
<input type="text" name="wshop_name" class="form-control" required> 
</div> 
</div> 

<div class="col-sm-6 col-md-6"> 

<div class="form-group"> 
<label class="form-label">Area
</label> 
<textarea name="area" cols=55 required></textarea>  
</div> 
</div> 

<div class="col-sm-6 col-md-6"> 

<div class="form-group"> 
<label class="form-label">Landmark
</label> 
<textarea name="landmark" cols=55 required></textarea>
</div> 
</div> 

<div class="col-sm-6 col-md-4"> 

<div class="form-group"> 
<label class="form-label">City
</label> 
<select name="city" class="form-control" > 
<?php
        $disp=mysqli_query($c,"select name from city");
        // echo "<datalist id='city'>";
            while($row=mysqli_fetch_array($disp)) 
            {
                echo "<option>".$row['name']."</option>";
            }
?>
</select>
</div> 
</div> 

 <div class="col-sm-6 col-md-4"> 
<div class="form-group"> 
<label class="form-label">Pincode
</label> 
<input type="tel" name="pincode" class="form-control" pattern="[0-9]{6}"> 
</div> 
</div> 


</div>
</div>
<div class="card-footer"> <input type="submit" class="btn btn-success" name="add" value="Add Admin"> 
</div> 
</div> 
</form>
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