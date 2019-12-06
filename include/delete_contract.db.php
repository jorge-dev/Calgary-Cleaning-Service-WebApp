<?php

if (isset($_GET['deleteCon'])) {
    require 'db_connection_inc.php';
    $num = $_GET['deleteCon'];

    $sql = "DELETE FROM contract WHERE  number=?;";
    $stmt = mysqli_stmt_init($connect);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../sales/delete_contract.php?error=sqlDeleteError");
        exit();
    } else {
        mysqli_stmt_bind_param($stmt, "i", $num);
        mysqli_stmt_execute($stmt);
            header("Location: ../sales/sales.php?deleteCon=success");
            exit();
     }

}


?>