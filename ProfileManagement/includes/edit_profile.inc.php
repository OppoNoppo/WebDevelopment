<?php

<<<<<<< Updated upstream
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
=======
if (isset($_POST["SUBMIT"])) {

    $uidChange = $_POST["uid"];
    $descChange = $_POST["description"];
    $notiChange = $_POST["notification"];
    // Form Viariables
    $uuidProfile = $_SESSION["userUUID"];

    // End Variables

    require_once 'conn.inc.php';
    require_once 'functions.inc.php';

    // End Requires

    if (changeNotification($conn, $uuidProfile, $notiChange) !== false){
        header("Location: ../edit_profile.php?error=notiError");
        exit();
    }

    if (changeDesc($conn, $uuidProfile, $descChange) !== false) {
        header("Location: ../edit_profile.php?error=descError");
        exit();
    }

    if (changeUid($conn, $uuidProfile, $descChange) !== false) {
        header("Location: ../edit_profile.php?error=uidError");
        exit();
    }

    saveChanges($conn, $uuidProfile, $uidChange, $descChange, $notiChange);
}
else {
    header("location: ../edit_profile.php?error=nosubmit");
>>>>>>> Stashed changes
    exit();
}