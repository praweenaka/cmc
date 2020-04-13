<?php

session_start();
header('Content-Type: text/xml');
date_default_timezone_set('Asia/Colombo');
require_once('./connection_sql.php');

if ($_GET["Command"] == "getdtt") {
    $tb = "";
    $tb .= "<br>";
    $tb .= "<br>";


//    $tb = "<marquee style=\"width:560px;\" direction=\"up\" behavior=\"scroll\" scrollamount=\"2\" scrolldelay=\"5\" height=\"550px\" onmousedown=\"this.stop();\" onmouseup=\"this.start();\" >";
    $tb .= "<table class='table table-bordered' height: 350px;\"\>";

    $tb .= "<td style='background-color:green;color:white'>User</td>";
    $tb .= "<td style='background-color:green;color:white'>Complain</td>";
    $tb .= "<td style='background-color:green;color:white'>Contact</td>";

    $tb .= "</tr>";

    $sql = "SELECT * FROM complain where approve='1' order by id desc";

    $i = 0;
    foreach ($conn->query($sql) as $row) {

        $idd = "comm" . $row['id'];

        $tb .= "<tr  onClick=\"postlink('" . $row['lat'] . "','" . $row['lon'] . "')\">";
        $tb .= "<td>" . $row['user_name'] . "</td>";
        $tb .= "<td>" . $row['complain'] . "</td>";
        $tb .= "<td class=\"col-sm-2\">" . $row['contact'] . "</td>";


        $tb .= "</tr>";
    }
    $tb .= "</table>";
//    $tb .= "</marquee>";
    echo $tb;
}
?>
