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

        <!-- Sing in  Form -->
        <section class="sign-in">
            <div class="container">
                <div class="signin-content">
                    <div class="signin-image">
                        <figure><img src="images/signin-image.jpg" alt="sing up image"></figure>
                    </div>

                    <div class="signin-form">
                        <h2 class="form-title">Admin Login</h2>
                        <form method="POST" class="register-form" id="login-form">
                            <div class="form-group">
                                <label for="mob_num"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="tel" name="mob_num" id="mob_num" placeholder="Mobile Number" <?php if(isset($mob_num)) echo "value=$mob_num"; ?>>
                            </div>
                            <div class="form-group">
                                <label for="pass"><i class="zmdi zmdi-lock material-icons-name"></i></label>
                                <input type="password" name="pass" id="pass" placeholder="Password">
                            </div>
                            <?php
                                if(isset($alert))
                                    echo "<div><span style='color: red'>$alert</span></div>";
                            ?>
                            <div class="form-group form-button">
                                <input type="submit" name="lg" id="signin" class="form-submit" value="Login"/>
                            </div>
                        </form>
                        <!-- <div class="social-login">
                            <span class="social-label">Or login with</span>
                            <ul class="socials">
                                <li><a href="#"><i class="display-flex-center zmdi zmdi-facebook"></i></a></li>
                                <li><a href="#"><i class="display-flex-center zmdi zmdi-twitter"></i></a></li>
                                <li><a href="#"><i class="display-flex-center zmdi zmdi-google"></i></a></li>
                            </ul>
                        </div> -->
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