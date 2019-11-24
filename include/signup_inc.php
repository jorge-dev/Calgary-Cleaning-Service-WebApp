<?php

if (isset($_POST['signUp_button'])) {
    require 'db_connection_inc.php';

    $user_type = "customer";
    $cust_type = mysqli_real_escape_string($connect, $_POST['cust_type']);
    $f_name = mysqli_real_escape_string($connect, $_POST['f_name']);
    $l_name = mysqli_real_escape_string($connect, $_POST['l_name']);
    $gender = mysqli_real_escape_string($connect, $_POST['gender']);
    $company_name = mysqli_real_escape_string($connect, $_POST['company_name']);
    $comp_Rep_num = mysqli_real_escape_string($connect, $_POST['comp_Rep_num']);
    $username = mysqli_real_escape_string($connect, $_POST['username']);
    $email = mysqli_real_escape_string($connect, $_POST['email']);
    $pwd = mysqli_real_escape_string($connect, $_POST['pwd']);
    $pwd_Repeat = mysqli_real_escape_string($connect, $_POST['pwd_Repeat']);
    $phone_num = mysqli_real_escape_string($connect, $_POST['phone_num']);
    $address = mysqli_real_escape_string($connect, $_POST['address']);
    $city = mysqli_real_escape_string($connect, $_POST['city']);
    $postal_code = mysqli_real_escape_string($connect, $_POST['postal_code']);
    $province = mysqli_real_escape_string($connect, $_POST['province']);
    $cust_id = 0;



    function checkIds($connect, $randString)
    {
        $sql = "SELECT * From employee";
        $result = mysqli_query($connect, $sql);
        $Idexists = false;
        while ($row = mysqli_fetch_assoc($result)) {
            if ($row['id'] == $randString) {
                $Idexists = true;
                break;
            } else {
                $Idexists = false;
            }
        }
        return $Idexists;
    }

    function generateId($connect)
    {
        $idLength = 7;
        $str = "0123456789";
        $randStr =  substr(str_shuffle($str), 0, $idLength);

        $checkID = checkIds($connect, $randStr);
        while ($checkID == true) {
            $randStr =  substr(str_shuffle($str), 0, $idLength);
            $checkID = checkIds($connect, $randStr);
        }

        return $randStr;
    }

    $cust_id = (int) generateId($connect);



    if ($pwd !== $pwd_Repeat) {
        header("Location: ../signUp.php?error=passwordDontMatch");
        exit();
    } else {
        $sql =  "SELECT * FROM customers WHERE email=? OR username=?;";
        $stmt = mysqli_stmt_init($connect);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../signUp.php?error=sqlSelectError");
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, "ss", $email, $username);
            mysqli_stmt_execute($stmt);
            $response = mysqli_stmt_get_result($stmt);
            if ($row = mysqli_fetch_assoc($response)) {
                if ($row['email'] == $email && $row['username'] == $username) {
                    header("Location: ../signUp.php?error=emailAndusernameAlreadyExists");
                    exit();
                } elseif ($row['email'] == $email) {
                    header("Location: ../signUp.php?error=emailAlreadyExists");

                    exit();
                } elseif ($row['username'] == $username) {
                    header("Location: ../signUp.php?error=usernameAlreadyExists");
                    exit();
                }
            } else {

                $sql =  "INSERT INTO customers(ID, username, pwd, user_type, phone_num, type, street, postal_code, city, province, email) VALUES (?,?,?,?,?,?,?,?,?,?,?);";
                $stmt = mysqli_stmt_init($connect);
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    header("Location: ../signUp.php?error=sqlInsertError");
                    exit();
                } else {
                    $hashpwd = password_hash($emp_pwd, PASSWORD_DEFAULT);
                    mysqli_stmt_bind_param($stmt, "issssssssss", $cust_id, $username, $hashpwd, $user_type, $phone_num, $cust_type, $address, $postal_code, $city, $province, $email);
                    mysqli_stmt_execute($stmt);
                    // header("Location: ../customer.php?signup=success");
                    // exit();
                }

                if ($cust_type == "Company") {
                    $sql =  "INSERT INTO company(C_ID, name, rep_num) VALUES (?,?,?);";
                    $stmt = mysqli_stmt_init($connect);
                    if (!mysqli_stmt_prepare($stmt, $sql)) {
                        header("Location: ../signUp.php?error=sqlCust_Comp_InsertError");
                        exit();
                    } else {
                        mysqli_stmt_bind_param($stmt, "iss", $cust_id,$company_name,$comp_Rep_num);
                        mysqli_stmt_execute($stmt);
                        header("Location: ../customer.php?signupComp=success");
                        exit();
                    }
                }
                else if($cust_type == "Residential") {
                    $sql =  "INSERT INTO residential(C_ID, f_name, l_name, gender) VALUES (?,?,?,?);";
                    $stmt = mysqli_stmt_init($connect); 
                    if (!mysqli_stmt_prepare($stmt, $sql)) {
                        header("Location: ../signUp.php?error=sqlCust_Res_InsertError");
                        exit();
                    } else {
                        mysqli_stmt_bind_param($stmt, "isss",$cust_id,$f_name,$l_name,$gender);
                        mysqli_stmt_execute($stmt);
                        header("Location: ../customer.php?signupRes=success");
                        exit();
                    }
                }
                else {
                    header("Location: ../customer.php?error=sonethingWeirdHappen");
                        exit();
                }
            }
        }
    }

    mysqli_stmt_close($stmt);
    mysqli_close($connect);
} else {
    header("Location: ../admin.php");
    exit();
}
