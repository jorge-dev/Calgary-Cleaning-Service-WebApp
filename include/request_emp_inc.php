<?php 
session_start();
if (isset($_POST['request_emp_submit'])) { 
    require 'db_connection_inc.php' ; 
    $res_num = intval(mysqli_real_escape_string($connect, $_POST['res_num']));
    $num_hours = intval(mysqli_real_escape_string($connect, $_POST['num_hours']));
    $start_date = mysqli_real_escape_string($connect, $_POST['start_date']);
    $end_date = mysqli_real_escape_string($connect, $_POST['end_date']);
    $reason = mysqli_real_escape_string($connect, $_POST['reason']);
    $status ="On Review";
    $cust_id= $_SESSION['cust_id'];
    $cust_id = intval($cust_id);
    
    echo $cust_id;

    $sql =  "SELECT * FROM special_res WHERE number=?;";
    $stmt = mysqli_stmt_init($connect);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../customer/customer.php?error=sqlSelectError");
        exit();
    } else {
        mysqli_stmt_bind_param($stmt, "i", $res_num);
        mysqli_stmt_execute($stmt);
        // $response = mysqli_stmt_get_result($stmt);
        mysqli_stmt_store_result($stmt);
        $resultCheck = mysqli_stmt_num_rows($stmt);
        if ($resultCheck > 0) {
           header("location: ../customer/customer.php?error=EmpHasReserv");
           exit();
        } else {
            $sql =  "INSERT INTO special_res (number,status,start_date,end_date,num_hours,comments,C_id) VALUES (?,?,?,?,?,?,?);";
            $stmt = mysqli_stmt_init($connect);
            if (!mysqli_stmt_prepare($stmt, $sql)) {
                header("Location: ../customer/customer.php?error=sqleInsertError");
                exit();
            } else {
                mysqli_stmt_bind_param($stmt, "isssisi", $res_num,$status,$start_date,$end_date,$num_hours,$reason,$cust_id);
                mysqli_stmt_execute($stmt);
                header("Location: ../customer/customer.php?createReq=success");
                exit();
            }

    exit();
    
        }}
} 
else {
    exit("Location ../customer/customer.php?error=CantAccess");
}
?>