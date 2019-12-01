<?php
//    session_start();
//    if(!isset($_SESSION['admin_uId'])) {
//     header('location: index.php?error=NeedtoLoginToseePage');
//     include_once("admin.php");
   
//     exit;
//    }
 
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Admin Page</title>
</head>

<body>
    <h1>Welcome Admin</h1>
    <form action="include/logout_inc.php" method="post">
        <button type="submit" class="btn btn-success">Logout</button>
    </form>
    <?php
               
             
               if (isset($_SESSION['admin_uId'])) {
                       echo '<p>You logged in</p>';
                       
               }
               else {
                   echo '<p>You loged out</p>';
               }
               
           ?>
</body>

</html>