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

$sql1 = "SELECT * FROM contract WHERE C_id = '$eighth' AND number = $first;";
$result1 = mysqli_query($conn, $sql1);
$resultCheck = mysqli_num_rows($result1);


if($resultCheck > 0){
    if( $second ==null || $third == null || $forth == null || $fifth ==null ||$sixth == null || $seventh == null || $eighth == null){
        header("Location: ../null.php");

    }else{

        $sql = "UPDATE contract SET  start_date = '$second', end_date = '$third', fee = $forth, service_type = '$fifth', num_hours = $sixth, status = '$seventh' WHERE C_id = $eighth AND number = $first;"  ;
        mysqli_query($conn, $sql);
        header("Location: ../suessful.php?submit=success");

    }
}else {
    header("Location: ../data_not_in_scope.php");
}
?>