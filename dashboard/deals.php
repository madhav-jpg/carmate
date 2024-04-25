<?php
        require 'assets/include/connect.php';
        $icon=array("engine"=>"turbo","tyre"=>"tyre","diagnostic"=>"car-repair","batteries"=>"battery","parts"=>"electricity","other"=>"car-1");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Deals - CarMate</title>
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




<!-- <div class="service-style-1 section-padding">
            <div class="container">
                
                
                <div class="row">
                   
                    
                </div>
            </div>
        </div>
 -->










     <div class='card mb-0' style="width: 55rem"> 

<div class='card-header'> <h3 class='card-title'>Deals for You</h3> 
</div> 

<div class='card-body'>     
    <div class="row">
                
                     <?php
                        
                        $q=mysqli_query($c,"SELECT `category`, `name`, `description`, `wshop_no`, `from_date`, `till_date` FROM `deals` WHERE from_date<='".date("Y-m-d")."' && till_date>='".date("Y-m-d")."'");

                        while ($row=mysqli_fetch_assoc($q)) {
                          $name=mysqli_query($c,"select name from workshops where wshop_no='".$row['wshop_no']."'");
                          $details=mysqli_fetch_assoc($name);
                            echo "<div class='card'>
                                    <div class='card-header'>";
                                      
                                          echo "  <i class='fi flaticon-".$icon[$row['category']]."'></i>
                                        </div>";
                                        echo "<div class='card-body'>
                                            <h2>".$row['name']."</h2>
                                            <p>".$row['description']."</p>
                                            <p> Valid From ".$row['from_date']." To ".$row['till_date']."</p>
                                            <p align='right'>".$details['name']."</p>
                                        </div>  
                                    </div>";
                        }
                    
                    ?>
                    

     
    </div>
</div>
</div>



<!-- <div class="row row-cols-2 row-cols-md-3 g-4">

    <div class="col">
    <div class="card">
      <img class="sprite-custom-repair" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAASwAAADIAQMAAABoEU4WAAAAA1BMVEX///+nxBvIAAAAAXRSTlMAQObYZgAAAB5JREFUeNrtwTEBAAAAwqD1T20Hb6AAAAAAAAAA4DceeAABveM0HgAAAABJRU5ErkJggg==">
      <div class="card-body">
        <h5 class="card-title">Custom Repairs</h5>
        <p class="card-text">Suspension, Brakes, Transmission and Engine. We repair everything!</p>
      </div>
      <div class="card-footer">
          <input type="submit" class="btn btn-outline-danger btn-rounded" name="" value="Book Now">
  
      </div>
    </div>
  </div>


  <div class="col">
    <div class="card">
      <img class="sprite-general-service" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAASwAAADIAQMAAABoEU4WAAAAA1BMVEX///+nxBvIAAAAAXRSTlMAQObYZgAAAB5JREFUeNrtwTEBAAAAwqD1T20Hb6AAAAAAAAAA4DceeAABveM0HgAAAABJRU5ErkJggg==">
      <div class="card-body">
        <h5 class="card-title">General Service</h5>
        <p class="card-text">Periodic Maintenance through OEM recommended car service procedures for your car.</p>
      </div>
      <div class="card-footer">
          <input type="submit" class="btn btn-outline-danger btn-rounded" name="" value="Book Now">
  
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card">
      <img class="sprite-insurance" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAASwAAADIAQMAAABoEU4WAAAAA1BMVEX///+nxBvIAAAAAXRSTlMAQObYZgAAAB5JREFUeNrtwTEBAAAAwqD1T20Hb6AAAAAAAAAA4DceeAABveM0HgAAAABJRU5ErkJggg==">
      <div class="card-body">
        <h5 class="card-title">Car Scanning and Reporting</h5>
        <p class="card-text">The diagnostic software in the scanner will check the vehicle systems for fault codes and performance.</p>
      </div>
      <div class="card-footer">
          <input type="submit" class="btn btn-outline-danger btn-rounded" name="" value="Book Now">
      </div>
    </div>
  </div>

  







  


</div>
  <div class="row row-cols-2 row-cols-md-3 g-4">

  <div class="col">
    <div class="card">
      <img class="sprite-dryclean-spa" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAASwAAADIAQMAAABoEU4WAAAAA1BMVEX///+nxBvIAAAAAXRSTlMAQObYZgAAAB5JREFUeNrtwTEBAAAAwqD1T20Hb6AAAAAAAAAA4DceeAABveM0HgAAAABJRU5ErkJggg==">
      <div class="card-body">
        <h5 class="card-title">Dry Cleaning & Spa</h5>
        <p class="card-text">Doorstep cleaning services with 3M products done by trained professionals</p>
      </div>
      <div class="card-footer">
          <input type="submit" class="btn btn-outline-danger btn-rounded" name="" value="Book Now">
  
      </div>
    </div>
  </div>
  

  <div class="col">
    <div class="card">
      <img class="sprite-pre-purchase-inspection" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAASwAAADIAQMAAABoEU4WAAAAA1BMVEX///+nxBvIAAAAAXRSTlMAQObYZgAAAB5JREFUeNrtwTEBAAAAwqD1T20Hb6AAAAAAAAAA4DceeAABveM0HgAAAABJRU5ErkJggg==">
      <div class="card-body">
        <h5 class="card-title">Battery Testing and Reporting</h5>
        <p class="card-text">Test if your battery is running correctly and to charge or replace if necessary.</p>
      </div>
      <div class="card-footer">
          <input type="submit" class="btn btn-outline-danger btn-rounded" name="" value="Book Now">
  
      </div>
    </div>
  </div>
  


  <div class="col">
    <div class="card">
      <img class="sprite-denting-painting" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAASwAAADIAQMAAABoEU4WAAAAA1BMVEX///+nxBvIAAAAAXRSTlMAQObYZgAAAB5JREFUeNrtwTEBAAAAwqD1T20Hb6AAAAAAAAAA4DceeAABveM0HgAAAABJRU5ErkJggg==">
      <div class="card-body">
        <h5 class="card-title">Denting Painting</h5>
        <p class="card-text">Best in class denting and painting job with state of the art paint booths.</p>
      </div>
      <div class="card-footer">
          <input type="submit" class="btn btn-outline-danger btn-rounded" name="" value="Book Now">
  
      </div>
    </div>
  </div>



</div>


<div class="row row-cols-1 row-cols-md-3 g-4">


  <div class="col">
    <div class="card">
      <img class="sprite-ac-service" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAASwAAADIAQMAAABoEU4WAAAAA1BMVEX///+nxBvIAAAAAXRSTlMAQObYZgAAAB5JREFUeNrtwTEBAAAAwqD1T20Hb6AAAAAAAAAA4DceeAABveM0HgAAAABJRU5ErkJggg==">
      <div class="card-body">
        <h5 class="card-title">AC/Heater Service</h5>
        <p class="card-text">Customized AC repair packages for your car to put you in control of your car's temprature</p>
      </div>
      <div class="card-footer">
          <input type="submit" class="btn btn-outline-danger btn-rounded" name="" value="Book Now">
  
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card">
      <img class="sprite-wheel-care" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAASwAAADIAQMAAABoEU4WAAAAA1BMVEX///+nxBvIAAAAAXRSTlMAQObYZgAAAB5JREFUeNrtwTEBAAAAwqD1T20Hb6AAAAAAAAAA4DceeAABveM0HgAAAABJRU5ErkJggg==">
      <div class="card-body">
        <h5 class="card-title">Wheel Care</h5>
        <p class="card-text">New Tyres, wheel alignment and balancing facility available at your doorstep and across all our workshops</p>
      </div>
      <div class="card-footer">
          <input type="submit" class="btn btn-outline-danger btn-rounded" name="" value="Book Now">
  
      </div>
    </div>
  </div>
  
</div>


</div>
</div>
</div> -->
                <!--End of Car Services-->





<!-- <section id="features">
    <div class="centered">
        
        <div class="row">
            <div class="col-sm-12 col-md-12 text-center">
                <h2 class="section-heading">Why Choose Us?</h2>
            </div>
        </div>

        <div class="row">
                   
            <div class="icon-item col-sm-3">
                <div class="icon">
                    <img src="../dfm8vuuzt40ty.cloudfront.net/home/features/pickup.png" class="" alt="Free Pickup and Drop">
                </div>
                <div class="content">
                    <div class="heading">
                        Free Pickup and Drop
                        <div class="sub-heading">
                            is provided by us for all car services that you book through our platform
                        </div>
                    </div>
                </div>
            </div>

            <div class="icon-item col-sm-3">
                <div class="icon">
                    <img src="../dfm8vuuzt40ty.cloudfront.net/home/features/standardize.png" class="" alt="Trusted Service Partners">
                </div>
                <div class="content">
                    <div class="heading">
                        Trusted Partners
                        <div class="sub-heading">
                            All our service centers are equipped with best in class facilities and technology
                        </div>
                    </div>
                </div>
            </div>

            <div class="icon-item col-sm-3">
                <div class="icon">
                    <img src="../dfm8vuuzt40ty.cloudfront.net/home/features/parts.png" class="" alt="Genuine Parts">
                </div>
                <div class="content">
                    <div class="heading">
                        Genuine Parts
                        <div class="sub-heading">
                            We use OEM / OEM equivalent parts to ensure that you get the best service for your car
                        </div>
                    </div>
                </div>
            </div>

            <div class="icon-item col-sm-3">
                <div class="icon">
                    <img src="../dfm8vuuzt40ty.cloudfront.net/home/features/trusted.png" class="" alt="1000 KM Warranty">
                </div>
                <div class="content">
                    <div class="heading">
                        1000 KM Warranty
                        <div class="sub-heading">
                            Get 1 Month / 1000 KM Warranty on each service and for every part replaced upto Rs 5000
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> -->





                <!-- services -->
<!-- <section id="services">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 text-center">
                <h2 class="section-heading">Services We Offer</h2>
            </div>
        </div>

        <div class="row"> 
            
            <div class="col-md-3 col-sm-3 col-xs-12">
                                    <a href="services/basic.html">
                                <div class="icon-item">
                    <div class="icon">
                        <img class="sprite-general-service" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAASwAAADIAQMAAABoEU4WAAAAA1BMVEX///+nxBvIAAAAAXRSTlMAQObYZgAAAB5JREFUeNrtwTEBAAAAwqD1T20Hb6AAAAAAAAAA4DceeAABveM0HgAAAABJRU5ErkJggg==" alt="Car Service" />
                    </div>
                    <div class="content">
                        <div class="heading">    
                            General Service
                        </div>
                        <div class="sub-heading">
                            Periodic Maintenance through OEM recommended car service procedures for your car.
                        </div>
                    </div>
                    <div class="link">
                        Explore Service Packages >>
                    </div>
                </div>
                </a>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-12">
                                    <a href="services/denting-painting.html">
                                <div class="icon-item">
                    <div class="icon">
                        <img class="sprite-insurance" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAASwAAADIAQMAAABoEU4WAAAAA1BMVEX///+nxBvIAAAAAXRSTlMAQObYZgAAAB5JREFUeNrtwTEBAAAAwqD1T20Hb6AAAAAAAAAA4DceeAABveM0HgAAAABJRU5ErkJggg==" alt="Car Insurance Claims" />
                    </div>
                    <div class="content">
                        <div class="heading">
                            Insurance Claims
                        </div>
                        <div class="sub-heading">
                            Hassle free claims for cashless and zero debt insurance through all insurance providers.
                        </div>
                    </div>
                    <div class="link">
                        Explore Claim Settlement >>
                    </div>
                </div>
                </a>
            </div>    
            <div class="col-md-3 col-sm-3 col-xs-12">
                                    <a href="services/denting-painting.html">
                                <div class="icon-item">
                    <div class="icon">
                        <img class="sprite-denting-painting" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAASwAAADIAQMAAABoEU4WAAAAA1BMVEX///+nxBvIAAAAAXRSTlMAQObYZgAAAB5JREFUeNrtwTEBAAAAwqD1T20Hb6AAAAAAAAAA4DceeAABveM0HgAAAABJRU5ErkJggg==" alt="Car Denting Painting" />
                    </div>
                    <div class="content">
                        <div class="heading">
                            Denting Painting
                        </div>
                        <div class="sub-heading">
                            Best in class denting and painting job with state of the art paint booths.
                        </div>
                    </div>
                    <div class="link">
                        Explore Denting Painting Prices >>
                    </div>
                </div>
                </a>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-12">
                                    <a href="services/complete-car-detailing.html">
                                <div class="icon-item">
                    <div class="icon">
                        <img class="sprite-dryclean-spa" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAASwAAADIAQMAAABoEU4WAAAAA1BMVEX///+nxBvIAAAAAXRSTlMAQObYZgAAAB5JREFUeNrtwTEBAAAAwqD1T20Hb6AAAAAAAAAA4DceeAABveM0HgAAAABJRU5ErkJggg==" alt="Car Cleaning" />
                    </div>
                    <div class="content">
                        <div class="heading">
                            DryCleaning & Spa
                        </div>
                        <div class="sub-heading">
                            Doorstep cleaning services with 3M products done by trained professionals
                        </div>
                    </div>
                    <div class="link">
                        Explore Cleaning Packages >>
                    </div>
                </div>
                </a>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-12">
                <a href="car-inquiry/pre-purchase-car-inspection.html">
                <div class="icon-item">
                    <div class="icon">
                        <img class="sprite-pre-purchase-inspection" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAASwAAADIAQMAAABoEU4WAAAAA1BMVEX///+nxBvIAAAAAXRSTlMAQObYZgAAAB5JREFUeNrtwTEBAAAAwqD1T20Hb6AAAAAAAAAA4DceeAABveM0HgAAAABJRU5ErkJggg==" alt="Pre Purchase Car Inspection" />
                    </div>
                    <div class="content">
                        <div class="heading">Pre Purchase Inspection
                        </div>
                        <div class="sub-heading">
                            Don't buy a lemon. Get a pre purchase inspection before you buy your next car
                        </div>
                    </div>
                    <div class="link">
                        Get your new car inspected >>
                    </div>
                </div>
                </a>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-12">
                                    <a href="services/custom.html">
                                <div class="icon-item">
                    <div class="icon">
                        <img class="sprite-custom-repair" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAASwAAADIAQMAAABoEU4WAAAAA1BMVEX///+nxBvIAAAAAXRSTlMAQObYZgAAAB5JREFUeNrtwTEBAAAAwqD1T20Hb6AAAAAAAAAA4DceeAABveM0HgAAAABJRU5ErkJggg==" alt="Custom Repairs" />
                    </div>
                    <div class="content">
                        <div class="heading">Custom Repairs
                        </div>
                        <div class="sub-heading">
                            Suspension, Brakes, Transmission and Engine. We repair everything!
                        </div>
                    </div>
                    <div class="link">
                        Explore repair packages >>
                    </div>
                </div>
                </a>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-12">
                                    <a href="services/ac-heater-service.html">
                                <div class="icon-item">
                    <div class="icon">
                        <img class="sprite-ac-service" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAASwAAADIAQMAAABoEU4WAAAAA1BMVEX///+nxBvIAAAAAXRSTlMAQObYZgAAAB5JREFUeNrtwTEBAAAAwqD1T20Hb6AAAAAAAAAA4DceeAABveM0HgAAAABJRU5ErkJggg==" alt="Car AC/Heater Service" />
                    </div>
                    <div class="content">
                        <div class="heading">
                            AC/Heater Service
                        </div>
                        <div class="sub-heading">
                            Customized AC repair packages for your car to put you in control of your car's temprature
                        </div>
                    </div>
                    <div class="link">
                        Explore AC/Heater Service Packages >>
                    </div>
                </div>
                </a>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-12">
                                    <a href="services/wheel-care.html">
                                <div class="icon-item">
                    <div class="icon">
                        <img class="sprite-wheel-care" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAASwAAADIAQMAAABoEU4WAAAAA1BMVEX///+nxBvIAAAAAXRSTlMAQObYZgAAAB5JREFUeNrtwTEBAAAAwqD1T20Hb6AAAAAAAAAA4DceeAABveM0HgAAAABJRU5ErkJggg==" alt="Wheel Alignment Balancing" />
                    </div>
                    <div class="content">
                        <div class="heading">
                            Wheel Care
                        </div>
                        <div class="sub-heading">
                            New Tyres, wheel alignment and balancing facility available at your doorstep and across all our workshops
                        </div>
                    </div>
                    <div class="link">
                        Explore Wheel Care Packages >>
                    </div>
                </div>
                </a>
            </div>

        </div>
    </div>
</section> -->
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