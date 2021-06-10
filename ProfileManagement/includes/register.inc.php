<?php

if (isset($_POST["submit"])) {

    $name = $_POST["name"];
    $mail = $_POST["mail"];
    $uid = $_POST["uid"];
    $pwd = $_POST["pwd"];
    $pwdRepeat = $_POST["pwdRepeat"];

    // End Variabes
    
    require_once 'conn.inc.php';
    require_once 'functions.inc.php';

    // End Requires

    if (emptyInputSignup($name, $mail, $uid, $pwd, $pwdRepeat) !== false) {
        header("location: ../register.php?error=emptyinput");
        exit();
    }

    if (invalidUid($uid) !== false) {
        header("location: ../register.php?error=invaliduid");
        exit();
    }

    if (invalidMail($mail) !== false) {
        header("location: ../register.php?error=invalidmail");
        exit();
    }

    if (pwdMatch($pwd, $pwdRepeat) !== false) {
        header("location: ../register.php?error=nomatch");
        exit();
    }

    if (uidExists($conn, $uid, $mail) !== false) {
        header("location: ../register.php?error=uidtaken");
        exit();
    }

    createUser($conn, $name, $mail, $uid, $pwd);
} 
else {
    header("location: ../register.php?error=wronglocation");
    exit();
}