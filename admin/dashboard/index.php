<?php
        require 'assets/include/connect.php';
        if(!in_array($curPageName, $sites))
            header("Location:404.php");

        if(isset($_POST['change_status']))
            mysqli_query($c,"update appointments set status='".$_POST['new_status']."' where apmt_no=".$_POST['apmt_no']);
        // $q=mysqli_query($c,"select type,wshop_no from admin where mob_num=".$_SESSION['adm_num']."");
        // $adm=mysqli_fetch_assoc($q);
        
        if($data['type']=="Superuser")
        {

          if(!$apmt_today['ots']=mysqli_query($c,"select a.apmt_no, a.apmt_date, a.status, r_s.num_plate,s_p.name as service_name , w.name as wshop_name, w.city from appointments a,reg_services r_s, service_price s_p, workshops w where a.wshop_no=w.wshop_no && a.reg_no=r_s.reg_no && r_s.s_id=s_p.id && a.apmt_date='".date("Y-m-d")."'"))
            echo mysqli_error($c);
          if(!$apmt_today['amc']=mysqli_query($c,"select a.apmt_no, a.apmt_date, a.status, r_s.num_plate, w.name as wshop_name, w.city from appointments a,reg_services r_s,  workshops w where a.wshop_no=w.wshop_no && a.reg_no=r_s.reg_no && r_s.s_id=0 && a.apmt_date='".date("Y-m-d")."'"))
            echo mysqli_error($c);

          if(!$apmt_up['ots']=mysqli_query($c,"select a.apmt_no, a.apmt_date, a.status, r_s.num_plate,s_p.name as service_name , w.name as wshop_name, w.city from appointments a,reg_services r_s, service_price s_p, workshops w where a.wshop_no=w.wshop_no && a.reg_no=r_s.reg_no && r_s.s_id=s_p.id && a.apmt_date>'".date("Y-m-d")."'"))
            echo mysqli_error($c);
          if(!$apmt_up['amc']=mysqli_query($c,"select a.apmt_no, a.apmt_date, a.status, r_s.num_plate, w.name as wshop_name, w.city from appointments a,reg_services r_s,  workshops w where a.wshop_no=w.wshop_no && a.reg_no=r_s.reg_no && r_s.s_id=0 && a.apmt_date>'".date("Y-m-d")."'"))
            echo mysqli_error($c);
        }
        else
        {
          if(!$apmt_today['ots']=mysqli_query($c,"select a.apmt_no, a.apmt_date, a.status, r_s.num_plate,s_p.name as service_name , w.name as wshop_name, w.city from appointments a,reg_services r_s, service_price s_p, workshops w where a.reg_no=r_s.reg_no && r_s.s_id=s_p.id && a.wshop_no=w.wshop_no && w.wshop_no=".$data['wshop_no']." && a.apmt_date='".date("Y-m-d")."'"))
            echo mysqli_error($c);
          if(!$apmt_today['amc']=mysqli_query($c,"select a.apmt_no, a.apmt_date, a.status, r_s.num_plate, w.name as wshop_name, w.city from appointments a,reg_services r_s,  workshops w where a.reg_no=r_s.reg_no && r_s.s_id=0 && a.wshop_no=w.wshop_no && w.wshop_no=".$data['wshop_no']." && a.apmt_date='".date("Y-m-d")."'"))
            echo mysqli_error($c);

          if(!$apmt_up['ots']=mysqli_query($c,"select a.apmt_no, a.apmt_date, a.status, r_s.num_plate,s_p.name as service_name , w.name as wshop_name, w.city from appointments a,reg_services r_s, service_price s_p, workshops w where a.reg_no=r_s.reg_no && r_s.s_id=s_p.id && a.wshop_no=w.wshop_no && w.wshop_no=".$data['wshop_no']." && a.apmt_date>'".date("Y-m-d")."'"))
            echo mysqli_error($c);
          if(!$apmt_up['amc']=mysqli_query($c,"select a.apmt_no, a.apmt_date, a.status, r_s.num_plate, w.name as wshop_name, w.city from appointments a,reg_services r_s,  workshops w where a.reg_no=r_s.reg_no && r_s.s_id=0 && a.wshop_no=w.wshop_no && w.wshop_no=".$data['wshop_no']." && a.apmt_date>'".date("Y-m-d")."'"))
            echo mysqli_error($c);
        }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Dashboard - CarMate</title>
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

                 <div class='col-xl-15 col-lg-15 col-md-15' > 
<div class="card mb-18" style="width: 56rem"> 

<div class="card-header"> <h3 class="card-title">Appointments</h3> 
</div> 

<div class="card-body"> 

<div class="container">
    <form method="post">
        <div class="btn btn-group">
            <input type="submit" name="view" class="btn btn-info" value="Today's Appointments">
            <input type="submit" name="view" class="btn btn-info" value="Upcoming Appointments">
        </div>
    </form>
    
</div>
<div class="tab-content">
<div class="table-responsive border-top"> 
<?php
    
if(((isset($_POST['view']))&&($_POST['view']=="Today's Appointments"))||(!isset($_POST['view'])))
{
    
    $rows_ots=mysqli_num_rows($apmt_today['ots']);
    $rows_amc=mysqli_num_rows($apmt_today['amc']);
    if(($rows_ots>0)||($rows_amc>0))
    {
        echo "<table class='table table-bordered table-hover text-nowrap'> 
        <caption style='caption-side:top; text-align:center'>Today's Appointments</caption>
            <thead>
                <tr>
                    <th>Sr No
                    </th>
                    <th>Number Plate
                    </th>
                    <th>Date
                    </th>
                    <th>Service Name
                    </th>
                    <th>Status
                    </th>
                    <th>Workshop Name
                    </th>
                    <th>Change Status
                    </th>
                </tr> 
            </thead>";

            echo "<tbody>";
        
            while($rows=mysqli_fetch_assoc($apmt_today['ots']))
            {
                
                    echo "<tr>
                        <th>APMT".$rows['apmt_no']."
                        </th>
                        <th>".$rows['num_plate']."
                        </th>
                        <th>".$rows['apmt_date']."
                        </th>
                        <th>".$rows['service_name']."
                        </th>
                        <th>".$rows['status']."
                        </th>
                        <th>".$rows['wshop_name']."
                        </th>
                        <th>
                            <form method='post'>
                                <input type='hidden' name='apmt_no' value='".$rows['apmt_no']."'>
                                <select name='new_status'>
                                    <option>Remaining</option>
                                    <option>In Progress</option>
                                    <option>Completed</option>
                                </select>
                                <input type='submit' name='change_status' class='zmdi zmdi-check material-icons-name' value='&emsp;'>
                            </form>
                        </th>";
            }

            while($rows=mysqli_fetch_assoc($apmt_today['amc']))
            {
                echo "<tr>
                        <th>APMT".$rows['apmt_no']."
                        </th>
                        <th>".$rows['num_plate']."
                        </th>
                        <th>".$rows['apmt_date']."
                        </th>
                        <th>AMC
                        </th>
                        <th>".$rows['status']."
                        </th>
                        <th>".$rows['wshop_name']."
                        </th>
                        <th>
                            <form method='post'>
                                <input type='hidden' name='apmt_no' value='".$rows['apmt_no']."'>
                                <select name='new_status'>
                                    <option>Remaining</option>
                                    <option>In Progress</option>
                                    <option>Completed</option>
                                </select>
                                <input type='submit' name='change_status' class='zmdi zmdi-check material-icons-name' value='&emsp;'>
                            </form>
                        </th>";
            }
        echo "</tbody>";
echo "</table>"; 
    }
    else
        echo "<br><div align='center'>No appointments found</div>";
    
}
else if((isset($_POST['view']))&&($_POST['view']=="Upcoming Appointments"))
{
    $rows_ots=mysqli_num_rows($apmt_up['ots']);
    $rows_amc=mysqli_num_rows($apmt_up['amc']);
    if(($rows_ots>0)||($rows_amc>0))
    {   
        echo "<table class='table table-bordered table-hover text-nowrap'> 
        <caption style='caption-side:top; text-align:center'>Upcoming Appointments</caption>
            <thead>
                <tr>
                    <th>Appointment Number
                    </th>
                    <th>Number Plate
                    </th>
                    <th>Date
                    </th>
                    <th>Service Name
                    </th>
                    <th>Status
                    </th>
                    <th>Workshop Name
                    </th>
                </tr> 
            </thead>";

            echo "<tbody>";
        while($rows=mysqli_fetch_assoc($apmt_up['ots']))
        {
            
                echo "<tr>
                    <th>APMT".$rows['apmt_no']."
                    </th>
                    <th>".$rows['num_plate']."
                    </th>
                    <th>".$rows['apmt_date']."
                    </th>
                    <th>".$rows['service_name']."
                    </th>
                    <th>".$rows['status']."
                    </th>
                    <th>".$rows['wshop_name']."
                    </th>";
        }
        while($rows=mysqli_fetch_assoc($apmt_up['amc']))
        {
            echo "<tr>
                    <th>APMT".$rows['apmt_no']."
                    </th>
                    <th>".$rows['num_plate']."
                    </th>
                    <th>".$rows['apmt_date']."
                    </th>
                    <th>AMC
                    </th>
                    <th>".$rows['status']."
                    </th>
                    <th>".$rows['wshop_name']."
                    </th>";
        }
        echo "</tbody>";
echo "</table>"; 
    }
    else
        echo "<br><div align='center'>No upcoming appointments found</div>";
}
    
?>
</div> 

</div>


</div>
</div>
</div>
    
                <!-- services END -->

                </div> 
            </div> 
        </section> 

        <?php
            require 'assets/include/footer_dash.php';
        ?>
    </div>
</body>
</html>