<?php

session_start();

date_default_timezone_set('Asia/Colombo');
require_once('./connection_sql.php');



if ($_GET["Command"] == "savecom") {
    require_once('./connection_sql.php');
    $sql = "insert into complain(user_name,lat,lon,complain,contact) values ('" . $_SESSION["UserName"] . "', '" . $_GET["lat"] . "','" . $_GET["long"] . "', '" . $_GET["complain"] . "','" . $_GET["contact"] . "')";
//echo $sql;
    $result = $conn->query($sql);

//    if ($result) {
//        echo "successfully saved!";
//    }
}
?>
