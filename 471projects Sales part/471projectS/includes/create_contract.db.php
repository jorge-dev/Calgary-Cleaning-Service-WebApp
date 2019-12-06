<?php
include_once 'dbh.php';

$first = $_POST['number'];
$second = $_POST['start_date'];
$third = $_POST['end_date'];
$forth = $_POST['fee'];
$fifth = $_POST['service_type'];
$sixth = $_POST['num_hours'];
$seventh = $_POST['status'];
$eighth = $_POST['C_id'];

$sql1 = "SELECT * FROM customers WHERE ID = '$eighth';";
$result1 = mysqli_query($conn, $sql1);
$resultCheck = mysqli_num_rows($result1);


if($resultCheck > 0){
    if( $second ==null || $third == null || $forth == null || $fifth ==null ||$sixth == null || $seventh == null || $eighth == null){
        header("Location: ../null.php");

    }else{

        $sql = "INSERT INTO contract (number, start_date, end_date, fee, service_type, num_hours, status, C_id) VALUES ($first,'$second', '$third', $forth, '$fifth',$sixth, '$seventh', $eighth );" ;
        mysqli_query($conn, $sql);
        header("Location: ../suessful.php?submit=success");

    }
}else {
    header("Location: ../data_not_in_scope.php");
}
?>