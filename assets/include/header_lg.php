<?php
    $curPageName = substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1);
    // session_start();
?>
<header id="header" class="site-header header-style-2" style="background-color: white">
            <nav class="navigation navbar navbar-default">
                <div class="centered">
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
                            <li>
                               <li><a href="index.php">Home</a></li>
                            </li>
                            <?php
                                if($curPageName!='about.php')
                                    echo "<li><a href='about.php'>About Us</a></li>";
                            ?>
                            <li>
                                <a href="services.php">Services</a>
                            </li>
                            <?php
                                if($curPageName!='contact.php')
                                    echo "<li><a href='contact.php'>Contact</a></li>";
                                
                            ?>
                            <?php
                                // if(isset($_SESSION["mob_num"]))
                                //     echo "<li> <a href='logout.php'>Logout</a> </li>";
                                // else
                                // {
                                    
                                    if(isset($_SESSION["mob_num"]))
                                    {    
                                        echo "<li> <a href='dashboard'>Dashboard</a> </li>";
                                        echo "<li> <a href='logout.php'>Logout</a> </li>";
                                    }
                                    elseif (isset($_SESSION["adm_num"])) 
                                    {
                            echo "<li> <a href='admin/dashboard'>Admin Dashboard</a></li>";
                            echo "<li> <a href='admin/dashboard/logout.php'>Logout</a> </li>";
                                    }
                                    else 
                                    {
                                        if ($curPageName!='login.php')
                                            echo "<li><a href='login.php'>Login</a></li>";
                                        if($curPageName!='register.php')
                                            echo "<li><a href='register.php'>Register</a></li>";
                                    }
                                // }
                                 
                            ?>

                        </ul>
                    </div><!-- end of nav-collapse -->
                    
                </div><!-- end of container -->
            </nav>
</header>