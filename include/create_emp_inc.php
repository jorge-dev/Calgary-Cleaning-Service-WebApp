<?php

if (isset($_POST['create_emp_submit'])) {
    require 'db_connection_inc.php';
    $emp_user_type = mysqli_real_escape_string($connect,$_POST['emp_user_type']);
    $emp_job_type =mysqli_real_escape_string($connect,$_POST['emp_job_type']);
    $emp_start_date =mysqli_real_escape_string($connect,$_POST['emp_start_date']);
    $emp_sin =mysqli_real_escape_string($connect,$_POST['emp_sin']);
    $emp_gender =mysqli_real_escape_string($connect,$_POST['emp_gender']);
    $emp_birthDate =mysqli_real_escape_string($connect,$_POST['emp_birthDate']);
    $emp_f_name =mysqli_real_escape_string($connect,$_POST['emp_f_name']);
    $emp_l_name =mysqli_real_escape_string($connect,$_POST['emp_l_name']);
    $emp_middle_name =mysqli_real_escape_string($connect,$_POST['emp_middle_name']);
    $emp_l_name=mysqli_real_escape_string($connect,$_POST['emp_l_name']);
    $emp_username = mysqli_real_escape_string($connect,$_POST['emp_username']);
    $emp_email = mysqli_real_escape_string($connect,$_POST['emp_email']);
    $emp_pwd = mysqli_real_escape_string($connect,$_POST['emp_pwd']);
    $emp_pwd_Repeat = mysqli_real_escape_string($connect,$_POST['emp_pwd_Repeat']);
    $emp_phone_num =mysqli_real_escape_string($connect,$_POST['emp_phone_num']);
    $emp_address =mysqli_real_escape_string($connect,$_POST['emp_address']);
    $emp_city =mysqli_real_escape_string($connect,$_POST['emp_city']);
    $emp_postal_code =mysqli_real_escape_string($connect,$_POST['emp_postal_code']);

    $emp_dept_no = 0;
    switch ($emp_job_type) {
        case 'cleaner':
            $emp_dept_no = 1;
            break;
        case 'admin':
            $emp_dept_no = 3;
            break;
        case 'sales':
            $emp_dept_no = 2;
            break;
        case 'maintenance':
            $emp_dept_no = 4;
            break;
        
        default:
            $emp_dept_no = NULL;
            break;
    }

    function checkIds($connect, $randString)
    {
        $sql = "SELECT * From employee";
        $result = mysqli_query($connect, $sql);
        $Idexists= false;
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

    $emp_id= generateId($connect);
    
    

    // $emailCheck = filter_var($email, FILTER_VALIDATE_EMAIL);
    // $userNameCheck = preg_match("/^[a-zA-Z0-9]*$/", $userName);
    // if (empty($userName) || empty($email)  || empty($password) || empty($passwordRepeat)) {
    //     header("Location: ../signup.php?error=emptyfields&uid=" . $userName . "&email=" . $email);
    //     exit();
    // } else if (!$userNameCheck && !$emailCheck) {
    //     header("Location: ../signup.php?error=invalidemailuid=" . $userName);
    //     exit();
    // } else if (!$emailCheck) {
    //     header("Location: ../signup.php?error=invalidemail&uid=" . $userName);
    //     exit();
    // } else if (!$userNameCheck) {
    //     header("Location: ../signup.php?error=invaliduid&email=" . $email);
    //     exit();
    // } elseif ($password !== $passwordRepeat) {
    //     header("Location: ../signup.php?error=passwordcheck&uid=" . $userName . "&email=" . $email);
    //     exit();
    if ($emp_pwd !== $emp_pwd_Repeat) {
        header("Location: ../signup.php?error=passwordDontMatch");
        exit();
    } else {
        $sql =  "SELECT username FROM employee WHERE email=?;";
        $stmt = mysqli_stmt_init($connect);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../create_employee.html?error=sqlSelectError");
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, "s", $emp_email);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultCheck = mysqli_stmt_num_rows($stmt);
            if ($resultCheck > 0) {
                header("Location: ../create_employee.html?error=employeeAlreadyExists");
                exit();
            } else {
                $sql =  "INSERT INTO employee(SIN, Id, username, pwd, user_type, gender, f_name, m_name, l_name, street, postal_code, city, birth_date, job_type, email, phone_num, start_date, Dnum) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,);";
                $stmt = mysqli_stmt_init($connect); 
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    header("Location: ../signup.php?error=sqleInsertError");
                    exit();
                } else {
                    $hashpwd = password_hash($emp_pwd, PASSWORD_DEFAULT);
                    mysqli_stmt_bind_param($stmt, "ssssssssssssssssss", $emp_sin,$emp_id,$emp_username,$emp_pwd,$emp_user_type,$emp_gender,$emp_f_name,$emp_middle_name,$emp_l_name,$emp_address,$emp_postal_code,$emp_city,$emp_birthDate,$emp_job_type,$emp_email,$emp_start_date,$emp_dept_no);
                    mysqli_stmt_execute($stmt);
                    header("Location: ../signup.php?signup=success");
                    exit();
                }
            }
        }
    }

    mysqli_stmt_close($stmt);
    mysqli_close($connect);
} else {
    header("Location: ../signup.php");
    exit();
}