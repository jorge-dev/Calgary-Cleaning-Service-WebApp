<?php
session_start();
if (!isset($_SESSION['maint_emp_id'])) {
    header('location: ../index.php?error=NeedtoLoginToseeEmployeePage');
    include_once("maintenance/equipment_update.php");

    exit;
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Equipment Update</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="StyleSheet1.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="custom3.css" />
    
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
                <a class="nav-link  " href="equipment_search.php"><h5>Search Equipment</h5> <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item ">
                <a class="nav-link" href="equipment_add.php"><h5>Add Equipment</h5> <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item ">
                <a class="nav-link text-success" href="equipment_update.php"><h5> Update Equipment</h5> <span class="sr-only">(current)</span></a>
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
                <input class="input300 form-control" type="text" required  pattern="\d*" name="up_id" placeholder="Id" oninvalid="this.setCustomValidity('Valid Id Required')" oninput="this.setCustomValidity('')">
                <span class="focus-input100"></span>
            </div>

        </div>



        <button type="submit" id="emp_submit" name="search_emp_submit" class="btn mt-3 mb-3  btn-md btn-custom btn-block text-uppercase">
            Search
        </button>

    </form>
</div>


<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require '../include/db_connection_inc.php';

    $up_id = mysqli_real_escape_string($connect, $_POST['up_id']);
    $sql = "SELECT * from equipment where Id=? ";

    $stmt = mysqli_stmt_init($connect);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: equipment_update.php?error=sqlErrorSelectEmp");
        exit();
    } else {
        mysqli_stmt_bind_param($stmt, "i", $up_id);
        mysqli_stmt_execute($stmt);

        $response = mysqli_stmt_get_result($stmt);


        if ($m = mysqli_fetch_assoc($response)) {
            echo ' <div class=" text-center  container-fluid">
                <table class="table table-lg table-hover table-striped table-bordered table-dark " style="border-radius:10px;">
                <tr class="bg-success">
                    <th colspan="5" style="font-size:1.8em;font-weight:bold;">Employee</th>
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

          


            echo ' <div class="d-flex justify-content-center align-items-center " ">
            

            <form class="bg-dark pr-3 pl-4 pb-4 pt-4 pb-4 text-center" action="../include/euipment_update.db.php" method="POST" style="margin-top:20px;margin-bottom:35px;">

                <h2 class=" text-uppercase">Update Equipment</h2>
                <input type="hidden" name="id" value="'.$id.'">

            
              
              
                <div class="form-row ">
                    <div class=" wrap-input100   form-group col-md-6">
                        <label for="" class="mt-2">Description</label>
                        <input class="input300 form-control" type="text" name="description" value="'.$description.'" placeholder="description" required oninvalid="this.setCustomValidity(&apos;Description is Required&apos;)" oninput="this.setCustomValidity(&apos;&apos;)">
                        <span class="focus-input100"></span>
                    </div>


                    <div class="wrap-input100   col-md-6" data-validate="Last Name is required">
                        <label for="" class="mt-2">Name</label>
                        <input class="input300 form-control " type="text" name="name" value="'.$name.'" placeholder="Name" required oninvalid="this.setCustomValidity(&apos;Name is Required&apos;)" oninput="this.setCustomValidity(&apos;&apos;)">
                        <span class="focus-input100"></span>
                    </div>



                </div>

                <hr class="" />

              
                <div class="form-row ">
                    <div class=" wrap-input100   form-group  ">
                        <label for="cust-type">Status </label>
                        <input class="input300 form-control " type="text" name="status" value="'.$status.'" placeholder="On Stock" required oninvalid="this.setCustomValidity(&apos;Status is required:&apos;)" oninput="this.setCustomValidity(&apos;&apos;)">
                        <span class="focus-input100"></span>
                    </div>
                    


                </div>


                <hr class="" />



                <button type="submit" id="update_emp_submit" name="update_eq_submit" class="btn mt-4  btn-md btn-custom btn-block text-uppercase">
                    Update Equipment
                </button>


            </form>

        </div>


';

            exit();
        } else {

            echo '<div class=" text-center  container-fluid admin_tables"> <table class="table table-hover table-striped table-bordered table-dark ">
                  <tr class="bg-danger">
                      <th colspan="11">There is no Equipment with that Id in database</th>
                  </tr>
          </table></div>';

            exit();
        }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($connect);
}
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

    <script>window.history.replaceState({}, document.title, "/" + "471-Project/maintenance/equipment_update.php");</script> 
</body>
</html>