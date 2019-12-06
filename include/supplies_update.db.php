<?php

if (isset($_POST['up_sup'])) {
    require 'db_connection_inc.php';

    $id = $_POST['id'];
    $name = $_POST['name'];
    $qty = $_POST['qty'];
    $stock = intval($_POST['stock']);
    $o_date = $_POST['o_date'];
    $dep = $_POST['dep'];


    $sql = "UPDATE supplies SET name=?, qty=?, in_stock=?, ordered_date=?, D_num=? WHERE Id=?;";
    $stmt = mysqli_stmt_init($connect);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../maintenance/supplies_update.php?error=sqlSelectError");
        exit();
    } else {
mysqli_stmt_bind_param($stmt, "siisii", $name,$qty,$stock,$o_date,$dep,$id);
        mysqli_stmt_execute($stmt);
            echo'hello';
            header("Location: ../maintenance/supplies.php?update=success");
            exit();
        
    }
}
