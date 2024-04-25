<?php
        require 'assets/include/connect.php';
         
        if(isset($_COOKIE["payment_status"]))
        {
            if($_COOKIE['payment_status']=="done")
            {
            echo "<div class='container-fluid'>
                    <div class='alert alert-success alert-dismissible'>
                        <button type='button' class='close' data-dismiss='alert'> &times; </button>
                        <strong>Payment Successful !</strong> Book Appointments to service your cars
                    </div>
                    </div>";
            unset($_COOKIE['payment_status']);
            }
        }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Payments - CarMate</title>
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
    $pmt_gen=mysqli_query($c,"select p_s.payment_id, p_s.payment_date, s_p.name, p_s.amount from payment_status p_s, service_price s_p where p_s.cus_id='".$data["cus_id"]."' &&  s_p.id=p_s.s_id");
    $pmt_amc=mysqli_query($c,"select payment_id, payment_date, amount from payment_status where cus_id='".$data["cus_id"]."' &&  s_id=0");
    $rows_gen=mysqli_num_rows($pmt_gen);
    $rows_amc=mysqli_num_rows($pmt_amc);
    if(($rows_gen>0)||($rows_amc>0))
    {
        echo "<table class='table table-bordered table-hover text-nowrap'> 
            <thead>
                <tr>
                    <th>Invoice ID
                    </th>
                    <th>Category
                    </th>
                    <th>Purchase Date
                    </th>
                    <th>Price
                    </th>
                </tr> 
            </thead>";

        while($payment_gen=mysqli_fetch_assoc($pmt_gen))
        {
            echo "<tbody>
                <tr>
                    <td>INV".$payment_gen['payment_id']."
                    </td>
                    <td>".$payment_gen['name']."
                    </td>
                    <td>".$payment_gen['payment_date']."
                    </td>
                    <td>".$payment_gen['amount']."
                    </td>
            </tbody>";
        }

        while($payment_amc=mysqli_fetch_assoc($pmt_amc))
        {
            echo "<tbody>
                <tr>
                    <td>INV".$payment_amc['payment_id']."
                    </td>
                    <td>Annual Service
                    </td>
                    <td>".$payment_amc['payment_date']."
                    </td>
                    <td>".$payment_amc['amount']."
                    </td>
            </tbody>";
        }
echo "</table>"; 
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