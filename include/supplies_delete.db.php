<?php
require 'db_connection_inc.php';

$first = $_POST['SID'];

$sql1 = "SELECT * FROM supplies WHERE id = '$first';";
$result1 = mysqli_query($connect, $sql1);
$resultCheck = mysqli_num_rows($result1);

if($resultCheck > 0){
    $sql = "DELETE FROM supplies WHERE id = '$first';" ;
    mysqli_query($connect, $sql);


    header("Location: ../supplies_delete_successful.php?submit=success");
}else{
    header("Location: ../supplies_update_fail_notInScope.php");
}


?>