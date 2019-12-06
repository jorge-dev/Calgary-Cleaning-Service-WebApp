<?php
session_start();
if (!isset($_SESSION['maint_emp_id'])) {
    header('location: ../index.php?error=NeedtoLoginToseeEmployeePage');
    include_once("maintenance/supplies_search.php");

    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Supplies search</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- <link rel="stylesheet" type="text/css" href="StyleSheet11.css" /> -->
    <link href="StyleSheet1.css" rel="stylesheet">
    <!-- <link rel="stylesheet" type="text/css" href="StyleSheet11.css" /> -->
    <link rel="stylesheet" type="text/css" href="custom3.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>
<div class="bg-success pb-4 mt-5 mb-5"><h2 style="text-align:center; color : lightpink; font-size: 60px; ">Supplies Search</h2></div> 

    <form style="text-align: center;" method="POST">
        <input style="text-align:center; font-size:30px;" type="text" name="SID" placeholder="Please enter supplies id" />
        <div class = "d-flex justify-content-center">
            <button class = "btn btn-custom mt-4 mb-2 mr-4" type=" search" name="search" value="search" style="font-size:30px;">SEARCH</button>
        </div>
    </form>

    <div style="text-align:center;" >
    <table class="table table-hover table-striped table-dark ">
        <?php
        include '../include/db_connection_inc.php';
        if(isset($_POST['search'])){
            $search = mysqli_real_escape_string($connect, $_POST['SID']);
            $sql = "SELECT * FROM supplies WHERE id = '$search';";
            $result1 = mysqli_query($connect, $sql);
            $resultCheck = mysqli_num_rows($result1);
            if($resultCheck >0){
                while($row = mysqli_fetch_assoc($result1)){

                    echo "
                    <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Quantity</th>
                    <th>Status</th>
                    <th>Ordered Date</th>
                    <th>Department Number</th>
                    </tr>
                    <tr>
                      <td> ".$row['Id']."
                      <td> ".$row['name']."
                      <td> ".$row['qty']."
                      <td> ".$row['in_stock']."
                      <td> ".$row['ordered_date']."
                      <td> ".$row['D_num']."
                      </tr>
                   ";
                }
            }else{
                echo " <h1>There are no results of your search." ;
            }
        }
        ?> </table> 
        </div>
        <div class = "d-flex justify-content-center" style="text-align: center; font-size:25px; font-display:inherit; color:black;">
        <a href="supplies.php">
            <button class="btn btn-custom mt-4 mb-2 mr-4" style="font-size:30px;">BACK</button>
        </a>
    </div>

    <script>window.history.replaceState({}, document.title, "/" + "471-Project/maintenance/supplies_search.php");</script> 
</body>
</html>