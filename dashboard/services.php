<?php
        if(!isset($_POST['book']))
            header("Location:404.php");     
        require 'assets/include/connect.php';
        if($_POST['service_name']=='Custom Repairs')
                        //$q=mysqli_query($c,"select distinct s_p.* from service_price s_p,indexed_services i_s where s_p.name!=(select name from indexed_services) && s_p.name not like '%Wheel%'");
                        $q=mysqli_query($c,"select s_p.* from service_price s_p left join indexed_services i_s on s_p.name=i_s.name where i_s.name is null and s_p.name not like '%Wheel%'");
        else if($_POST['service_name']=='Wheel Care')
                        $q=mysqli_query($c,"select * from service_price where name like '%Wheel%'");
        // else
        //  {
        //      //$q=mysqli_query($c,"select * from service_price where name='".$_POST['service_name']."'");
        //     setcookie()                        
        //  }              

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Services - CarMate</title>
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

                <!--Appointments-->

<div class='col-xl-15 col-lg-15 col-md-15' > 
<div class="card mb-18" style="width: 55rem"> 

<div class="card-header"> <h3 class="card-title"><?php echo $_POST['service_name']; ?></h3> 
</div> 

<div class="card-body"> 

<div class="table-responsive border-top"> 
    <form method='post' action="select_car.php">
                <?php
                    


        $rows=mysqli_num_rows($q);

    if($rows>0)
    {
        echo "<table class='table table-bordered table-hover text-nowrap'> 
            <thead align='center'>
                <tr>
                    <th rowspan=2>Name
                    </th>
                    <th colspan=5>Price
                    </th>
                    <th rowspan=2>Add
                    </th>
                </tr> ";
            
        echo "<tr>
                    <th>Small
                    </th>
                    <th>Medium
                    </th>
                    <th>Big
                    </th>
                    <th>Premium
                    </th>
                    <th>SUV
                    </th>
                </tr> </thead>";
        while($service_price=mysqli_fetch_assoc($q))
        {
            echo "<tbody>
                <tr>
                    <td>".$service_price['name']."
                    </td>
                    <td>".$service_price['sm']."
                    </td>
                    <td>".$service_price['md']."
                    </td>
                    <td>".$service_price['bg']."
                    </td>
                    <td>".$service_price['pr']."
                    </td>
                    <td>".$service_price['sv']."
                    </td>
                    <td align='center'><input type='checkbox' name='checked[]' value='".$service_price['id']."'>
                    </td>
            </tbody>";
        }
        echo "</table>"; 
        echo "
 </div></div>

<div class='card-footer pt-4 pb-4 text-center'><div class='item-card9-footer d-md-flex float-right'>
    <input type='hidden' name='service_name' value='".$_POST['service_name']."'>
<input type='submit' class='btn btn-success' name='checked_services' value='Book Services'>
</div></div> ";
    }
    else
    {
        echo "<br><div align='center'>Oops !<br>No Services Found.</div>";
    }

                ?>
</form>
</div>
</div>

                <!--End of Appointments-->
                </div> 
            </div> 
        </section> 

        <?php
            require 'assets/include/footer_dash.php';
        ?>
    </div>
</body>
</html>