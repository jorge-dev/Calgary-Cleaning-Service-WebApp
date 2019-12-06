<?php
include_once 'includes/dbh.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Sum all sales by year Contract</title>
</head>
<body>

    <h1 style="text-align:center; color : rebeccapurple; font-size: 80px;"> Sum All Sales BY Year </h1>





    <form style="text-align: center;" action=" includes/sum_all_sales_by_year.db.php" method="POST">
        <input style="text-align:center; font-size:50px;" type="text" name="year" placeholder=" year of the sales" />
        <br>
        <br>
        <br>
        <br>
        <button tyep=" submit" name="submit" style=" text-align:center; font-size:50px;">SUM</button>

    </form>
    <div style="text-align:center;">
        <?php
        if(isset($_POST['submit'])){
            $first = $_POST['year'];
            $sql = "SELECT SUM(fee)  FROM contract WHERE year(start_date) as $first;";
            $result1 = mysqli_query($conn, $sql);
            $resultCheck = mysqli_num_rows($result1);
            if($resultCheck > 0){
            while($row = mysqli_fetch_assoc($result1))
            echo "Sum of the year: ".$row['fee'];
            }
            else{
                echo "there is no sales in the search year";
            }
        }




        ?>
    </div>
    <br>
    <br>
    <br>
    <br>
    <div style="text-align: center; font-size:50px; font-display:inherit; color:black;">
        <a href="sum_all_sales.php">
            <button style="font-size:60px;">BACK</button>
        </a>
    </div>
</body>
</html>