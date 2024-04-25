<?php
        require 'assets/include/connect.php';
        if(!in_array($curPageName, $sites))
            header("Location:404.php");
        $wshop=mysqli_query($c,"select name from workshops");
        // $r_wshop=mysqli_num_rows($wshop);

        if(isset($_POST["add"]))
        {   
            // $d_wshop=mysqli_fetch_assoc($wshop);
            // $num=mysqli_query($c,"select wshop_no from workshops where name='".$d_wshop['name']."'");
            // $num=mysqli_fetch_assoc($num);
            // if($num==0)
            // {
            //     echo "<div class='container-fluid'>
            //         <div class='alert alert-warning alert-dismissible'>
            //             <button type='button' class='close' data-dismiss='alert'> &times; </button>
            //             <strong>Please Add Workshop first</strong>
            //         </div>
            //         </div>";
            // }
            // else
            // {
                $qry="INSERT INTO `deals`(`category`, `name`, `description`, `wshop_no`, `from_date`, `till_date`) VALUES ('".$_POST['category']."','".$_POST['deals_name']."','".$_POST['description']."',".$data['wshop_no'].",'".$_POST['from_date']."','".$_POST['till_date']."')";
            
                if(mysqli_query($c,$qry))
                {    echo "<div class='container-fluid'>
                        <div class='alert alert-success alert-dismissible'>
                            <button type='button' class='close' data-dismiss='alert'> &times; </button>
                            <strong>New Deals Added Successfully !</strong>
                        </div>
                        </div>";
                }
                else
                    echo mysqli_error($c);
            // }
        }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Add Deals - CarMate</title>
    <link rel="icon" href="assets/images/car.png" type="image/png"/>

    <?php
        require 'assets/include/link.php';
    ?>

    <script language="javascript" type="text/javascript">
    function doReload(type){
            document.location = 'add_admin.php?type='+type;
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

                <!--Car Services-->


<div class="col-xl-9 col-lg-12 col-md-12"> 

<form method="post">

<div class="card mb-0"> 

<div class="card-header"> <h3 class="card-title">Add New Deals</h3> 
</div> 

<div class="card-body"> 



<div class="row"> 


<div class="col-sm-6 col-md-4"> 
<div class="form-group"> 
<label class="form-label">Category
</label> 
<select name="category" class="form-control">
    <option value="engine">Engine Related</option>
    <option value="tyre">Tyre Related</option>
    <option value="diagnostic">Diagnostic</option>
    <option value="batteries">Batteries Related</option>
    <option value="parts">Car Parts Related</option>
    <option value="other">Other</option>
</select>
</div> 
</div> 

<div class="col-sm-6 col-md-6"> 

<div class="form-group"> 
<label class="form-label">Deals Name
</label> 
<input type="text" name="deals_name" class="form-control" required> 
</div> 
</div> 

<div class="col-sm-12 col-md-12"> 

<div class="form-group"> 
<label class="form-label">Description
</label> 
<textarea name="description" class="form-control" required rows="3" cols="10"></textarea>  
</div> 
</div> 

<div class="col-sm-6 col-md-6"> 

<div class="form-group"> 
<label class="form-label">Valid From
</label> 
<input type="date" name="from_date" class="form-control" required> 
</div> 
</div> 

<div class="col-sm-6 col-md-6"> 

<div class="form-group"> 
<label class="form-label">Valid Till
</label> 
<input type="date" name="till_date" class="form-control" required> 
</div> 
</div> 


</div>
</div>
<div class="card-footer"> <input type="submit" class="btn btn-success" name="add" value="Add Deals"> 
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