<?php
session_start();
if (!isset($_SESSION['cust_id'])) {
    header('location: index.php?error=NeedtoLoginToseeAdminPage');
    include_once("customer/customer_view_req.php");

    exit;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="customerStyles.css">
    <title>Admin Page</title>
</head>

<body>

    <nav class="navbar navbar-expand-md navbar-dark fixed-top">
        <a class="navbar-brand font-weight-bold" href="customer.php">
            <h3>Customer</h3>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault"
            aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                <a class="nav-link" href="customer_view_req.php"><h5>View Previous Requests</h5> <span class="sr-only">(current)</span></a>
                </li>


            </ul>
            <form action="../include/logout_inc.php" method="post">
                <button type="submit" class="btn btn-success">Logout</button>
            </form>
        </div>
    </nav>

    <main role="main">
      

    <?php
        $cust_id=$_SESSION['cust_id'];
        require '../include/db_connection_inc.php';
        $sql = "SELECT * from special_res where C_id=? ";

        $stmt = mysqli_stmt_init($connect);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: customer_view_req.php?error=sqlErrorSelectEmp");
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, "i", $cust_id);
            mysqli_stmt_execute($stmt);

            $response = mysqli_stmt_get_result($stmt); 
           
           
                if ($m = mysqli_fetch_assoc($response) ) { 
               echo' <div class=" text-center  container-fluid admin_tables ">
                    <table class="table table-lg table-hover table-striped table-bordered table-dark ">
                    <tr class="bg-success">
                        <th colspan="8" style="font-size:1.8em;font-weight:bold;">Eployee Requests</th>
                    </tr>
                    <tr>
                        <th></th>
                        <th scope="col">Employee Reference Number</th>
                        <th scope="col">Status</th>
                        <th scope="col">Proposed Start Date</th>
                        <th scope="col">proposed End Date</th>
                        <th scope="col">Number Of hours</th>
                        <th scope="col">Reason</th>
                        <th scope="col">Client ID</th>
                       
                       
                    </tr>';
                    mysqli_free_result($response);
                    mysqli_stmt_execute($stmt);

                    $response = mysqli_stmt_get_result($stmt); 
                   
            while($row = mysqli_fetch_assoc($response)){
                       echo '<tr>
                       <td class ="d-flex justify-content-center">  <a  href="../include/delete_custRes_inc.php?deleteRes=' . $cust_id . '" class="btn mt-1 mb-1   btn-md btn-delete btn-block text-uppercase">
                       Delete
                   </a></td>
                            <td>'.$row["number"].'</td>
                            <td>'.$row["status"].'</td>
                            <td>'.$row["start_date"].'</td>
                            <td>'.$row["end_date"].'</td>
                            <td>'.$row["num_hours"].'</td>
                            <td>'.$row["comments"].'</td>
                            <td>'.$row["C_id"].'</td>
                           
                        </tr>';
                   }  
                
                     
                    echo '</table>   </div>';

        
              } else { 
                
                echo '<div class=" text-center  container-fluid admin_tables "> <table class="table table-hover table-striped table-bordered table-dark ">
                
                          <tr class="bg-danger">
                              <th colspan="11">There are no reservation requests</th>
                          </tr>
                  </table>
                  <form action="customer.php" class="d-flex justify-content-center">
                     <button type="submit" id="emp_submit" name="create_emp_submit"
                     class="btn mt-4  btn-md btn-custom btn-block text-uppercase" style="width:400px;">
                     Request a Reservation
                    </button>
                  </form>
                  </div>
                  ';
                    
                }
            }
            mysqli_stmt_close($stmt);
            mysqli_close($connect);
            ?>



    </main>



    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
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
    window.history.replaceState({}, document.title, "/" + "471-Project/customer/customer_view_req.php");
    </script>
</body>

</html>