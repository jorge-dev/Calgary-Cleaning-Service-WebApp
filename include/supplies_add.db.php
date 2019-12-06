<?php
require 'db_connection_inc.php';

$first = $_POST['name'];
$second = $_POST['qty'];
$third = $_POST['in_stock'];
$forth = $_POST['ordered_date'];
$fifth = $_POST['D_num'];

if($first == null || $second ==null || $third == null || $forth == null || $fifth == null ){
    header("Location: ../supplies_update_fail_null.php");
}elseif($second < $third){
    header("Location: ../supplies_update_fail_qtySmallerThanStock.php");
}else{
    $sql = "INSERT INTO supplies (name, qty, in_stock, ordered_date, D_num) VALUES ('$first', $second, $third, '$forth',$fifth);" ;
    mysqli_query($connect, $sql);
    header("Location: ../supplies_add_successful.php?submit=success");
}
?>