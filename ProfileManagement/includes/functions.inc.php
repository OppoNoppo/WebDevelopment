<?php
function uniqidReal($lenght = 13) {
    // uniqid gives 13 chars, but you could adjust it to your needs.
    if (function_exists("random_bytes")) {
        $bytes = random_bytes(ceil($lenght / 2));
    } elseif (function_exists("openssl_random_pseudo_bytes")) {
        $bytes = openssl_random_pseudo_bytes(ceil($lenght / 2));
    } else {
        throw new Exception("no cryptographically secure random function available");
    }
    return substr(bin2hex($bytes), 0, $lenght);
}

function emptyInputSignup($name, $mail, $uid, $pwd, $pwdRepeat) {
    $result;
    if ( empty($name) || empty($mail) || empty($uid) || empty($pwd) || empty($pwdRepeat)) {
        $result = true;
    } else  {
        $result = false;
    }
    return $result;
}

function invalidUid($uid) {
    $result;
    if (!preg_match("/^[a-zA-Z0-9]*$/", $uid)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function invalidMail($mail) {
    $result;
    if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function pwdMatch($pwd, $pwdRepeat) {
    $result;
    if ($pwd !== $pwdRepeat) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}
 
function uidExists($conn, $uid, $mail) {
    $sql = "SELECT * FROM users WHERE userUid = ? OR userMail = ?;";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../register.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "ss", $uid, $mail);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    } else {
        $result = false;
        return $result;
    }
    mysqli_stmt_close($stmt);
}

function createUser($conn, $name, $mail, $uid, $pwd) {
    $uniqid = uniqidReal();
    $sql = "INSERT INTO users (userName, userMail, userUid, userPwd, userUUID) VALUES (?, ?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../register.php?error=stmtfailed");
        exit();
    }
    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
    mysqli_stmt_bind_param($stmt, "sssss", $name, $mail, $uid, $hashedPwd, $uniqid);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    $sql = "INSERT INTO profiles (userUUID, profileDescription) VALUES (?, 'Using Simple Profile System');";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)) {
        header('Location: ../register.php?error=profilestmtfailed');
        exit();
    }
    mysqli_stmt_bind_param($stmt, 's', $uniqid);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header("location: ../login.php?info=registersuccess");
}



//
//
//  Login
//
//


function emptyInputLogin($uid, $pwd) {
    $result;
    if ( empty($uid) || empty($pwd)) {
        $result = true;
    } else  {
        $result = false;
    }
    return $result;
}

function loginUser($conn, $uid, $pwd) {
    $uidExists = uidExists($conn, $uid, $uid);
    if ($uidExists === false) {
        header("location ../login.php?error=wronglogin");
        exit();
    }

    $pwdHashed = $uidExists["userPwd"];
    $checkPwd = password_verify($pwd, $pwdHashed);    
    if ($checkPwd === false ) {
        header("location: ../login.php?error=wronglogin");
        exit();
    } 
    else if ($checkPwd === true ) {
        session_start();
        $_SESSION["userUid"] = $uidExists["userUid"];
        $_SESSION["userUUID"] = $uidExists["userUUID"];
        $_SESSION["userMail"] = $uidExists["userMail"];
        $_SESSION["userNoti"] = $uidExists["userNoti"] ? $uidExists["userNoti"] : 'offline';
        $_SESSION["loggedin"] = true;
        header("location: ../index.php?error=success");
        exit();
    }
}

// 
// 
//  Information 
// 
// 

function GetUserInfo($conn, $uuid) {
    $sql = "SELECT * FROM users WHERE userUUID = ?;";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)) {
        header('Location: ' . $_SERVER["HTTP_REFERER"] . '?error=stmtfailed');
        exit();
    }
    mysqli_stmt_bind_param($stmt, "s", $uuid);
    mysqli_stmt_execute($stmt);
    $resultData = mysqli_stmt_get_result($stmt);
    if(mysqli_num_rows($resultData) > 0) {
        $row = mysqli_fetch_assoc($resultData);
        return  $row;
    }
    else {
        die('No rows found with given info');
        exit();
    }
    mysqli_stmt_close($stmt);
}

// 
// 
//  Profile 
// 
// 

function GetProfileInfo($conn, $uuid) {
    $sql = "SELECT * FROM profiles WHERE userUUID = ?;";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)) {
        header('Location: $_SERVER["HTTP_REFERER"]?error=stmtfailed');
        exit();
    }
    mysqli_stmt_bind_param($stmt, "s", $uuid);
    mysqli_stmt_execute($stmt);
    $resultData = mysqli_stmt_get_result($stmt);
    if(mysqli_num_rows($resultData) > 0) {
        $row = mysqli_fetch_assoc($resultData);
        return $row;
    }
    else {
        echo 'No rows found with given info';
        exit();
    }
    mysqli_stmt_close($stmt);
}



