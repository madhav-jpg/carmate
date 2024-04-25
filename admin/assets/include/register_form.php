<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">

    
</head>
<body>

    <div class="main">
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">Sign up</h2>
                        <form method="POST" class="register-form" id="register-form">
                            <?php
                                if (isset($usr_exists)) {
                                    echo "<div><span style='color: red'>$usr_exists</span></div>";
                                }
                            ?>
                            <div class="form-group">
                                <label for="mob_num"><i class="zmdi zmdi-smartphone-android material-icons-name"></i></label>
                                <input type="tel" name="mob_num" id="mob_num" placeholder="Mobile Number" <?php if(isset($mob_num)) echo "value=$mob_num"; ?>>
                            </div>
                            <div class="form-group">
                                <label for="f_name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="f_name" id="f_name" placeholder="First Name" <?php if(isset($f_name)) echo "value=$f_name"; ?>>
                            </div>
                            <div class="form-group">
                                <label for="s_name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="s_name" id="s_name" placeholder="Last Name" <?php if(isset($s_name)) echo "value=$s_name"; ?>>
                            </div>
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email material-icons-name"></i></label>
                                <input type="email" name="email" id="email" placeholder="Your Email" <?php if(isset($email)) echo "value=$email"; ?>>
                            </div>

                            <div class="form-group">
                                        <label for="city"><i class="zmdi zmdi-city material-icons-name"></i></label>
                                        <?php
                                            require 'assets/include/connect.php';
                                            $disp=mysqli_query($c,"select name from city");
                                            echo "&emsp;&emsp;&emsp;&emsp;<select name='city' placeholder='Select City' style='border:0px; outline:0px;' ";
                                            if (isset($city)) {
                                                echo "value=$city";
                                            }
                                            echo ">";
                                            
                                                while($row=mysqli_fetch_array($disp)) 
                                                {
                                            echo "<option>".$row['name']."</option>";
                                                }
                                                echo "</select>";
                                        ?>
                            </div>

                            <div class="form-group">
                                        <label for="pincode"><i class="zmdi zmdi-pin material-icons-name"></i></label>
                                        <input type="tel" id="pincode" maxlength="6" pattern="[0-9]{6}" title="Enter valid Pincode" name="pincode" <?php if(isset($pincode)) echo "value=$pincode"; ?> placeholder='Pincode'>
                                    </div>

                            <div class="form-group">
                                <label for="pass"><i class="zmdi zmdi-lock material-icons-name"></i></label>
                                <input type="password" name="pass" id="pass" placeholder="Password" pattern=".{8,}" title="eight or more characters" />
                            </div>
                            <div class="form-group">
                                <label for="re_pass"><i class="zmdi zmdi-lock-outline material-icons-name"></i></label>
                                <input type="password" name="re_pass" id="re_pass" placeholder="Confirm Password" pattern=".{8,}" title="eight or more characters" />
                                <span style="color: red"><?php if(isset($pass_err)) echo $pass_err; ?></span>
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="agree-term" id="agree-term" class="agree-term"/>
                                <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree all statements in  <a href="#" class="term-service">Terms of service</a></label>
                            </div>
                            <span style="color: red"><?php if(isset($chk_err)) echo $chk_err; ?></span>
                            <div class="form-group form-button">
                                <input type="submit" name="signup" id="signup" class="form-submit" value="Register"/>
                            </div>
                        </form>
                    </div>
                    <div class="signup-image">
                        <figure><img src="images/signup-image.jpg" alt="sing up image"></figure>
                        <a href="login.php" class="signup-image-link">I am already member</a>
                    </div>
                </div>
            </div>
        </section>
        </div>

    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>