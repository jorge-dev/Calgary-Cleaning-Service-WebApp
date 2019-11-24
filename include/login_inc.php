<?php

if (isset($_POST['login_submit'])) {
    require 'db_connection_inc.php';
    $emailuid= mysqli_real_escape_string($connect ,$_POST['email_uid']);
    $password= mysqli_real_escape_string($connect ,$_POST['pwd_login']);
    $usr_type= mysqli_real_escape_string($connect ,$_POST['user_type']);

    // if (empty($emailuid) || empty($password)) {
    //     header("Location: ../index.php?error=emptyfields");
    //     exit();
    // }
    if ($usr_type == "admin"){
        $sql="SELECT * From employee Where user_type=? AND  (username=? OR email =?);";
        $stmt= mysqli_stmt_init($connect);
        if (!mysqli_stmt_prepare($stmt,$sql)) {
            header("Location: ../index.php?error=sqlErrorSelectAdmin");
            exit();
        }
        else {
            mysqli_stmt_bind_param($stmt,"sss",$usr_type,$emailuid,$emailuid);
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
                    $_SESSION['admin_id']  =$row['id'];
                    $_SESSION['admin_uId']  =$row['username'];

                    header("Location: ../admin.php?login=success");
                    exit();
                }
                else {
                    header("Location: ../index.php?error=unknownErrorAdmin");
                    exit();
                }
            }
            else {
                header("Location: ../index.php?error=noUser");
            exit();
            }
        }
    }
    else if ($usr_type == "customer"){
        $sql="SELECT * From customer Where userId=? OR email =?;";
        $stmt= mysqli_stmt_init($connect);
        if (!mysqli_stmt_prepare($stmt,$sql)) {
            header("Location: ../index.php?error=sqlerrorCustSELECT");
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
                    $_SESSION['cust_id']  =$row['ID'];
                    $_SESSION['cust_uId']  =$row['username'];

                    header("Location: ../customer.php?login=success");
                    exit();
                }
                else {
                    header("Location: ../index.php?error=unknownErrorAdmin");
                    exit();
                }
            }
            else {
                header("Location: ../index.php?error=noUser");
            exit();
            }
        }
    }
    else if ($usr_type == "employee"){
        $sql="SELECT * From employee Where user_type=? AND  (username=? OR email =?);";
        $stmt= mysqli_stmt_init($connect);
        if (!mysqli_stmt_prepare($stmt,$sql)) {
            header("Location: ../index.php?error=sqlerrorEmpSELECT");
            exit();
        }
        else {
            mysqli_stmt_bind_param($stmt,"sss",$usr_type,$emailuid,$emailuid);
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
                    $_SESSION['emp_id']  =$row['id'];
                    $_SESSION['emp_uId']  =$row['username'];
                    
                    if($row['job_type'] == 'employee'){
                        header("Location: ../employee.php?loginEmp=success");
                        exit();
                    }
                    elseif($row['job_type'] == 'sales'){
                        header("Location: ../sales_asoc.php?loginSales=success");
                        exit();
                    }
                    elseif($row['job_type'] == 'cleaner'){
                        header("Location: ../cleaner.php?loginCleane=success");
                        exit();
                    }
                    elseif($row['job_type'] == 'maintenance'){
                        header("Location: ../maintenance.php?loginMaint=success");
                        exit();
                    }
                    else{
                        header("Location: ../index.php?error=UnkwonFailure");
                        exit();
                    }
                   
                }
                else {
                    header("Location: ../index.php?error=unknownError");
                    exit();
                }
            }
            else {
                header("Location: ../index.php?error=noUser");
            exit();
            }
        }
    }
    else {
        header("Location: ../index.php?error=noUserFound");
        exit();
    }
    mysqli_stmt_close($stmt);
    mysqli_close($connect);
}

else {
    header("Location: ../index.php");
    exit();
}