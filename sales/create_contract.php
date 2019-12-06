<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="custom4.css" />
    <title>Create contract</title>
</head>

<body>


<nav class="navbar navbar-expand-md navbar-dark fixed-top">
    <a class="navbar-brand font-weight-bold" href="sales.php">
      <h3>Sales</h3>
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item ">
          <a class="nav-link" href="create_service.php">
            <h5>Create Service</h5> <span class="sr-only">(current)</span>
          </a>
        </li>
        <li class="nav-item ">
          <a class="nav-link text-success" href="create_contract.php">
            <h5>Create Contract</h5> <span class="sr-only">(current)</span>
          </a>
        </li>

        <li class="nav-item ">
          <a class="nav-link " href="list_all_contract.php">
            <h5>View Contracts</h5> <span class="sr-only">(current)</span>
          </a>
        </li>
        <li class="nav-item ">
          <a class="nav-link" href="update_contract_status.php">
            <h5>Update Contract Status</h5> <span class="sr-only">(current)</span>
          </a>
        </li>
        <li class="nav-item ">
          <a class="nav-link" href="delete_contract.php">
            <h5>Delete Contract</h5> <span class="sr-only">(current)</span>
          </a>
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
        
        $sql = "SELECT * from customers ";

        $stmt = mysqli_stmt_init($connect);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: create_contract?error=sqlErrorSelectEmp");
            exit();
        } else {

            mysqli_stmt_execute($stmt);

            $response = mysqli_stmt_get_result($stmt); 
           
           
                if ($m = mysqli_fetch_assoc($response) ) { 
               echo' <div class=" text-center  container-fluid admin_tables ">
                    <table class="table table-lg table-hover table-striped table-bordered table-dark ">
                    <tr class="bg-success">
                        <th colspan="11" style="font-size:1.8em;font-weight:bold;">List of existing Customers ID</th>
                    </tr>
                    <tr>
                        <th scope="col">Customer Ids</th>
                      
                       
                    </tr>';
                    mysqli_free_result($response);
                    mysqli_stmt_execute($stmt);

                    $response = mysqli_stmt_get_result($stmt); 
                   
            while($row = mysqli_fetch_assoc($response)){
                       echo '<tr>
                            <td>'.$row["ID"].'</td>
                           
                        </tr>';
                   }  
                
                     
                    echo '</table>   </div>';

        
              } else { 
                
                echo '<div class=" text-center  container-fluid admin_tables"> <table class="table table-hover table-striped table-bordered table-dark ">
                          <tr class="bg-danger">
                              <th colspan="11">There are no Admin Employees Customers in database!</th>
                          </tr>
                  </table></div>';
                    
                }
            }
            mysqli_stmt_close($stmt);
            mysqli_close($connect);
            ?>


</main>
   





    <div class="d-flex justify-content-center align-items-center ">
        <form action=" ../include/create_contract.db.php" class="create_emp_form  bg-dark pr-3 pl-4 pb-4 pt-4 pb-4 text-center" method="POST">
            <h1 class="d-flex justify-content-center mb-3 ">Create Contract</h1>
            <label for="" class="mt-2">Start Date</label>
            <input class="input300 form-control" type="text" name="start_date" placeholder=" start date of contract" />

            <label for="" class="mt-2">End Date</label>
            <input class="input300 form-control" type="text" name="end_date" placeholder=" end date of contract " />


            <label for="" class="mt-2">Cost</label>
            <input class="input300 form-control" type="text" name="fee" placeholder=" fee of contract" />

            <label for="" class="mt-2">Service type</label>
            <input class="input300 form-control" type="text" name="service_type" placeholder="service type of contract" />

            <label for="" class="mt-2">Number of Hours</label>
            <input class="input300 form-control" type="text" name="num_hours" placeholder=" number of hours of contract" />

            <label for="" class="mt-2">Status</label>
            <input class="input300 form-control" type="text" name="status" placeholder=" status of contract" />


            <label for="" class="mt-2">Existent Csutomer Id</label>
            <input class="input300 form-control" type="text" name="C_id" placeholder=" Customer Id for contract" />
            <hr />
            <button type="submit" id="emp_submit" name="create_con" class="btn mt-3 mb-3  btn-md btn-custom btn-block text-uppercase">
                Create
            </button>
            <div style="text-align: center; font-size:50px; font-display:inherit; color:black;">
            <a href="index.php">
                <button style="font-size:60px;">BACK</button>
            </a>
        </div>
        </form>
       
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
        window.history.replaceState({}, document.title, "/" + "471-Project/sales/create_contract.php");
    </script>
</body>

</html>