<?php

if (isset($_GET['deleteSup'])) {
    require 'db_connection_inc.php';
    $first = $_GET['deleteSup'];

    $sql = "DELETE FROM supplies WHERE Id =?;";
    $stmt = mysqli_stmt_init($connect);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../maintenance/supplies_delete.php?error=sqlDeleteError");
        exit();
    } else {
        mysqli_stmt_bind_param($stmt, "i", $first);
        mysqli_stmt_execute($stmt);
            header("Location: ../maintenance/supplies.php?delete=success");
            exit();
        }

}


?>