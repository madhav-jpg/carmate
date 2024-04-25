<?php
        require 'assets/include/connect.php';
       
        if(!in_array($curPageName, $sites))
            header("Location:404.php");
        
        $flag=true;
            
        if(isset($_GET['type']))
        {
            if($_GET['type']=="Superuser")
            {
                $flag=false;
                $_POST['wshop_no']=0;
            }
        }
        
        if(isset($_POST["add"]))
        {   
            // $d_wshop=mysqli_fetch_assoc($wshop);
            // $num=mysqli_query($c,"select wshop_no from workshops where name='".$d_wshop['name']."'");
            // $num=mysqli_fetch_assoc($num);
            $_POST['password']=hash("sha256", $_POST['password']);
            $qry="insert into admin values(".$_POST['mob_num'].",'".$_POST['f_name']."','".$_POST['s_name']."','".$_POST['email']."','".$_POST['type']."','".$_POST['password']."',".$_POST['wshop_name'].")";
            
            if(mysqli_query($c,$qry))
            {    echo "<div class='container-fluid'>
                    <div class='alert alert-success alert-dismissible'>
                        <button type='button' class='close' data-dismiss='alert'> &times; </button>
                        <strong>New Admin Added Successfully !</strong>
                    </div>
                    </div>";
            }
            else
                echo mysqli_error($c);
        }
        if($r_wshop==0)
        {
            echo "<div class='container-fluid'>
                    <div class='alert alert-warning alert-dismissible'>
                        <button type='button' class='close' data-dismiss='alert'> &times; </button>
                        <strong>Please Add Workshop first</strong>
                    </div>
                    </div>";
        }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Add Admin - CarMate</title>
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

<div class="card-header"> <h3 class="card-title">Add New Admin</h3> 
</div> 

<div class="card-body"> 



<div class="row"> 


<div class="col-sm-6 col-md-4"> 

<div class="form-group"> 
<label class="form-label">Admin Type
</label> 
<select name="type" class="form-control" onchange="doReload(this.value);"> 
    <?php
    foreach($adm_type as $adm) 
    {
        echo "<option";
        if((isset($_GET['type']))&&($_GET['type']==$adm))
            echo " selected";
        echo ">$adm</option>";
    }
    ?>
</select>
</div> 
</div> 


<div class="col-sm-6 col-md-4"> 
<div class="form-group"> 
<label class="form-label">Workshop Name
</label> 
<select name="wshop_name" class="form-control">
    <?php
        if($flag=='true')
        {
            while($row=mysqli_fetch_array($wshop)) 
            {
                echo "<option value=".$row['wshop_no'].">".$row['name']."</option>";
            }
        }
        else
            echo "<option selected disabled>---</option>";
    ?>
</select>
</div> 
</div> 


<div class="col-sm-6 col-md-6"> 

<div class="form-group"> 
<label class="form-label">First Name
</label> 
<input type="text" name="f_name" class="form-control" required> 
</div> 
</div> 

<div class="col-sm-6 col-md-6"> 

<div class="form-group"> 
<label class="form-label">Last Name
</label> 
<input type="text" name="s_name" class="form-control" required> 
</div> 
</div> 

<div class="col-sm-6 col-md-6"> 

<div class="form-group"> 
<label class="form-label">Email address
</label> 
<input type="email" name="email" class="form-control" required> 
</div> 
</div> 

<div class="col-sm-6 col-md-6"> 

<div class="form-group"> 
<label class="form-label">Phone Number
</label> 
<input type="tel" name="mob_num" class="form-control" required> 
</div> 
</div> 


 <div class="col-sm-6 col-md-4"> 

<div class="form-group"> 
<label class="form-label">Create Password
</label> 
<input type="Password" name="password" class="form-control" required> 
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