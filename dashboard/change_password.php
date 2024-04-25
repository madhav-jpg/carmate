<?php
        require 'assets/include/connect.php';
        if(isset($_POST['update'])) 
        {
            $q=mysqli_query($c,"select password from customer where mob_num='".$_SESSION['mob_num']."'");
            $info=mysqli_fetch_assoc($q);
            $_POST["old_pass"]=hash("sha256", $_POST["old_pass"]);
            if(($info['password']==$_POST['old_pass'])&&($_POST['new_pass']==$_POST['re_pass']))
            {
                $_POST["new_pass"]=hash("sha256", $_POST["new_pass"]);
                if(mysqli_query($c,"update customer set password='".$_POST['new_pass']."' where mob_num='".$_SESSION['mob_num']."'"))
                {
                    echo "<div class='container-fluid'>
                    <div class='alert alert-success alert-dismissible'>
                        <button type='button' class='close' data-dismiss='alert'> &times; </button>
                        <strong>Your Password Updated Successfully !</strong>
                    </div>
                    </div>";
                }
                else
                {
                    echo "<div class='container-fluid'>
                    <div class='alert alert-danger alert-dismissible'>
                        <button type='button' class='close' data-dismiss='alert'> &times; </button>
                        <strong>You entered something wrong, please try again!</strong>
                    </div>
                    </div>";
                }
            }
            else
            {
                    echo "<div class='container-fluid'>
                    <div class='alert alert-danger alert-dismissible'>
                        <button type='button' class='close' data-dismiss='alert'> &times; </button>
                        <strong>You entered something wrong, please try again!</strong>
                    </div>
                    </div>";
            }
        }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Change Password - CarMate</title>
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

                <!--Chaange Password-->


                <div class="col-xl-9 col-lg-12 col-md-12"> 

<form method="post">

<div class="card mb-0"> 

<div class="card-header"> <h3 class="card-title">Edit Profile</h3> 
</div> 

<div class="card-body"> 



<div class="row"> 

<div class="col-sm-6 col-md-6"> 

<div class="form-group"> 
<label class="form-label">Enter Your Old Password
</label> 
<input type="password" name="old_pass" class="form-control"> 
</div> 
</div> 

<div class="col-sm-6 col-md-6"> 

<div class="form-group"> 
<label class="form-label">Enter New Password
</label> 
<input type="password" name="new_pass" class="form-control"> 
</div> 
</div> 

<div class="col-sm-6 col-md-6"> 

<div class="form-group"> 
<label class="form-label">Confirm Password
</label> 
<input type="password" name="re_pass" class="form-control"> 
</div> 
</div> 


</div> 

</div> 

<div class="card-footer"> <input type="submit" class="btn btn-success" name="update" value="Update Password"> 
</div> 
</div> 
</form>
</div>



                <!--End of Change Password-->
                </div> 
            </div> 
        </section> 

        <?php
            require 'assets/include/footer_dash.php';
        ?>
    </div>
</body>
</html>