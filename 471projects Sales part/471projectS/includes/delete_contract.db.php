<?php
include_once 'dbh.php';

$first = $_POST['number'];

$sql1 = "SELECT * FROM contract WHERE number = '$first';";
$result1 = mysqli_query($conn, $sql1);
$resultCheck = mysqli_num_rows($result1);

if($resultCheck > 0){
    $sql = "DELETE FROM contract WHERE number = '$first';" ;
    mysqli_query($conn, $sql);


    header("Location: ../suessful.php?submit=success");
}else{
    header("Location: ../data_not_in_scope.php");
}
?>