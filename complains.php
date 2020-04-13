<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Compalins</title>

        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,600,700' rel='stylesheet' type='text/css'>
        <link href="css/font-awesome.min.css" rel="stylesheet">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/bootstrap-datetimepicker.min.css" rel="stylesheet">  
        <link href="css/flexslider.css" rel="stylesheet">
        <link href="css/templatemo-style.css" rel="stylesheet">

        <style>
            div.scroll {
                background-color: lightgray;

                height: 1000px;
                overflow: scroll;
            }

            #msg {
                white-space: pre;
            }

        </style>
    </head>
    <body class="tm-gray-bg">

        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header alert-info">

                        <h4 class="modal-title " id="myModalLabel">Please Login</h4>
                    </div>
                    <div class="modal-body">
                        <div class="container">
                            <div class="form-signin" >
                                <div id="mmm">
                                    <div class="form-group" >
                                        <div class="col-sm-3">
                                            <input type="text" id="user_name" class="form-control" placeholder="User Name" required autofocus>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-sm-3">
                                            <input type="password" id="password" class="form-control" placeholder="Password" required>
                                        </div>
                                    </div>
                                    <input type="hidden" id="action">
                                    <input type="hidden" id="form">
                                    <br>
                                    <br>
                                    <br>
                                    <br>
                                </div>
                                <div id="panel1">
                                    <h3>Registration</h3>
                                    <br>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <div class="col-sm-5">
                                                    <input type="text" id="u_name" class="form-control" placeholder="User Name" required autofocus>
                                                </div>

                                                <div class="col-sm-5">
                                                    <input type="password" id="pass" class="form-control" placeholder="Password" required>
                                                </div>
                                                <div class="col-sm-2">
                                                    <button class="btn btn-info"    onclick="save_inv();">Sign UP</button>;
                                                </div>
                                            </div>
                                        </div> 

                                        <br>
                                        <br>
                                        <br>
                                        <br>
                                        <div class="col-md-12">

                                        </div>    
                                        <div class="col-md-12"></div>    
                                    </div>

                                </div>

                            </div>
                        </div> <!-- /container -->
                        <span   id="txterror">

                        </span>
                    </div>

                    <div class="modal-footer alert-info">
                        <a style="margin-right: 600px;" onclick="logout();" class="btn btn-primary btn-file">Sign out</a>

                        <button class="btn btn-primary" style="margin-top: -20px; margin-top: -50px;" id="swi" onclick="swi();">Sign UP</button>;
                        <button class="btn btn-primary" style="margin-top: -20px; margin-top: -50px;"  onclick="IsValiedData();">Sign in</button>;
                    </div>
                </div>
            </div>
        </div>
        <!-- Header -->
        <div class="tm-header">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-4 col-sm-3 tm-site-name-container">
                        <a href="index.php" class="tm-site-name">CMC</a>
                        <!--<img  src="img/Mas_Holdings_Logo.png" style="width: 150px; height: 60px;">-->
                    </div>
                    <div class="col-lg-6 col-md-8 col-sm-9">
                        <div class="mobile-menu-icon">
                            <i class="fa fa-bars"></i>
                        </div>
                        <nav class="tm-nav">
                             <ul>
                                <li><a href="index.php" >HOME</a></li>
                                <li><a href="complains.php" style="color: yellow;">Complains</a></li>
                                <?php
                                session_start();

                                require_once('./connection_sql.php');
                                $sql = "select * from user_mast where user_name='" . $_SESSION['UserName'] . "'";
                                $result = $conn->query($sql);
                                if ($row1 = $result->fetch()) {
                                    echo " <li><a href=\"addcomplains.php\">Add Complain</a></li>";
                                }

                                if ($_SESSION['UserName'] == "captain") {
                                    echo " <li><a href = \"approvecomplain.php\">Approve Complain</a></li>";
                                }
                                 $sql1= "select * from user_mast where user_name='" . $_SESSION['UserName'] . "'";
                                $result1 = $conn->query($sql1);
                                if ($row2 = $result1->fetch()) {
                                     echo " <li><a href = \"index.php\" onclick=\"logout();\">Sign out</a></li>";
                                } else {
                                    echo " <li> <a href=\"#\" data-toggle=\"modal\" data-target=\"#myModal\">LOGIN</a></li>";
                                   
                                }
                                ?>
                                 

                                <!--<li><a href="contact.php">ADD User</a></li>-->
                                <!--<li><a href="#" data-toggle="model" data_target="#basicModel">LOGIN</a></li>-->
                                <!--<li> <a href="#" data-toggle="modal" data-target="#myModal">LOGIN</a></li>-->

                            </ul>
                        </nav>		
                    </div>				
                </div>
            </div>	  	
        </div>

        <!-- Banner -->
        <section class="tm-banner">
            <!-- Flexslider -->
            <div class="flexslider flexslider-banner">
                <ul class="slides">
                    <li>
                        <div class="tm-banner-inner">
                            <h1 class="tm-banner-title">NEWS <span class="tm-yellow-text">FEEDS</span> </h1>
                            <!--<p class="tm-banner-subtitle">For Your Vacations</p>-->
                            <a href="#more" class="tm-banner-link">Learn More</a>	
                        </div>
                        <img src="img/mm.jpg" />
                    </li>
                    <li>
                        <div class="tm-banner-inner">
                            <h1 class="tm-banner-title">NEWS <span class="tm-yellow-text">FEEDS</span> </h1>

                            <a href="#more" class="tm-banner-link">Learn More</a>	
                        </div>
                        <img src="img/mm.jpg" />
                    </li>
                    <li>
                        <div class="tm-banner-inner">
                            <h1 class="tm-banner-title">NEWS <span class="tm-yellow-text">FEEDS</span> </h1>

                            <a href="#more" class="tm-banner-link">Learn More</a>	
                        </div>
                        <img src="img/mm.jpg" />
                    </li>
                </ul>
            </div>		
        </section>

        <!-- gray bg -->	
        <section class="container tm-home-section-1" id="more">
            <div class="row">
                <!-- slider -->
                <div class="flexslider flexslider-about effect2">
                    <ul class="list-group">
                        <li class="list-group-item list-group-item-success" style="background-color:white">

                            <div class="form-group" >
                                
                                <div class="row ">
                                    <h3 class="box-title" style="color: black;margin-top: 60px;margin-left: 50px;"><b>Complains</b></h3>
                                    <div class="col-md-6" style="background-color: white;">
                                        <div  id="commentss" class="col-md-12 main-wrapper " style="height:500px; color: black;">

                                        </div>

                                    </div>
                                    <br>
                                    <br>
                                     
                                  
                                    <div class="col-md-6">
                                        
                                        <div  id="kk"  style="width: 100%;height: 600px;"> 

                                        </div>

                                    </div>


                                </div>
                            </div>
                        </li>

                    </ul>
                </div>
            </div>


        </section>		

        <footer class="tm-black-bg">
            <div class="container">
                <div class="row">
                    <p class="tm-copyright-text">

                         <a rel="nofollow" href=" " target="_parent"> </a></p>
                </div>
            </div>		
        </footer>
        <script src="js/complain.js"></script>
          <script src="js/user.js"></script>
        <script type="text/javascript" src="js/jquery-1.11.2.min.js"></script>      		<!-- jQuery -->
        <script type="text/javascript" src="js/bootstrap.min.js"></script>					<!-- bootstrap js -->
        <script type="text/javascript" src="js/jquery.flexslider-min.js"></script>			<!-- flexslider js -->
        <script type="text/javascript" src="js/templatemo-script.js"></script>  
        <script src="http://maps.google.com/maps/api/js?key=AIzaSyClBKRU9iKfSLnXVTvdv11RvKwpCrfdoQI" type="text/javascript"></script>
        <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous">
        </script>
        <!-- Templatemo Script -->
        <script>
            $(function () {

                // https://css-tricks.com/snippets/jquery/smooth-scrolling/
                $('a[href*=#]:not([href=#])').click(function () {
                    if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
                        var target = $(this.hash);
                        target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                        if (target.length) {
                            $('html,body').animate({
                                scrollTop: target.offset().top
                            }, 1000);
                            return false;
                        }
                    }
                });
            });
            $(window).load(function () {
                // Flexsliders
                $('.flexslider.flexslider-banner').flexslider({
                    controlNav: false
                });
                $('.flexslider').flexslider({
                    animation: "slide",
                    directionNav: false,
                    slideshow: false
                });
            });
        </script>
    </body>
</html>
<script>getdtl1();</script>