<?php

if (isset($_POST["submitsave"])) {
    session_start();
    $uuid = $_SESSION["userUUID"];
    $uid = $_POST["uid"];
    $mail = $_POST["mail"];
    $dsc = $_POST["desc"];
    $noti = $_POST['noti'];
    $status = $_POST['status'];
    $pwdConfirm = $_POST["pwdConfirm"];
    $pwdNew = $_POST["pwdNew"];
    $pwdRepeat = $_POST["pwdRepeat"];

    // End Variabes
    
    require_once 'conn.inc.php';
    require_once 'functions.inc.php';
    
    // End Requires

    if (empty($pwdConfirm)) {
        header("location: ../edit_profile.php?error=empty");
        exit();
    }
    
    if (ValidatePwd($conn, $uuid, $pwdConfirm) === false ) {
        header("Location: ../edit_profile.php?error=pwdinvalid");
        exit();
    }

    if (!empty($pwdNew) || !empty($pwdRepeat)) {
        if (pwdMatchAdvanced($conn, $UUID, $pwdNew, $pwdRepeat) !== true) {
            header("location: ../edit_profile.php?error=pwdnomatch");
            exit();
        }
    }

    saveProfile($conn, $uuid, $uid, $mail, $noti, $dsc, $status, $pwdNew);
} else {
    header("location: ../login.php?error=nosubmit");
    exit();
}