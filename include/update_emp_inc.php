<?php

if (isset($_POST['update_emp_submit'])) {
    require 'db_connection_inc.php';

    $emp_sin = mysqli_real_escape_string($connect, $_POST['emp_sin']);
    $emp_f_name = mysqli_real_escape_string($connect, $_POST['emp_f_name']);
    $emp_l_name = mysqli_real_escape_string($connect, $_POST['emp_l_name']);
    $emp_phone_num = mysqli_real_escape_string($connect, $_POST['emp_phone_num']);
    $emp_address = mysqli_real_escape_string($connect, $_POST['emp_address']);
    $emp_city = mysqli_real_escape_string($connect, $_POST['emp_city']);
    $emp_postal_code = strtoupper(mysqli_real_escape_string($connect, $_POST['emp_postal_code']));

    $sql = "UPDATE employee SET f_name=?, l_name=?, phone_num=?, street=?, city=?, postal_code=? WHERE SIN=?;";
    $stmt = mysqli_stmt_init($connect);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../index.php?error=sqlErrorSelectAdmin");
        exit();
    } else {
        mysqli_stmt_bind_param($stmt, "sssssss", $emp_f_name, $emp_l_name, $emp_phone_num, $emp_address, $emp_city, $emp_postal_code,$emp_sin);
        mysqli_stmt_execute($stmt);

            header("Location: ../admin_update_employee.php?updated=success");
            exit();
        
    }
}
