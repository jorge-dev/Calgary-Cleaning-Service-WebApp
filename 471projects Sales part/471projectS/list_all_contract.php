<?php
include_once 'includes/dbh.php';
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>List all contract</title>
</head>
<body>

    <h1 style="text-align:center; color : rebeccapurple; font-size: 80px;"> Equipment search</h1>





    <form style="text-align: center;" method="POST">
       
        <button tyep=" search" name="search" value="search" style="font-size:50px;">LIST</button>

    </form>

    <div style="text-align:center;">
        <?php
        if(isset($_POST['search'])){

            $sql = "SELECT * FROM contract ;";
            $result1 = mysqli_query($conn, $sql);
            $resultCheck = mysqli_num_rows($result1);
            if($resultCheck >0){
                echo "all contracts are list below <br/>";
                while($row = mysqli_fetch_assoc($result1)){



                    $a = $row['number'];
                    $b = $row['start_date'];
                    $c = $row['end_date'];
                    $d = $row['fee'];
                    $e = $row['service_type'];
                    $f = $row['num_hours'];
                    $g = $row['status'];
                    $h = $row['C_id'];

                    echo'<table class = "table table-striped table-dark">
                       <tr> <td>'.$a.'</td> </tr>
                       <tr> <td>'.$b.'</td> </tr>
                       <tr> <td>'.$c.'</td> </tr>
                       <tr> <td>'.$d.'</td> </tr>
                       <tr> <td>'.$e.'</td> </tr>
                       <tr> <td>'.$f.'</td> </tr>
                       <tr> <td>'.$g.'</td> </tr>
                       <tr> <td>'.$h.'</td> </tr>
                    ';
                }
            }


        }




        ?>
    </div>
    <br />
    <br />
    <br />
    <br />
    <div style="text-align: center; font-size:50px; font-display:inherit; color:black;">
        <a href="index.php">
            <button style="font-size:60px;">BACK</button>
        </a>
    </div>

</body>
</html>