<?php
session_start();
if (!isset($_SESSION['maint_emp_id'])) {
    header('location: ../index.php?error=NeedtoLoginToseeEmployeePage');
    include_once("maintenance/equipment_search.php");

    exit;
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="StyleSheet1.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="custom3.css" />
    <title>Equipment search</title>
</head>
<body >
     <nav class="navbar navbar-expand-md navbar-dark fixed-top">
        <a class="navbar-brand font-weight-bold" href="equipment.php".php">
            <h3>Equipment</h3>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault"
            aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item ">
                <a class="nav-link  text-success" href="equipment_search.php"><h5>View Equipment</h5> <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item ">
                <a class="nav-link" href="equipment_add.php"><h5>Add Equipment</h5> <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item ">
                <a class="nav-link" href="equipment_update.php"><h5> Update Equipment</h5> <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item ">
                <a class="nav-link" href="equipment_delete.php"><h5>  Delete Equipment</h5> <span class="sr-only">(current)</span></a>
                </li>


            </ul>
            <form action="../include/logout_inc.php" method="post">
                <button type="submit" class="btn btn-success">Logout</button>
            </form>
        </div>
    </nav>

<main>


<?php
    require '../include/db_connection_inc.php';

    $sql = "SELECT * from equipment ";

    $stmt = mysqli_stmt_init($connect);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: equipment_update.php?error=sqlErrorSelectEmp");
        exit();
    } else {
        mysqli_stmt_execute($stmt);

        $response = mysqli_stmt_get_result($stmt);


        if ($m = mysqli_fetch_assoc($response)) {
            echo ' <div class=" text-center  container-fluid admin_tables">
                <table class="table table-lg table-hover table-striped table-bordered table-dark " style="border-radius:10px;">
                <tr class="bg-success">
                    <th colspan="5" style="font-size:1.8em;font-weight:bold;">List fo Equipment </th>
                </tr>
                <tr>
                
                    <th scope="col">ID</th>
                    <th scope="col">Description</th>
                    <th scope="col">Name</th>
                    <th scope="col">Status</th>
                    <th scope="col">Department Number</th>
                   
                   
                </tr>';
            mysqli_free_result($response);
            mysqli_stmt_execute($stmt);

            $response = mysqli_stmt_get_result($stmt);

            while ($row = mysqli_fetch_assoc($response)) {
                $id = $row['Id'];
                $description = $row["description"];
                $name= $row["name"];
                $status= $row["status"];
                $dnum=$row["D_num"];
                
                echo '
                  
               
                        <td>' . $id . '</td>
                        <td>' . $description . '</td>
                        <td>' . $name. '</td>
                        <td>' .  $status. '</td>
                        <td>' . $dnum . '</td>
                       
                    </tr>';
            }


            echo '</table>   </div>';

          



            exit();
        } else {

            echo '<div class=" text-center  container-fluid admin_tables"> <table class="table table-hover table-striped table-bordered table-dark ">
                  <tr class="bg-danger">
                      <th colspan="11">There are no Equipment database</th>
                  </tr>
          </table></div>';

            exit();
        }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($connect);

?>




</main>


    <script src="../vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script src="../vendor/bootstrap/js/popper.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="../vendor/select2/select2.min.js"></script>
    <!--===============================================================================================-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
    <script src="https://kit.fontawesome.com/642ada6dc1.js" crossorigin="anonymous"></script>
    <script>window.history.replaceState({}, document.title, "/" + "471-Project/maintenance/equipment_search.php");</script> 
</body>
</html>