<?php
    require 'include/db_connection_inc.php';

    function checkIds($connect, $randString)
    {
        $sql = "SELECT * From employee";
        $result = mysqli_query($connect, $sql);
        $Idexists= false;
        while ($row = mysqli_fetch_assoc($result)) {
            if ($row['id'] == $randString) {
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
        $idLength = 7;
        $str = "0123456789";
        $randStr =  substr(str_shuffle($str), 0, $idLength);

        $checkID = checkIds($connect, $randStr);
        while ($checkID == true) {
            $randStr =  substr(str_shuffle($str), 0, $idLength);
            $checkID = checkIds($connect, $randStr);
        }

        return $randStr;
    }

//    $ex = generateId($connect);
    
//     echo "<p>$ex</p>";
//     echo gettype($ex);
    