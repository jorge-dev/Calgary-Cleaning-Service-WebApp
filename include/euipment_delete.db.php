<?php

if (isset($_GET['deleteEq'])) {
    require 'db_connection_inc.php';
    $first = $_GET['deleteEq'];

    $sql = "DELETE FROM equipment WHERE Id =?;";
    $stmt = mysqli_stmt_init($connect);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../maintenance/equipment_delete.php?error=sqlDeleteError");
        exit();
    } else {
        mysqli_stmt_bind_param($stmt, "i", $first);
        mysqli_stmt_execute($stmt);
            header("Location: ../maintenance/equipment.php?delete=success");
            exit();
        }

}


?>