<?php

if (isset($_POST['create_con'])) {
    require 'db_connection_inc.php';


    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    $fee = $_POST['fee'];
    $service_type = $_POST['service_type'];
    $num_hours = $_POST['num_hours'];
    $status = $_POST['status'];
    $C_id = $_POST['C_id'];


    function checkIds($connect, $randString)
    {
        $sql = "SELECT * From contract";
        $result = mysqli_query($connect, $sql);
        $Idexists = false;
        while ($row = mysqli_fetch_assoc($result)) {
            if ($row['number'] == $randString) {
                $Idexists = true;
                break;
            } else {
                $Idexists = false;
            }
        }
        return $Idexists;
    }

    function generateId($connect)
    {
        $idLength = 2;
        $str = "0123456789";
        $randStr =  substr(str_shuffle($str), 0, $idLength);

        $checkID = checkIds($connect, $randStr);
        while ($checkID == true) {
            $randStr =  substr(str_shuffle($str), 0, $idLength);
            $checkID = checkIds($connect, $randStr);
        }

        return $randStr;
    }

    $number = generateId($connect);

    // echo $first ." ";
    // echo $second ." ";
    // echo $third ." ";
    // echo $fourth ." ";
    // echo $fifth ." ";
    //    echo $sixth ." ";
    //    echo $seventh ." ";
    //    echo $eighth ." ";
    

    $sql = "INSERT INTO contract (number, start_date, end_date, fee, service_type, num_hours, status, C_id) VALUES (?,?,?,?,?,?,?,?);";
    $stmt = mysqli_stmt_init($connect);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../sales/create_contract.php?error=sqlSelectError");
        exit();
    } else {
        mysqli_stmt_bind_param($stmt, "issdsisi", $number,$start_date,$end_date,$fee,$service_type,$num_hours,$status,$C_id);
        mysqli_stmt_execute($stmt);
        echo 'hello';
        header("Location: ../sales/sales.php?createCon=success");
        exit();
    }
}
