<!-- If Not Logged in, exit -->
<?php
   session_start();
   if(!isset($_SESSION['cleaner_emp_uId'])) {
    header('location: ../index.php?error=NeedtoLoginToseeEmployeePage');
    include_once("cleaner/cleaner.php");

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
    <link rel="stylesheet" type="text/css" href="custom3.css" />
    <title>Create Employee</title>
</head>

<body>

    <nav class="navbar navbar-expand-md navbar-dark fixed-top">
        <a class="navbar-brand font-weight-bold" href="cleaner.php">
            <h3>Cleaner</h3>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault"
            aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item ">
                    <a class="nav-link" href="cleanerJobs.php">
                        <h5>View Jobs</h5> <span class="sr-only">(current)</span>
                    </a>
                </li>
            </ul>

            <form action="../include/logout_inc.php" method="post">
                <button type="submit" class="btn btn-success">Logout</button>
            </form>

        </div>
    </nav>
    <main role="main">

        <!-- Main jumbotron for a primary marketing message or call to action -->
        <div class="jumbotron">
            <div class="container">

                <?php
    $name = $_SESSION['cleaner_emp_name'];


    echo ' <h1 class="display-3 font-weight-bold">Welcome Back ' . $name . '</h1>';
    
    if (@$_GET['updateCon'] == 'success') {
      // header_remove();
      echo ' 
              <br/>
              <div class="alert d-flex justify-content-center bg-success mx-auto alert-dismissible fade show" role="alert">
                  <p class="text-center alert-heading" style ="width:340px;"><strong class="alert-heading">Success!</strong>  <br/> Contract was succesfully updated.</p>
                  <button type="button" class="pl-0 pr-2 pt-1 close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  </button>
             </div>';
  }
  if (@$_GET['deleteCon'] == 'success') {
      // header_remove();
      echo ' 
              <br/>
              <div class="alert d-flex justify-content-center bg-success mx-auto alert-dismissible fade show" role="alert">
                  <p class="text-center alert-heading" style ="width:340px;"><strong class="alert-heading">Success!</strong>  <br/> Contract was succesfully deleted.</p>
                  <button type="button" class="pl-0 pr-2 pt-1 close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  </button>
             </div>';
  }
  if (@$_GET['createCon'] == 'success') {
      // header_remove();
      echo ' 
              <br/>
              <div class="alert d-flex justify-content-center bg-success mx-auto alert-dismissible fade show" role="alert">
                  <p class="text-center alert-heading" style ="width:340px;"><strong class="alert-heading">Success!</strong>  <br/> Contract was succesfully created.</p>
                  <button type="button" class="pl-0 pr-2 pt-1 close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  </button>
             </div>';
  }
    if (@$_GET['createSer'] == 'success') {
      // header_remove();
      echo ' 
              <br/>
              <div class="alert d-flex justify-content-center bg-success mx-auto alert-dismissible fade show" role="alert">
                  <p class="text-center alert-heading" style ="width:340px;"><strong class="alert-heading">Success!</strong>  <br/> Service was succesfully Created.</p>
                  <button type="button" class="pl-0 pr-2 pt-1 close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  </button>
             </div>';
  }

    ?>

                <p>To make changes to any equipment or supplies, use navbar on the top</p>

            </div>
        </div>



    </main>
    <script>
    < script src = "../vendor/jquery/jquery-3.2.1.min.js" >
    </script>
    <!--===============================================================================================-->
    <script src="../vendor/bootstrap/js/popper.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="../vendor/select2/select2.min.js"></script>
    <!--===============================================================================================-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
    <script src="https://kit.fontawesome.com/642ada6dc1.js" crossorigin="anonymous"></script>



    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>

    window.history.replaceState({}, document.title, "/" + "471-Project/cleaner/cleaner.php");
    </script>
</body>

</html>