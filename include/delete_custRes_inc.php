<?php

if (isset($_GET['deleteRes'])) {
    require 'db_connection_inc.php';
    $cust_id = mysqli_real_escape_string($connect, $_GET['deleteRes']);

    $sql = "DELETE From special_res Where C_id=?;";
    $stmt = mysqli_stmt_init($connect);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../customer/customer_view_req.php?error=sqlErrorSelectSpecRes");
        exit();
    } else {
        mysqli_stmt_bind_param($stmt, "i", $cust_id);
        mysqli_stmt_execute($stmt);
        header("Location: ../customer/customer_view_req.php?deletion=success");
        exit();
    }
}