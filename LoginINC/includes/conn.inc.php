<?php 

$sip = "localhost";
$suser = "root";
$spwd = "";
$sdb = "logininc";

$conn = mysqli_connect($sip, $suser, $spwd, $sdb);

if (!$conn) {
    die("Connection Failed: " . mysqli_connect_error());
}

?>