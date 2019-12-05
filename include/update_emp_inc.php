<?php

if (isset($_GET['updated'])) {
    require 'db_connection_inc.php';
    $sin = mysqli_real_escape_string($connect, $_GET['updated']);

    $sql = "DELETE  From employee Where SIN=?;";
    $stmt = mysqli_stmt_init($connect);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../_update_employee.php?error=sqlErrorSelectEmp");
        exit();
    } else {
        mysqli_stmt_bind_param($stmt, "s", $sin);
        mysqli_stmt_execute($stmt);
        header("Location: ../admin_update_employee.php?deletion=success");
        exit();
    }
}