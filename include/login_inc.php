<?php

if (isset($_POST['login_submit'])) {
    require 'dbh_connection_inc.php';
    $emailuid= mysqli_real_escape_string($connect ,$_POST['email_uid']);
    $password= mysqli_real_escape_string($connect ,$_POST['pwd_login']);
    $usr_type= mysqli_real_escape_string($connect ,$_POST['user_type']);

    if (empty($emailuid) || empty($password)) {
        header("Location: ../index.php?error=emptyfields");
        exit();
    }
    else if ($usr_type == "Admin"){
        $sql="SELECT * From employee AS E Where username=? AND (user_type=? OR email =?;)";
        $stmt= mysqli_stmt_init($connect);
        if (!mysqli_stmt_prepare($stmt,$sql)) {
            header("Location: ../index.php?error=sqlErrorSelectAdimn");
            exit();
        }
        else {
            mysqli_stmt_bind_param($stmt,"sss",$emailuid,$usr_type,$emailuid);
            mysqli_stmt_execute($stmt);
        
            $response = mysqli_stmt_get_result($stmt);
            if ($row = mysqli_fetch_assoc($response)){
                $pwdCheck = password_verify($password, $row['pwd']);
                if ($pwdCheck == false) {
                    header("Location: ../index.php?error=wrongpwd");
                    exit();
                }
                elseif ($pwdCheck == true) {
                    session_start();
                    $_SESSION['id']  =$row['id'];
                    $_SESSION['uId']  =$row['userId'];

                    header("Location: ../index.php?loginsuccess=");
                    exit();
                }
                else {
                    header("Location: ../index.php?error=sqlerrorSELECT");
                    exit();
                }
            }
            else {
                header("Location: ../index.php?error=Nouser");
            exit();
            }
        }
    }
    else if ($usr_type == "Customer"){
        $sql="SELECT * From employee AS E Where userId=? OR email =?;";
        $stmt= mysqli_stmt_init($connect);
        if (!mysqli_stmt_prepare($stmt,$sql)) {
            header("Location: ../index.php?error=sqlerrorSELECT");
            exit();
        }
        else {
            mysqli_stmt_bind_param($stmt,"ss",$emailuid,$emailuid);
            mysqli_stmt_execute($stmt);
            
            $response = mysqli_stmt_get_result($stmt);
            if ($row = mysqli_fetch_assoc($response)){
                $pwdCheck = password_verify($password, $row['pwd']);
                if ($pwdCheck == false) {
                    header("Location: ../index.php?error=wrongpwd");
                    exit();
                }
                elseif ($pwdCheck == true) {
                    session_start();
                    $_SESSION['id']  =$row['id'];
                    $_SESSION['uId']  =$row['userId'];

                    header("Location: ../index.php?loginsuccess=");
                    exit();
                }
                else {
                    header("Location: ../index.php?error=sqlerrorSELECT");
                    exit();
                }
            }
            else {
                header("Location: ../index.php?error=Nouser");
            exit();
            }
        }
    }
    else if ($usr_type == "Employee"){
        $sql="SELECT * From employee AS E Where userId=? OR email =?;";
        $stmt= mysqli_stmt_init($connect);
        if (!mysqli_stmt_prepare($stmt,$sql)) {
            header("Location: ../index.php?error=sqlerrorSELECT");
            exit();
        }
        else {
            mysqli_stmt_bind_param($stmt,"ss",$emailuid,$emailuid);
            mysqli_stmt_execute($stmt);
            
            $response = mysqli_stmt_get_result($stmt);
            if ($row = mysqli_fetch_assoc($response)){
                $pwdCheck = password_verify($password, $row['pwd']);
                if ($pwdCheck == false) {
                    header("Location: ../index.php?error=wrongpwd");
                    exit();
                }
                elseif ($pwdCheck == true) {
                    session_start();
                    $_SESSION['id']  =$row['id'];
                    $_SESSION['uId']  =$row['userId'];

                    header("Location: ../index.php?loginsuccess=");
                    exit();
                }
                else {
                    header("Location: ../index.php?error=sqlerrorSELECT");
                    exit();
                }
            }
            else {
                header("Location: ../index.php?error=Nouser");
            exit();
            }
        }
    }
    else {
        header("Location: ../index.php?error=noUserFound");
        exit();
    }
    
}
else {
    header("Location: ../index.php");
    exit();
}