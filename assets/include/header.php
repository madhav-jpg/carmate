<!-- Start header -->
<?php
    $curPageName = substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1);
?>
        <br>
        <header id="header" class="site-header header-style-2">
            <nav class="navigation navbar navbar-default">
                <div class="container">
                    <div class="navbar-header">
                        <button type="button" class="open-btn">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="index.php"><img src="assets/images/logo.png"></a>
                    </div>
                    <div id="navbar" class="navbar-collapse collapse navigation-holder navbar-right">
                        <button class="close-navbar"><i class="ti-close"></i></button>
                        <ul class="nav navbar-nav">
                            <?php
                                if($curPageName!='index.php')
                                    echo "<li><a href='index.php'><label>Home</label></a></li>";
                            ?>
                            <li><a href="about.php"><label>About Us</label></a></li>
                            <?php
                                if($curPageName!='services.php')
                                    echo "<li><a href='services.php'><label>Services</label></a></li>";
                            ?>
                            
                            <li><a href="contact.php"><label>Contact</label></a></li>

                            <?php
                                    if(isset($_SESSION["mob_num"]))
                                    {    
                                        echo "<li> <a href='dashboard'><label>Dashboard</label></a> </li>";
                                        echo "<li> <a href='logout.php'><label>Logout</label></a> </li>";
                                    }
                                    elseif(isset($_SESSION["adm_num"])) 
                                    {
                                        echo "<li> <a href='admin/dashboard'><label>Admin Dashboard</label></a></li>";
                                        echo "<li> <a href='admin/dashboard/logout.php'><label>Logout</label></a> </li>";
                                    }
                                    else 
                                    {
                                        if ($curPageName!='login.php')
                                            echo "<li><a href='login.php'><label>Login</label></a></li>";
                                        if($curPageName!='register.php')
                                            echo "<li><a href='register.php'><label>Register</label></a></li>";
                                    }
                            ?>

                        </ul>
                    </div><!-- end of nav-collapse -->
                    
                </div><!-- end of container -->
            </nav>
        </header>
<!-- end of header -->