<?php

if (isset($_POST['update_eq_submit'])) {
    require 'db_connection_inc.php';

    $id = mysqli_real_escape_string($connect, $_POST['id']);
    $description = mysqli_real_escape_string($connect, $_POST['description']);
    $status = mysqli_real_escape_string($connect, $_POST['status']);
    $name = mysqli_real_escape_string($connect, $_POST['name']);

    
    $sql = "UPDATE equipment SET description=?,name=?, status=? WHERE Id=?;";
    $stmt = mysqli_stmt_init($connect);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../maintenance/equipment_update.php?=sqlErrorSelectEQ");
        exit();
    } else {
        mysqli_stmt_bind_param($stmt, "sssi",  $description, $name, $status,$id );
        mysqli_stmt_execute($stmt);

        header("Location: ../maintenance/equipment.php?updated=success");
        exit();
    }
}
