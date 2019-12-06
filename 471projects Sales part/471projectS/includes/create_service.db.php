<?php
include_once 'dbh.php';


$second = $_POST['type'];
$third = $_POST['name'];
$forth = $_POST['status'];
$fifth = $_POST['D_num'];

if( $second ==null || $third == null || $forth == null || $fifth ==null){
    header("Location: ../null.php");

}else{

    $sql = "INSERT INTO services (type, name, status, D_num) VALUES ('$second', '$third', '$forth', '$fifth');" ;
    mysqli_query($conn, $sql);
    header("Location: ../suessful.php?submit=success");

}
?>