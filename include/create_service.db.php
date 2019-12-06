<?php
if (isset($_POST['create_ser'])) {
    require 'db_connection_inc.php';


$type = $_POST['type'];
$name = $_POST['name'];
$status = $_POST['status'];
$D_num = $_POST['D_num'];


    $sql = "INSERT INTO services(type, name, status, D_num) VALUES(?,?,?,?);" ;
    $stmt = mysqli_stmt_init($connect);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../sales/create_service.php?error=sqlSelectError");
        exit();
    } else {
        mysqli_stmt_bind_param($stmt, "sssi", $type,$name,$status,$D_num);
        mysqli_stmt_execute($stmt);
        echo 'hello';
        header("Location: ../sales/sales.php?createSer=success");
        exit();
    }

}
