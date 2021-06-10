<?php

if (isset($_POST["submit"])) {

    $uid = $_POST["uid"];
    $pwd = $_POST["pwd"];

    // End Variabes
    
    require_once 'conn.inc.php';
    require_once 'functions.inc.php';

    // End Requires

    if (emptyInputLogin($uid, $pwd) !== false) {
        header("location: ../login.php?error=emptyinput");
        exit();
    }

    loginUser($conn, $uid, $pwd);
} else {
    header("location: ../login.php?error=nosubmit");
    exit();
}