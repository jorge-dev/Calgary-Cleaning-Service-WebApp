<?php

if (isset($_POST['update_con_submit'])) {
    require 'db_connection_inc.php';

    $number = $_POST['number'];
    $status = $_POST['status'];
   


    $sql = "UPDATE contract SET status=? WHERE number=?;";
    $stmt = mysqli_stmt_init($connect);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../sales/update_contract_status.php?error=sqlSelectError");
        exit();
    } else {
mysqli_stmt_bind_param($stmt, "si", $status,$number);
        mysqli_stmt_execute($stmt);
            echo'hello';
            header("Location: ../sales/sales.php?updateCon=success");
            exit();
        
    }
}
