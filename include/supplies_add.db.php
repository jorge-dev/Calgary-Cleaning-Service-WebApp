<?php

if (isset($_POST['add_sup'])) {
    echo'hello';
require 'db_connection_inc.php';

$name = $_POST['name'];
$qty = $_POST['qty'];
$stock = $_POST['stock'];
$o_date = $_POST['o_date'];
$dep = $_POST['dep'];



    $sql = "INSERT INTO supplies (name, qty, in_stock, ordered_date,D_num) VALUES (?,?,?,?,?);" ;
    $stmt = mysqli_stmt_init($connect);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../maintenance/supplies_add.php?error=sqlSelectError");
        exit();
    } else {
mysqli_stmt_bind_param($stmt, "sibsi", $name,$qty,$stock,$o_date,$dep);
        mysqli_stmt_execute($stmt);
            echo'hello';
            header("Location: ../maintenance/supplies.php?add=success");
            exit();
        
    }

}
