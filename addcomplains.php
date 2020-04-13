<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>ADD Complains</title>

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
        <!-- Modal -->
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
                                <li><a href="complains.php">Complains</a></li>
                                <?php
                                session_start();

                                require_once('./connection_sql.php');
                                $sql = "select * from user_mast where user_name='" . $_SESSION['UserName'] . "'";
                                $result = $conn->query($sql);
                                if ($row1 = $result->fetch()) {
                                    echo " <li><a href=\"addcomplains.php\" style=\"color: yellow;\">Add Complain</a></li>";
                                }

                                if ($_SESSION['UserName'] == "captain") {
                                    echo " <li><a href = \"approvecomplain.php\">Approve Complain</a></li>";
                                }
                                $sql1 = "select * from user_mast where user_name='" . $_SESSION['UserName'] . "'";
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

        <br>
        <br>
        <br>


        <!-- gray bg -->

        <section class="container tm-home-section-1" id="more">
            <div class="row">

                <div class="flexslider  effect2 effect2-contact tm-contact-box-1" style="background-color: white; margin-top: -10px;">
                    <div class="box box-primary">
                        <h3 class="box-title" style="color: black;margin-top: -10px;margin-left: 0px;"><b>Add Complains</b></h3>
                        <div class="box-header with-border">

                        </div>
                        <form name="form1" role="form" class="form-horizontal">

                            <div class="form-group-sm">
                                <div class="form-group"></div>
                                <a onclick="new_inv();" class="btn btn-primary btn-sm">
                                    <span class="fa fa-user-plus"></span> &nbsp; Clear
                                </a>

                                <a onclick="savecom()" class="btn btn-success btn-sm">
                                    <span class="glyphicon glyphicon-save"></span> &nbsp; SAVE
                                </a>


                            </div>

                            <input type="hidden" id="tmpno" class="form-control">

                            <input type="hidden" id="item_count" class="form-control">


                            <div class="form-group"></div>
                            <div id="msg_box" class="span12 text-center"></div>

                            <div class="form-group"></div>






                            <div class="form-group-sm">
                                <label class="col-sm-2  labelColour input-sm" for="c_code">Telephone No</label>
                                <div class="col-sm-3">
                                    <input type="text" placeholder="Telephone No" name="telephoneNoTxt" id="telephoneNoTxt" class="form-control  input-sm">
                                </div>
                                <div class="col-sm-3 form-group-sm">
                                    <a onclick="load();" class="btn btn-default">
                                        <span class="fa fa-search"></span> &nbsp;Choose Location
                                    </a>
                                </div>
                                <div class="col-sm-2">
                                    <input type="text" disabled=""  placeholder="start latitude" name="Startla" id="Startla" class="form-control   input-sm">
                                </div>
                                <div class="col-sm-2">
                                    <input type="text" disabled="" placeholder="start longitude" name="Startlo" id="Startlo" class="form-control    input-sm">
                                </div>

                            </div>





                            <div class="form-group"></div>


                            <div class="form-group-sm">
                                <label class="col-sm-2  labelColour input-sm" for="c_code">Complains</label>
                                <div class="col-sm-3">
                                    <textarea placeholder="Complains" name="complainTxt" id="complainTxt" class="form-control  input-sm"></textarea>

                                </div>

                            </div>

                            <div class="form-group"></div>

                            <div class="form-group">

                                <div id="map" style="width: 1100px; height: 600px; background-color: white"></div>
                            </div>


                            <div class="form-group"></div>
                            <div id="msg_box" class="span12 text-center">

                            </div>




                        </form></div>
                </div>
            </div>
        </section>



        <script src = "js/addcomplains.js"></script>
        <script src="js/user.js"></script>

        <script type="text/javascript" src="js/jquery-1.11.2.min.js"></script>      		<!-- jQuery -->
        <script type="text/javascript" src="js/bootstrap.min.js"></script>					<!-- bootstrap js -->
        <script type="text/javascript" src="js/jquery.flexslider-min.js"></script>			<!-- flexslider js -->
        <script type="text/javascript" src="js/templatemo-script.js"></script>
        <script>
                                        /* Google map
                                         ------------------------------------------------*/


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


                                        });
        </script>

        <script src="http://maps.google.com/maps/api/js?key=AIzaSyClBKRU9iKfSLnXVTvdv11RvKwpCrfdoQI" type="text/javascript"></script>
        <script type="text/javascript">
                                        function load() {

                                            var latd = document.getElementById('Startla').value;
                                            var lngd = document.getElementById('Startlo').value;
                                            latd = parseFloat(6.9206432);
                                            lngd = parseFloat(80.0048926);
                                            var loc = {lat: latd, lng: lngd};
                                            var map = new google.maps.Map(document.getElementById('map'), {
                                                zoom: 12,
                                                center: loc
                                            });
                                            var marker = new google.maps.Marker({
                                                position: loc,
                                                map: map,
                                                draggable: true,
                                                animation: google.maps.Animation.DROP,

                                            });
//                                            marker.addlistner('click',toggleBounce);
//                                            google.maps.event.addListener(map, 'click', function (event) {
//                                                var lat = event.latLng.lat();
//                                                var lan = event.latLng.lng();
//                                                lat = parseFloat(lat);
//                                                lan = parseFloat(lan);
//                                                document.getElementById("Startla").value = lat;
//                                                document.getElementById("Startlo").value = lan;
//                                            });

                                            google.maps.event.addListener(
                                                    marker,
                                                    'drag',
                                                    function (event) {
                                                        var lat = event.latLng.lat();
                                                        var lan = event.latLng.lng();
                                                        lat = parseFloat(lat);
                                                        lan = parseFloat(lan);
                                                        document.getElementById("Startla").value = lat;
                                                        document.getElementById("Startlo").value = lan;
                                                        //alert('drag');
                                                    });
//                                            google.maps.event.addListener(marker, 'dragend', function (event) {
//                                               var lat = event.latLng.lat();
//                                                        var lan = event.latLng.lng();
//                                                        lat = parseFloat(lat);
//                                                        lan = parseFloat(lan);
//                                                        document.getElementById("Startla").value = lat;
//                                                        document.getElementById("Startlo").value = lan;
//                                            });
                                            function toggleBounce() {
                                                if (marker.getAnimation() !== null) {
                                                    marker.setAnimation(null);
                                                } else {
                                                    marker.setAnimation(google.maps.Animation.BOUNCE);
                                                }
                                            }

//                                            var map = L.map('map').setView([6.937683957253069, 80.01519228261714], 13);
//
//                                            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
//                                                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
//                                            }).addTo(map);
//
//                                            L.marker([6.937683957253069, 80.01519228261714]).addTo(map)
//                                                    .bindPopup('A pretty CSS3 popup.<br> Easily customizable.')
//                                                    .openPopup();

                                        }
                                        function GetXmlHttpObject() {
                                            var xmlHttp = null;
                                            try {
                                                // Firefox, Opera 8.0+, Safari
                                                xmlHttp = new XMLHttpRequest();
                                            } catch (e) {
                                                // Internet Explorer
                                                try {
                                                    xmlHttp = new ActiveXObject("Msxml2.XMLHTTP");
                                                } catch (e) {
                                                    xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
                                                }
                                            }
                                            return xmlHttp;
                                        }

                                        function savecom() {

                                            xmlHttp = GetXmlHttpObject();
                                            if (xmlHttp == null) {
                                                alert("Browser does not support HTTP Request");
                                                return;
                                            }

                                            if (document.getElementById('Startla').value == "") {
                                                alert('Select Location');
                                                return false;
                                            }

                                            var url = "addcomplains_data.php";
                                            url = url + "?Command=" + "savecom";
                                            url = url + '&lat=' + document.getElementById('Startla').value;
                                            url = url + '&long=' + document.getElementById('Startlo').value;
                                            url = url + '&complain=' + document.getElementById('complainTxt').value;
                                            url = url + '&contact=' + document.getElementById('telephoneNoTxt').value;

                                            xmlHttp.onreadystatechange = saved;
                                            xmlHttp.open("GET", url, true);
                                            xmlHttp.send(null);


                                        }
                                        function saved()
                                        {
                                            var XMLAddress1;

                                            if (xmlHttp.readyState == 4 || xmlHttp.readyState == "complete")
                                            {
                                                alert('saved');
                                                new_inv();
                                            }
                                        }

                                        function new_inv() {

                                            document.getElementById('Startla').value = "";
                                            document.getElementById('Startlo').value = "";
                                            document.getElementById('complainTxt').value = "";
                                            document.getElementById('telephoneNoTxt').value = "";
                                            load();
                                        }

        </script>


        <footer class = "tm-black-bg" >
            <div class = "container">
                <div class = "row">
                    <p class = "tm-copyright-text">

                        <a rel = "nofollow"  target = "_parent"></a></p>

                </div>
            </div>
        </footer>
    </body>
</html>

<script>load();</script>