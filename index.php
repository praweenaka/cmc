<!DOCTYPE html>
<?php
session_start();
?>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Home</title>

        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,600,700' rel='stylesheet' type='text/css'>
        <link href="css/font-awesome.min.css" rel="stylesheet">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/bootstrap-datetimepicker.min.css" rel="stylesheet">  
        <link href="css/flexslider.css" rel="stylesheet">
        <link href="css/templatemo-style.css" rel="stylesheet">

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
                    </div>
                    <div class="col-lg-6 col-md-8 col-sm-9">
                        <div class="mobile-menu-icon" >
                            <i class="fa fa-bars"></i>
                        </div>
                        <nav class="tm-nav">
                            <ul>
                                <li><a href="index.php" style="color: yellow;">HOME</a></li>
                                <li><a href="complains.php">Complains</a></li>
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
                                $sql1 = "select * from user_mast where user_name ='" . $_SESSION['UserName'] . "'";
//                                echo $sql1;
                                $result1 = $conn->query($sql1);
                                if ($row2 = $result1->fetch()) {
                                    echo " <li><a href = \"index.php\" onclick=\"logout();\">Sign out</a></li>";
                                } else {
                                    echo " <li> <a href=\"#\" data-toggle=\"modal\" data-target=\"#myModal\">LOGIN</a></li>";
                                }
                                ?>
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
                            <h1 class="tm-banner-title">SAVE <span class="tm-yellow-text"> SRI </span>LANKA</h1>

                        </div>
                        <img src="img/mm.jpg" alt="Image" />
                    </li>
                    <li>
                        <div class="tm-banner-inner">
                            <h1 class="tm-banner-title">SAVE <span class="tm-yellow-text"> SRI</span>LANKA</h1>	
                        </div>
                        <img src="img/mm1.jpg" alt="Image" />
                    </li>
                    <li>
                        <div class="tm-banner-inner">
                            <h1 class="tm-banner-title"> SAVE<span class="tm-yellow-text"> SRI </span>LANKA</h1>	
                        </div>
                        <img src="img/mm2.jpg" alt="Image" />
                    </li>
                    <li>
                        <div class="tm-banner-inner">
                            <h1 class="tm-banner-title"> SAVE<span class="tm-yellow-text"> SRI </span>LANKA</h1>	
                        </div>
                        <img src="img/mm3.jpg" alt="Image" />
                    </li>
                    <li>
                        <div class="tm-banner-inner">
                            <h1 class="tm-banner-title"> SAVE<span class="tm-yellow-text"> SRI </span>LANKA</h1>	
                        </div>
                        <img src="img/mm4.jpg" alt="Image" />
                    </li>

                </ul>
            </div>	
        </section>




        <script src="js/user.js"></script>
        <script type="text/javascript" src="js/jquery-1.11.2.min.js"></script>      		<!-- jQuery -->
        <script type="text/javascript" src="js/moment.js"></script>							<!-- moment.js -->
        <script type="text/javascript" src="js/bootstrap.min.js"></script>					<!-- bootstrap js -->
        <script type="text/javascript" src="js/bootstrap-datetimepicker.min.js"></script>	<!-- bootstrap date time picker js, http://eonasdan.github.io/bootstrap-datetimepicker/ -->
        <script type="text/javascript" src="js/jquery.flexslider-min.js"></script>
        <!--
                <script src="js/froogaloop.js"></script>
                <script src="js/jquery.fitvid.js"></script>
        -->
        <script type="text/javascript" src="js/templatemo-script.js"></script>    
        <!--        <script language="javascript">
                    document.onmousedown = disableclick;
                    status = "Right Click Disabled";
                            Function disableclick(e)
                    {
                        if (event.button == 2)
                        {
                            alert(status);
                                    return false;
                        }
                    }
                </script> -->
        <!-- Templatemo Script -->
        <script>
                            // HTML document is loaded. DOM is ready.
                            $(function () {

                                $('#hotelCarTabs a').click(function (e) {
                                    e.preventDefault()
                                    $(this).tab('show')
                                })

                                $('.date').datetimepicker({
                                    format: 'MM/DD/YYYY'
                                });
                                $('.date-time').datetimepicker();

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

                            // Load Flexslider when everything is loaded.
                            $(window).load(function () {

                                $('.flexslider').flexslider({
                                    controlNav: false
                                });


                            });
        </script>



        <footer class="tm-black-bg">
            <div class="container">
                <div class="row">
                    <p class="tm-copyright-text">
                    <marquee direction = "right">CMC Project.</marquee>
                    </p>
                </div>
            </div>		
        </footer>
    </body>

</html>


