<?php

session_start();
header('Content-Type: text/xml');
date_default_timezone_set('Asia/Colombo');
require_once('./connection_sql.php');

if ($_GET["Command"] == "app") {
    require_once('./connection_sql.php');
    $sql = "update complain set approve='1' where id='" . $_GET["id"] . "'";
    $result = $conn->query($sql);
    echo "Approved";
}

if ($_GET["Command"] == "getdt2") {
    $tb = "";
    $tb .= "<br>";
    $tb .= "<br>";



//    $tb = "<marquee style=\"width:560px;\" direction=\"up\" behavior=\"scroll\" scrollamount=\"2\" scrolldelay=\"5\" height=\"550px\" onmousedown=\"this.stop();\" onmouseup=\"this.start();\" >";
    $tb .= "<table class='table table-bordered' height: 350px;\"\>";

    $tb .= "<tr >";
    $tb .= "<td style='background-color:green;color:white'>User</td>";
    $tb .= "<td style='background-color:green;color:white'>Complain</td>";
    $tb .= "<td style='background-color:green;color:white'>Contact</td>";
    $tb .= "<td style='background-color:green;color:white'>Approve</td>";

    $tb .= "</tr>";

    $sql = "SELECT * FROM complain where approve='0' order by id desc  ";

    $i = 0;
    foreach ($conn->query($sql) as $row) {

        $idd = "comm" . $row['id'];

        $tb .= "<tr  onClick=\"postlink('" . $row['lat'] . "','" . $row['lon'] . "')\">";
        $tb .= "<td>" . $row['user_name'] . "</td>";
        $tb .= "<td>" . $row['complain'] . "</td>";
        $tb .= "<td class=\"col-sm-2\">" . $row['contact'] . "</td>";
        $tb .= "<td class=\"col-sm-2\"><a onclick='approve(" . $row['id'] . ")' class='btn btn-success btn-sm'><span class='glyphicon glyphicon-ok'></span> &nbsp; Approve</a></td>";


        $tb .= "</tr>";
    }
    $tb .= "</table>";
//    $tb .= "</marquee>";
    echo $tb;
}
?>
