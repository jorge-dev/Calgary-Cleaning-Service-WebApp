<?php

if (isset($_GET['delete'])) {
    require 'db_connection_inc.php';
    $sin = mysqli_real_escape_string($connect, $_GET['delete']);

    $sql = "DELETE  From employee Where SIN=?;";
    $stmt = mysqli_stmt_init($connect);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../index.php?error=sqlErrorSelectAdmin");
        exit();
    } else {
        mysqli_stmt_bind_param($stmt, "s", $sin);
        mysqli_stmt_execute($stmt);

        $response = mysqli_stmt_get_result($stmt);
        if ($row = mysqli_fetch_assoc($response)) { 
            header("Location: ../admin_delete_employee.php?del=succcess");
            exit();
        }
    }
}
