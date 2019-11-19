<?php
if (isset($_POST['signup-submit'])) {
    require 'dbh_inc.php';

    $userName = $_POST['uid'];
    $email = $_POST['email'];
    $password = $_POST['pwd'];
    $passwordRepeat = $_POST['pwd-repeat'];

    $emailCheck=filter_var($email,FILTER_VALIDATE_EMAIL);
    $userNameCheck =preg_match("/^[a-zA-Z0-9]*$/", $userName);
    if (empty($userName) || empty($email)  || empty($password) || empty($passwordRepeat)  ) {
        header("Location: ../signup.php?error=emptyfields&uid=".$userName."&email=".$email);
        exit();
    }
    else if (!$userNameCheck && !$emailCheck) {
        header("Location: ../signup.php?error=invalidemailuid=".$userName);
        exit();
    }

    else if (!$emailCheck) {
        header("Location: ../signup.php?error=invalidemail&uid=".$userName);
        exit();
    }
    else if (!$userNameCheck) {
        header("Location: ../signup.php?error=invaliduid&email=".$email);
        exit();
    }

    elseif ($password !== $passwordRepeat) {
        header("Location: ../signup.php?error=passwordcheck&uid=".$userName."&email=".$email);
        exit();
    }
    else {
        $sql=  "SELECT userId FROM Users WHERE email=?;"; 
        $stmt = mysqli_stmt_init($connect);
        if (!mysqli_stmt_prepare($stmt,$sql)){
            header("Location: ../signup.php?error=sqlerror1");
            exit();
        }
        else {
            mysqli_stmt_bind_param($stmt,"s",$email);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultCheck = mysqli_stmt_num_rows($stmt);
            if ($resultCheck > 0) {
                header("Location: ../signup.php?error=usertaken&uid=".$userName);
                exit();
            }
            else {
                $sql=  "INSERT INTO Users (userId ,email ,pwd) VALUES (?,?,?);";
                $stmt = mysqli_stmt_init($connect);
                if (!mysqli_stmt_prepare($stmt,$sql)){
                    header("Location: ../signup.php?error=sqlerror2");
                    exit();
                }
                else {
                    $hashpwd = password_hash($password, PASSWORD_DEFAULT);
                    mysqli_stmt_bind_param($stmt,"sss",$userName,$email,$hashpwd);
                    mysqli_stmt_execute($stmt);
                    header("Location: ../signup.php?signup=success");
                    exit();
                }
            }
            
        }
    }
    
    mysqli_stmt_close($stmt);
    mysqli_query($connect);

}
else {
    header("Location: ../signup.php");
    exit();
}