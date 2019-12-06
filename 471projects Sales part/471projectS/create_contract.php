


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Create contract</title>
</head>
<body>

    <h1 style="text-align:center; color : rebeccapurple; font-size: 80px;"> Create Contract</h1>





    <form style="text-align: center;" action=" includes/create_contract.db.php" method="POST">
        <input style="text-align:center; font-size:50px;" type="text" name="number" placeholder=" number of contract" />
        <br>
        <br>
        <input style="text-align:center; font-size:50px;" type="text" name="start_date" placeholder=" start date of contract" />
        <br>
        <br>
        <input style="text-align:center; font-size:50px;" type="text" name="end_date" placeholder=" end date of contract " />
        <br>
        <br>
        <input style="text-align:center; font-size:50px;" type="text" name="fee" placeholder=" fee of contract" />
        <br>
        <br>
         <input style="text-align:center; font-size:50px;" type="text" name="service_type" placeholder="service type of contract" />
        <br>
        <br>
         <input style="text-align:center; font-size:50px;" type="text" name="num_hours" placeholder=" number of hours of contract" />
        <br>
        <br>
         <input style="text-align:center; font-size:50px;" type="text" name="status" placeholder=" statu of contract" />
        <br>
        <br>       
         <input style="text-align:center; font-size:50px;" type="text" name="C_id" placeholder=" Customer Id for contract" />
        <br>
        <br>
        <button tyep=" submit" name="submit" style="font-size:50px;">CREATE</button>

    </form>
    <br>
    <br>
    <br>
    <br>
    <div style="text-align: center; font-size:50px; font-display:inherit; color:black;">
        <a href="index.php">
            <button style="font-size:60px;">BACK</button>
        </a>
    </div>
</body>
</html>