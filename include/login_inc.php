<?php

if (isset($_POST['login_submit'])) {
    require 'db_connection_inc.php';
    $emailuid= mysqli_real_escape_string($connect ,$_POST['email_uid']);
    $password= mysqli_real_escape_string($connect ,$_POST['pwd_login']);
    $usr_type= mysqli_real_escape_string($connect ,$_POST['user_type']);
 
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
                    $_SESSION['admin_id']  =$row['Id'];
                    $_SESSION['admin_uId']  =$row['username'];

                    header("Location: ../admin/admin.php?login=success");
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
        $sql="SELECT * From customers Where email=?;";
        $stmt= mysqli_stmt_init($connect);
        if (!mysqli_stmt_prepare($stmt,$sql)) {
            header("Location: ../index.php?error=sqlerrorCustSELECT");
            exit();
        }
        else {
            mysqli_stmt_bind_param($stmt,"s",$emailuid);
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
                    $_SESSION['cust_type']  =$row['type'];

                    header("Location: ../customer/customer.php?login=success");
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
                    
                    if($row['job_type'] == 'employee'){
                        session_start();
                        $_SESSION['other_emp_id']  =$row['Id'];
                        $_SESSION['other_emp_uId']  =$row['username'];
                        $_SESSION['other_emp_name']  =$row['f_name'];
                        header("Location: ../otherEmployee.php?loginEmp=success");
                        exit();
                    }
                    elseif($row['job_type'] == 'sales'){
                        session_start();
                        $_SESSION['sales_emp_id']  =$row['Id'];
                        $_SESSION['sales_emp_uId']  =$row['username'];
                        $_SESSION['sales_emp_name']  =$row['f_name'];
                        header("Location: ../sales_asoc.php?loginSales=success");
                        exit();
                    }
                    elseif($row['job_type'] == 'cleaner'){
                        session_start();
                        $_SESSION['cleaner_emp_id']  =$row['SIN'];
                        $_SESSION['cleaner_emp_uId']  =$row['username'];
                        $_SESSION['cleaner_emp_name']  =$row['f_name'];
                        header("Location: ../cleaner/cleaner.php?loginCleane=success");
                        exit();
                    }
                    elseif($row['job_type'] == 'maintenance'){
                        session_start();
                        $_SESSION['maint_emp_id']  =$row['Id'];
                        $_SESSION['maint_emp_uId']  =$row['username'];
                        $_SESSION['maint_emp_name']  =$row['f_name'];
                        header("Location: ../maintenance/maintenance.php?loginMaint=success");
                        exit();
                    }
                    else{
                        header("Location: ../index.php?error=ErrorFetchingData");
                        exit();
                    }
                   
                }
                else {
                    header("Location: ../index.php?error=UnknownError");
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
        header("Location: ../index.php?error=noUser");
        exit();
    }
    mysqli_stmt_close($stmt);
    mysqli_close($connect);
}

else {
    header("Location: ../index.php?error=NeedtoLogin");
    exit();
}