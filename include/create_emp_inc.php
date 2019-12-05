<?php

if (isset($_POST['create_emp_submit'])) {
    require 'db_connection_inc.php';
    $emp_user_type = mysqli_real_escape_string($connect, $_POST['emp_user_type']);
    $emp_job_type = mysqli_real_escape_string($connect, $_POST['emp_job_type']);
    $salary = mysqli_real_escape_string($connect, $_POST['emp_salary']);
    $hourly_Rate = mysqli_real_escape_string($connect, $_POST['emp_hourly_Rate']);
    $emp_start_date = mysqli_real_escape_string($connect, $_POST['emp_start_date']);
    $emp_sin = mysqli_real_escape_string($connect, $_POST['emp_sin']);
    $emp_gender = mysqli_real_escape_string($connect, $_POST['emp_gender']);
    $emp_birthDate = mysqli_real_escape_string($connect, $_POST['emp_birthDate']);
    $emp_f_name = mysqli_real_escape_string($connect, $_POST['emp_f_name']);
    $emp_l_name = mysqli_real_escape_string($connect, $_POST['emp_l_name']);
    $emp_middle_name = mysqli_real_escape_string($connect, $_POST['emp_middle_name']);
    $emp_l_name = mysqli_real_escape_string($connect, $_POST['emp_l_name']);
    $emp_username = mysqli_real_escape_string($connect, $_POST['emp_username']);
    $emp_email = mysqli_real_escape_string($connect, $_POST['emp_email']);
    $emp_pwd = mysqli_real_escape_string($connect, $_POST['emp_pwd']);
    $emp_pwd_Repeat = mysqli_real_escape_string($connect, $_POST['emp_pwd_Repeat']);
    $emp_phone_num = mysqli_real_escape_string($connect, $_POST['emp_phone_num']);
    $emp_address = mysqli_real_escape_string($connect, $_POST['emp_address']);
    $emp_city = mysqli_real_escape_string($connect, $_POST['emp_city']);
    $emp_postal_code = strtoupper(mysqli_real_escape_string($connect, $_POST['emp_postal_code']));
    $emp_num_sales =NULL;
    $emp_salary = floatval($salary);
    $emp_hourly_Rate = floatval($hourly_Rate);

    if ($emp_middle_name == "")
        $emp_middle_name = NULL;

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

    $emp_id = generateId($connect);

    if ($emp_pwd !== $emp_pwd_Repeat) {
        header("Location: ../signup.php?error=passwordDontMatch");
        exit();
    } else {
        $sql =  "SELECT * FROM employee WHERE SIN=? OR email=? OR username=?;";
        $stmt = mysqli_stmt_init($connect);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../admin/create_employee.php?error=sqlSelectError");
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, "sss", $emp_sin, $emp_email, $emp_username);
            mysqli_stmt_execute($stmt);
            $response = mysqli_stmt_get_result($stmt);
            // mysqli_stmt_store_result($stmt);
            // $resultCheck = mysqli_stmt_num_rows($stmt);
            if ($row = mysqli_fetch_assoc($response)) {
                if ($row['SIN'] == $emp_sin) {
                    header("Location: ../admin/create_employee.php?error=employeeAlreadyExists");
                    exit();
                } elseif ($row['email'] == $emp_email && $row['username'] == $emp_username) {
                    header("Location: ../admin/create_employee.php?error=emailAndusernameAlreadyExists");
                    exit();
                } elseif ($row['email'] == $emp_email) {
                    header("Location: ../admin/create_employee.php?error=emailAlreadyExists");

                    exit();
                } elseif ($row['username'] == $emp_username) {
                    header("Location: ../admin/create_employee.php?error=usernameAlreadyExists");
                    exit();
                }
            } else {
                $sql =  "INSERT INTO employee (SIN, Id, username, pwd, user_type, gender, f_name, m_name, l_name, street, postal_code, city, birth_date, job_type, email, phone_num, start_date, Dnum) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?);";
                $stmt = mysqli_stmt_init($connect);
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    header("Location: ../admin/create_employee.php?error=sqleInsertError");
                    exit();
                } else {
                    $hashpwd = password_hash($emp_pwd, PASSWORD_DEFAULT);
                    mysqli_stmt_bind_param($stmt, "sssssssssssssssssi", $emp_sin, $emp_id, $emp_username, $hashpwd, $emp_user_type, $emp_gender, $emp_f_name, $emp_middle_name, $emp_l_name, $emp_address, $emp_postal_code, $emp_city, $emp_birthDate, $emp_job_type, $emp_email, $emp_phone_num, $emp_start_date, $emp_dept_no);
                    mysqli_stmt_execute($stmt);
                    // header("Location: ../admin.php?signup=success");
                    // exit();
                }

                //Insert employee into special jobtype if jobtype is different than "employee"
                if ($emp_job_type == "admin") {
                    $sql =  "INSERT INTO it(SIN, salary) VALUES (?,?);";
                    $stmt = mysqli_stmt_init($connect);
                    if (!mysqli_stmt_prepare($stmt, $sql)) {
                        header("Location: ../admin/create_employee.php?error=sqlEmp_Admin_InsertError");
                        exit();
                    } else {
                        mysqli_stmt_bind_param($stmt, "sd", $emp_sin, $emp_salary);
                        mysqli_stmt_execute($stmt);
                        header("Location: ../admin/admin.php?signupAdmin=success");
                        exit();
                    }
                }
                else if ($emp_job_type == "cleaner") {
                    $sql =  "INSERT INTO cleaners(SIN, hourly_rate) VALUES (?,?);";
                    $stmt = mysqli_stmt_init($connect);
                    if (!mysqli_stmt_prepare($stmt, $sql)) {
                        header("Location: ../admin/create_employee.php?error=sqlEmp_Clean_InsertError");
                        exit();
                    } else {
                        mysqli_stmt_bind_param($stmt, "sd", $emp_sin, $emp_hourly_Rate);
                        mysqli_stmt_execute($stmt);
                        header("Location: ../admin/admin.php?signupCleaner=success");
                        exit();
                    }
                }

               else if ($emp_job_type == "sales") {
                    $sql =  "INSERT INTO `sales associate`(SIN, salary, num_sales) VALUES  (?,?,?);";
                    $stmt = mysqli_stmt_init($connect);
                    if (!mysqli_stmt_prepare($stmt, $sql)) {
                        header("Location: ../admin/create_employee.php?error=sqlEmp_Sales_InsertError");
                        exit();
                    } else {
                        mysqli_stmt_bind_param($stmt, "sdi", $emp_sin, $emp_salary,$emp_num_sales);
                        mysqli_stmt_execute($stmt);
                        header("Location: ../admin/admin.php?signupSales=success");
                        echo($emp_salary);
                        exit();
                    }
                }

                else if ($emp_job_type == "maintenance") {
                    $sql =  "INSERT INTO maintenance(SIN, salary) VALUES (?,?);";
                    $stmt = mysqli_stmt_init($connect);
                    if (!mysqli_stmt_prepare($stmt, $sql)) {
                        header("Location: ../admin/create_employee.php?error=sqlEmp_Maintain_InsertError");
                        exit();
                    } else {
                        mysqli_stmt_bind_param($stmt, "sd", $emp_sin, $emp_salary);
                        mysqli_stmt_execute($stmt);
                        header("Location: ../admin/admin.php?signupMaint=success");
                        echo($emp_salary);
                        exit();
                    }
                }

                else if ($emp_job_type == "employee") {
                    $sql =  "INSERT INTO other_employee(SIN, salary) VALUES (?,?);";
                    $stmt = mysqli_stmt_init($connect);
                    if (!mysqli_stmt_prepare($stmt, $sql)) {
                        header("Location: ../admin/create_employee.php?error=sqlEmp_Other_InsertError");
                        exit();
                    } else {
                        mysqli_stmt_bind_param($stmt, "sd", $emp_sin, $emp_salary);
                        mysqli_stmt_execute($stmt);
                        header("Location: ../admin/admin.php?signupOther=success");
                       
                        exit();
                    }
                }

                else {
                    header("Location: ../admin/create_employee.php?error=somethingWeirdHappen");
                    exit();
                }
            }
        }
    }

    mysqli_stmt_close($stmt);
    mysqli_close($connect);
} else {
    header("Location: ../admin/admin.php");
    exit();
}
