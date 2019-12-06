<?php
require 'db_connection_inc.php';

$first = $_POST['SID'];
$second = $_POST['name'];
$third = $_POST['qty'];
$forth = $_POST['in_stock'];
$fifth = $_POST['ordered_date'];
$sixth = $_POST['D_num'];


$sql1 = "SELECT * FROM supplies WHERE id = '$first';";
$result1 = mysqli_query($connect, $sql1);
$resultCheck = mysqli_num_rows($result1);

if($resultCheck > 0){


    if($first == null || $second ==null || $third == null || $forth == null || $fifth == null || $sixth == null){
        header("Location: ../supplies_update_fail_null.php");
    }elseif($third < $forth){
        header("Location: ../supplies_update_fail_qtySmallerThanStock.php");
    }
    else{
        $sql = "UPDATE supplies SET name = '$second', qty = $third, in_stock = $forth, ordered_date = '$fifth', D_num = '$sixth' WHERE id = $first;" ;
        mysqli_query($connect, $sql);
        header("Location: ../supplies_update_success.php?submit=success");
    }
}else{
    header("Location: ../supplies_update_fail_notInScope.php");
}
?>