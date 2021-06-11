<?php

$fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$uuid = $_GET['uuid'] ? $_GET['uuid'] : 'NULL';
// End Variables

include_once "conn.inc.php";
include_once "functions.inc.php";

// End Includes

if (isset($_GET["uuid"])) {
    if ($uuid === "NULL") {
        echo "UUID is not valid";
        exit();
    }
    if (uuidInfo($conn, $uuid) == false) {
        echo "UUID is not valid";
        exit();
    }
    if ($uuidInfo['profileStatus'] == "banned") {
        echo "UUID is banned";
        exit();
    }
    if ($uuidInfo['profileStatus']  == "private") {
        echo "Profile is Public";
        exit();
    }
    getProfileInfo($conn, $uuid);
}
