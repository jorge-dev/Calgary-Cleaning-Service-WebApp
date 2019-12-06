<?php
session_start();
if (!isset($_SESSION['maint_emp_id'])) {
    header('location: ../index.php?error=NeedtoLoginToseeEmployeePage');
    include_once("maintenance/equipment_delete.php");

    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Equipment delete</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="custom3.css" />
</head>

<body>
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
                <a class="nav-link  " href="equipment_search.php"><h5>View Equipment</h5> <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item ">
                <a class="nav-link" href="equipment_add.php"><h5>Add Equipment</h5> <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item ">
                <a class="nav-link " href="equipment_update.php"><h5> Update Equipment</h5> <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item ">
                <a class="nav-link text-success" href="equipment_delete.php"><h5>  Delete Equipment</h5> <span class="sr-only">(current)</span></a>
                </li>


            </ul>
            <form action="../include/logout_inc.php" method="post">
                <button type="submit" class="btn btn-success">Logout</button>
            </form>
        </div>
    </nav>


    <div class="d-flex justify-content-center align-items-center " style="margin-top:55px;">

<form name="myform" class="bg-dark pr-3 pl-4 pb-4 pt-4 pb-4   text-center" method="POST" style="margin-top:55px;margin-bottom:25px;">
    <h1 class="d-flex justify-content-center ">Search Employee </h1>

    <?php

    if (@$_GET['updated'] == 'success') {

        echo ' 
<br/>
<div class="alert bg-success mx-auto alert-dismissible fade show" role="alert">
    <p class="text-center alert-heading" style ="width:340px;"><strong class="alert-heading">Success!</strong>  <br/> Employee was succesfully updated.</p>
    <button type="button" class="pl-0 pr-2 pt-1 close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
</div>';
    }
    ?>
    <div class="form-row ">
        <div class=" wrap-input100   form-group">
            <label class=" font-weight-bold justify-content-center mt-2">Enter Equipment Id </label>
            <input class="input300 form-control" type="text" required  pattern="\d*" name="del_id" placeholder="Id" oninvalid="this.setCustomValidity('Valid Id Required')" oninput="this.setCustomValidity('')">
            <span class="focus-input100"></span>
        </div>

    </div>



    <button type="submit" id="emp_submit" name="EID" class="btn mt-3 mb-3  btn-md btn-custom btn-block text-uppercase">
        Search
    </button>

</form>
</div>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        require '../include/db_connection_inc.php';
        $del_id = mysqli_real_escape_string($connect, $_POST['del_id']);
        $sql = "SELECT * from equipment where Id=? ";

        $stmt = mysqli_stmt_init($connect);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: admin.php?error=sqlErrorSelectEmp");
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, "i", $del_id);
            mysqli_stmt_execute($stmt);

            $response = mysqli_stmt_get_result($stmt);


            if ($m = mysqli_fetch_assoc($response)) {
                echo ' <div class=" text-center  container-fluid">
                    <table class="table table-lg table-hover table-striped table-bordered table-dark " style="border-radius:10px;">
                    <tr class="bg-success">
                        <th colspan="6" style="font-size:1.8em;font-weight:bold;">Employee</th>
                    </tr>
                    <tr>
                        <th></th>
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
                    
                    echo '
                      
                    <tr>
                    <td class ="align-middle"">  <a  href="../include/euipment_delete.db.php?deleteEq=' . $id . '" class="btn tn-md btn-delete text-uppercase">
                    Delete
                </a></td>
                            <td>' . $id . '</td>
                            <td>' . $row["description"] . '</td>
                            <td>' . $row["name"] . '</td>
                            <td>' . $row["status"] . '</td>
                            <td>' . $row["D_num"] . '</td>
                           
                        </tr>';
                }


                echo '</table>   </div>';





                exit();
            } else {

                echo '<div class=" text-center  container-fluid admin_tables"> <table class="table table-hover table-striped table-bordered table-dark ">
                          <tr class="bg-danger">
                              <th colspan="11">There is no equipment with that id in database</th>
                          </tr>
                  </table></div>';

                exit();
            }
        }
        mysqli_stmt_close($stmt);
        mysqli_close($connect);
    }
    ?>

    <div style="text-align: center; font-size:25px; font-display:inherit; color:black;">
        <a href="equipment.php">
            <button class="btn btn-custom mt-4 mb-2 mr-4" style="font-size:25px; ">BACK</button>
        </a>
    </div>
    <script src="../vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script src="../vendor/bootstrap/js/popper.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="../vendor/select2/select2.min.js"></script>
    <!--===============================================================================================-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
    <script src="https://kit.fontawesome.com/642ada6dc1.js" crossorigin="anonymous"></script>
    <script>
        window.history.replaceState({}, document.title, "/" + "471-Project/maintenance/equipment_delete.php");
    </script>
</body>

</html>