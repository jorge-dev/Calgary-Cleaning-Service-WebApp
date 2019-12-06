<?php
echo'hello';
if (isset($_POST['add_eq'])) {
    echo'hello';
require 'db_connection_inc.php';

$first = $_POST['description'];
$second = $_POST['name'];
$third = $_POST['status'];
$fourth = $_POST['D_num'];

if($first == null || $second ==null || $third == null || $fourth == null ){
    header("Location: ../maintenance/equipment.php?add=failNull");
    exit();

}
else{

    $sql = "INSERT INTO equipment (description, name, status, D_num) VALUES (?,?,?,?);" ;
    $stmt = mysqli_stmt_init($connect);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../maintenance/equipment_add.php?error=sqlSelectError");
        exit();
    } else {
        mysqli_stmt_bind_param($stmt, "sssi", $first,$second,$third,$fourth);
        mysqli_stmt_execute($stmt);
            echo'hello';
            header("Location: ../maintenance/equipment.php?add=success");
            exit();
        
    }
}
}
