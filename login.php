
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>MAS LOGIN</title>

        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,600,700' rel='stylesheet' type='text/css'>
        <link href="css/font-awesome.min.css" rel="stylesheet">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/bootstrap-datetimepicker.min.css" rel="stylesheet">  
        <link href="css/flexslider.css" rel="stylesheet">
        <link href="css/templatemo-style.css" rel="stylesheet">

    </head>
    <body>
        <!-- Header -->
        <div class="tm-header">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-4 col-sm-3 tm-site-name-container">
                        <a href="index.php" class="tm-site-name">MAS HOLDINGS</a>
                    </div>
                    <div class="col-lg-6 col-md-8 col-sm-9">
                        <div class="mobile-menu-icon">
                            <i class="fa fa-bars"></i>
                        </div>
                        <nav class="tm-nav">
                            <ul>
                                <li><a href="index.php">HOME</a></li>
                                <li><a href="about.php">ABOUT</a></li>
                                <li><a href="contact.php" >CONTACT</a></li>
                                <li><a href="login.php" class="active">LOGIN</a></li>
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
                            <div class="col-lg-4 col-md-6 tm-contact-form-input">
                                <div class="form-group"></div>
<!--                                <div class="form-group">
                                    <select class="form-control">
                                        <option class="form-control">Admin</option>
                                        <option class="form-control">Manager</option>
                                        <option class="form-control"> Cleark</option>
                                    </select>
                                </div>-->

                                <div class="form-group">
                                  <input type="text" id="user_name" class="form-control" placeholder="User Name" />
                                </div>


                                <div class="form-group">
                                    <input type="text" id="password" class="form-control" placeholder="Password" />
                                </div>
                                <!--                                <div class="form-group">
                                                                    <input type="text" id="confirm_pass" class="form-control" placeholder="Confirm Password" />
                                                                </div>-->
                                <div class="form-group">
                                    <button class="tm-submit-btn1" onclick="IsValiedData();" type="submit" name="submit">Login</button> 

                                </div>  
                                <a href="createAccount.php" style="margin-left:  200px;">Create New Account</a>
                                <a href="userpermission.php" style="margin-left:  200px;">User Permission</a>
                            </div>
                            <!--                            <h1 class="tm-banner-title">MAS <span class="tm-yellow-text">Holdings</span> </h1>
                                                        <p class="tm-banner-subtitle">For Upcoming Holidays</p>
                                                        <a href="#more" class="tm-banner-link">Contact Us</a>	-->
                        </div>
                        <img src="img/hhhhhhhhhhh.jpg" alt="Banner 3" />	
                    </li>		    
                </ul>
            </div>	
        </section>

        <!-- gray bg -->	
        <section class="container tm-home-section-1" id="more">
            <div class="row">
                <!-- slider -->
                <!--                <div class="flexslider effect2 effect2-contact tm-contact-box-1">
                                    <ul class="slides">
                                        <li>
                                            <img src="img/world-map.png" alt="image" class="contact-image" />
                                            <div class="contact-text">
                                                <h2 class="slider-title">Contact Us</h2>
                
                                                
                                                <div class="slider-social">
                                                    <a href="#" class="tm-social-icon"><i class="fa fa-twitter"></i></a>
                                                    <a href="#" class="tm-social-icon"><i class="fa fa-facebook"></i></a>
                                                    <a href="#" class="tm-social-icon"><i class="fa fa-pinterest"></i></a>
                                                    <a href="#" class="tm-social-icon"><i class="fa fa-google-plus"></i></a>
                                                </div>
                                            </div>			      
                                        </li>
                                    </ul>
                                </div>-->
            </div>
        </section>		

        <!-- white bg -->
        <footer class="tm-black-bg">
            <div class="container">
                <div class="row">
                    <p class="tm-copyright-text">

                        | Designed by <a rel="nofollow" href="http://infodatasl.com/" target="_parent">INFODATA COMPUTER SYSTEMS</a></p>
                </div>
            </div>		
        </footer>
        <script src="js/user.js"></script>
        <script type="text/javascript" src="js/jquery-1.11.2.min.js"></script>      		<!-- jQuery -->
        <script type="text/javascript" src="js/bootstrap.min.js"></script>					<!-- bootstrap js -->
        <script type="text/javascript" src="js/jquery.flexslider-min.js"></script>			<!-- flexslider js -->
        <script type="text/javascript" src="js/templatemo-script.js"></script>      		
        <script>
            /* Google map
             ------------------------------------------------*/
            var map = '';
            var center;

            function initialize() {
                var mapOptions = {
                    zoom: 14,
                    center: new google.maps.LatLng(6.9549459, 80.0105218),
                    scrollwheel: false
                };

                map = new google.maps.Map(document.getElementById('google-map'), mapOptions);

                google.maps.event.addDomListener(map, 'idle', function () {
                    calculateCenter();
                });

                google.maps.event.addDomListener(window, 'resize', function () {
                    map.setCenter(center);
                });

                var marker = new google.maps.Marker({
                    id: id,
                    center: new google.maps.LatLng(6.9549459, 80.0105218),
                    type: type,
                    map: map,
                    position: point,
                    icon: icon.icon,
                    shadow: icon.shadow
                });

                bindInfoWindow(marker, map, infoWindow, html, id);

            }

            function calculateCenter() {
                center = map.getCenter();
            }

            function loadGoogleMap() {
                var script = document.createElement('script');
                script.type = 'text/javascript';
                script.src = 'https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&' + 'callback=initialize';
                document.body.appendChild(script);
            }

            // DOM is ready
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

                // Flexslider
                $('.flexslider').flexslider({
                    controlNav: false,
                    directionNav: false
                });

                // Google Map
                loadGoogleMap();
            });
        </script>

    </body>
</html>
