<?php
session_start();
if (!isset($_SESSION['cust_id'])) {
    header('location: ../index.php?error=NeedtoLoginToseeAdminPage');
    include_once("customer/customer.php");

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
                <li class="nav-item ">
                <a class="nav-link" href="customer_view_req.php"><h5>View Previous Requests</h5> <span class="sr-only">(current)</span></a>
                </li>


            </ul>
            <form action="../include/logout_inc.php" method="post">
                <button type="submit" class="btn btn-success">Logout</button>
            </form>
        </div>
    </nav>

    <main role="main">
        <div class="d-flex justify-content-center align-items-center admin_tables">


            <form class=" create_emp_form text-center " id="request" action="../include/request_emp_inc.php"
                method="POST" style="margin-top:20px;">

                <h2 class=" text-uppercase">Request a reservation for an Employee</h2>
                <?php
                     if (@$_GET['error'] == 'EmpHasReserv') {
                        
                        echo ' 
                        <br/>
                        <div class="alert d-flex justify-content-center bg-danger mx-auto alert-dismissible fade show" role="alert">
                            <p class="text-center alert-heading" style ="width:340px;"><strong class="alert-heading">Failed!</strong>  <br/> Employee Request Already Exists.</p>
                            <button type="button" class="pl-0 pr-2 pt-1 close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                       </div>';
                     
                     }

                     if (@$_GET['createReq'] == 'success') {
                        
                        echo ' 
                        <br/>
                        <div class="alert d-flex justify-content-center bg-success mx-auto alert-dismissible fade show" role="alert">
                            <p class="text-center alert-heading" style ="width:340px;"><strong class="alert-heading">Success!</strong>  <br/> Request created succesfully.</p>
                            <button type="button" class="pl-0 pr-2 pt-1 close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                       </div>';
                     
                     }

                     if (@$_GET['deletion'] == 'success') {
                        // header_remove();
                        echo ' 
                         <br/>
                         <div class="alert bg-success mx-auto alert-dismissible fade show" role="alert">
                             <p class="text-center alert-heading" style ="width:340px;"><strong class="alert-heading">Success!</strong>  <br/> Reservation succesfully deleted.</p>
                             <button type="button" class="pl-0 pr-2 pt-1 close" data-dismiss="alert" aria-label="Close">
                             <span aria-hidden="true">&times;</span>
                             </button>
                        </div>';
                     }
                ?>
                <input type="hidden" name="emp_sin">

                <div class=" form-row ">
                    <div class=" wrap-input100 form-group col-md-6">
                        <label for="" class="mt-2">Employee Reference Number</label>
                        <input class="input300 form-control" type="text" name="res_num" placeholder="43455" required
                            maxlength="7" pattern="\d*"
                            oninvalid="this.setCustomValidity(&apos;Reference Number is Required&apos;)"
                            oninput="this.setCustomValidity(&apos;&apos;)">
                        <span class="focus-input100"></span>
                    </div>
                    <div class=" wrap-input100   form-group col-md-6">
                        <label for="" class="mt-2">Number of Hours</label>
                        <input class="input300 form-control" type="text" name="num_hours" placeholder="13" required
                            maxlength="5" pattern="\d*"
                            oninvalid="this.setCustomValidity(&apos;Number of Hours is Required&apos;)"
                            oninput="this.setCustomValidity(&apos;&apos;)">
                        <span class="focus-input100"></span>
                    </div>

                </div>
                <hr class="" />
                <div class="fomr-row">
                    <div class=" wrap-input100   form-group ">
                        <label for="" class="mt-2">Project Start Date<span class="span_format">
                                &nbsp;&nbsp;(YYYY-MM-DD)</span>
                        </label>
                        <input class="input300 form-control" type="text"
                            pattern="(?:19|20)[0-9]{2}-(?:(?:0[1-9]|1[0-2])-(?:0[1-9]|1[0-9]|2[0-9])|(?:(?!02)(?:0[1-9]|1[0-2])-(?:30))|(?:(?:0[13578]|1[02])-31))"
                            name="start_date" placeholder="YYYY-DD-MM" required
                            oninvalid="this.setCustomValidity('Valid Start Date is Required: YYYY-MM-DD')"
                            oninput="this.setCustomValidity('')">
                        <span class="focus-input100"></span>
                    </div>

                    <div class=" wrap-input100   form-group ">
                        <label for="" class="mt-2">Project End Date<span class="span_format">
                                &nbsp;&nbsp;(YYYY-MM-DD)</span>
                        </label>
                        <input class="input300 form-control " type="text"
                            pattern="(?:19|20)[0-9]{2}-(?:(?:0[1-9]|1[0-2])-(?:0[1-9]|1[0-9]|2[0-9])|(?:(?!02)(?:0[1-9]|1[0-2])-(?:30))|(?:(?:0[13578]|1[02])-31))"
                            name="end_date" placeholder="YYYY-DD-MM" required
                            oninvalid="this.setCustomValidity('Valid End Date is Required: YYYY-MM-DD')"
                            oninput="this.setCustomValidity('')">
                        <span class="focus-input100"></span>
                    </div>

                    <div class=" wrap-input100   form-group">
                        <label for="" class="mt-2">Reason for Request<span class="span_format">
                                &nbsp;&nbsp;(YYYY-MM-DD)</span>
                        </label>
                        <textarea class="input300 form-control" rows="4" cols="5" name="reason" form="request"
                            placeholder="Enter text here" required></textarea>
                        <span class="focus-input100"></span>
                    </div>




                </div>



                <hr class="" />



                <button type="submit" id="update_emp_submit" name="request_emp_submit"
                    class="btn mt-4  btn-md btn-custom btn-block text-uppercase">
                    Create Reservation
                </button>


            </form>

        </div>





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
    window.history.replaceState({}, document.title, "/" + "471-Project/customer/customer.php");
    </script>
</body>

</html>