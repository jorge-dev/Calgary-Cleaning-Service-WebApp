<?php

if (isset($_POST['create_emp_submit'])) {
    require 'db_connection_inc.php';
    
    $user_type = "customer";
    $cust_type =mysqli_real_escape_string($connect,$_POST['cust_type']);
    $f_name =mysqli_real_escape_string($connect,$_POST['f_name']);
    $l_name =mysqli_real_escape_string($connect,$_POST['l_name']);
    $gender =mysqli_real_escape_string($connect,$_POST['gender']);
    $company_name =mysqli_real_escape_string($connect,$_POST['company_name']);
    $comp_Rep_num=mysqli_real_escape_string($connect,$_POST['comp_Rep_num']);
    $username = mysqli_real_escape_string($connect,$_POST['username']);
    $email = mysqli_real_escape_string($connect,$_POST['email']);
    $pwd = mysqli_real_escape_string($connect,$_POST['pwd']);
    $pwd_Repeat = mysqli_real_escape_string($connect,$_POST['pwd_Repeat']);
    $phone_num =mysqli_real_escape_string($connect,$_POST['phone_num']);
    $address =mysqli_real_escape_string($connect,$_POST['address']);
    $city =mysqli_real_escape_string($connect,$_POST['city']);
    $postal_code =mysqli_real_escape_string($connect,$_POST['postal_code']);
    $province =mysqli_real_escape_string($connect,$_POST['province']);

    
    

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
        $idLength = 10;
        $str = "0123456789abc";
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
                $sql =  "INSERT INTO employee (SIN, Id, username, pwd, user_type, gender, f_name, m_name, l_name, street, postal_code, city, birth_date, job_type, email, phone_num, start_date, Dnum) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?);";
                $stmt = mysqli_stmt_init($connect); 
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    header("Location: ../create_employee.html?error=sqleInsertError");
                    exit();
                } else {
                    $hashpwd = password_hash($emp_pwd, PASSWORD_DEFAULT);
                    mysqli_stmt_bind_param($stmt, "sssssssssssssssssi", $emp_sin,$emp_id,$emp_username,$hashpwd,$emp_user_type,$emp_gender,$emp_f_name,$emp_middle_name,$emp_l_name,$emp_address,$emp_postal_code,$emp_city,$emp_birthDate,$emp_job_type,$emp_email,$emp_phone_num,$emp_start_date,$emp_dept_no);
                    mysqli_stmt_execute($stmt);
                    header("Location: ../admin.html?signup=success");
                    exit();
                }
            }
        }
    }

    mysqli_stmt_close($stmt);
    mysqli_close($connect);
} else {
    header("Location: ../admin.html");
    exit();
}