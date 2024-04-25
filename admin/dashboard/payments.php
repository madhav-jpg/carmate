<?php
        require 'assets/include/connect.php';
        if(!in_array($curPageName, $sites))
            header("Location:404.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Payment - CarMate</title>
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






<div class='col-xl-15 col-lg-15 col-md-15' > 
<div class="card mb-18" style="width: 55rem"> 

<div class="card-header"> <h3 class="card-title">Payments</h3> 
</div> 

<div class="card-body"> 

<div class="table-responsive border-top"> 
<?php

    if(!$res['ots']=mysqli_query($c,"select p_s.payment_id,c.f_name,c.s_name,p_s.payment_date,p_s.amount,r_s.num_plate,s_p.name from payment_status p_s,customer c, reg_services r_s, service_price s_p where c.cus_id=p_s.cus_id && c.cus_id=r_s.cus_id && r_s.reg_no=p_s.reg_no && s_p.id=r_s.s_id"))
        echo mysqli_error($c);
    if(!$res['amc']=mysqli_query($c,"select p_s.payment_id,c.f_name,c.s_name,p_s.payment_date,p_s.amount,r_s.num_plate from payment_status p_s, customer c, reg_services r_s where c.cus_id=p_s.cus_id && c.cus_id=r_s.cus_id && r_s.reg_no=p_s.reg_no && r_s.s_id=0"))
        echo mysqli_error($c);

    // $res=mysqli_query($c,"select p_s.payment_id, p_s.payment_date, s_p.name, p_s.amount from payment_status p_s, service_price s_p where p_s.cus_id='".$data["cus_id"]."' &&  s_p.id=p_s.s_id");
    $rows_ots=mysqli_num_rows($res['ots']);
    $rows_amc=mysqli_num_rows($res['amc']);
    
    if(($rows_ots>0)||($rows_amc>0))
    {
        echo "<table class='table table-bordered table-hover text-nowrap'> 
            <thead>
                <tr>
                    <th>Invoice ID
                    </th>
                    <th>Name
                    </th>
                    <th>Category
                    </th>
                    <th>Purchase Date
                    </th>
                    <th>Price
                    </th>
                    <th>Number Plate
                    </th>
                </tr> 
            </thead>";

            echo "<tbody>";
        while($payment=mysqli_fetch_assoc($res['ots']))
        {
            echo "
                <tr>
                    <th>INV".$payment['payment_id']."
                    </th>
                    <th>".$payment['f_name']." ".$payment['s_name']."
                    </th>
                    <th>".$payment['name']."
                    </th>
                    <th>".$payment['payment_date']."
                    </th>
                    <th>".$payment['amount']."
                    </th>
                    <th>".$payment['num_plate']."
                    </th>
            ";
        }
        while($payment=mysqli_fetch_assoc($res['amc']))
        {
            echo "
                <tr>
                    <th>INV".$payment['payment_id']."
                    </th>
                    <th>".$payment['f_name']." ".$payment['s_name']."
                    </th>
                    <th>Annual Service
                    </th>
                    <th>".$payment['payment_date']."
                    </th>
                    <th>".$payment['amount']."
                    </th>
                    <th>".$payment['num_plate']."
                    </th>";
        }
echo "</tbody>
</table>"; 
    }
    else
    {
        echo "<br><div align='center'>You have no payment history till now.</div>";
    }
?>
</div> 
<!-- <ul class="pagination"> 
<li class="page-item page-prev disabled"> <a class="page-link" href="#" tabindex="-1">Prev</a> </li> 
<li class="page-item active"><a class="page-link" href="#">1</a></li> 
<li class="page-item"><a class="page-link" href="#">2</a></li> 
<li class="page-item"><a class="page-link" href="#">3</a></li> 
<li class="page-item page-next"> <a class="page-link" href="#">Next</a> </li> 
</ul>  -->
</div> 
</div> 
</div>
                <!--End of Payments-->
                </div> 
            </div> 
        </section> 

        <?php
            require 'assets/include/footer_dash.php';
        ?>
    </div>
</body>
</html>