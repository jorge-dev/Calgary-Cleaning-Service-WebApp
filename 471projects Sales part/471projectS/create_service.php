



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>create service</title>
</head>
<body>

    <h1 style="text-align:center; color : rebeccapurple; font-size: 80px;"> Create service</h1>





    <form style="text-align: center;" action=" includes/create_service.db.php" method="POST">
        
        <input style="text-align:center; font-size:50px;" type="text" name="type" placeholder=" type of service" />
        <br>
        <br>
        <input style="text-align:center; font-size:50px;" type="text" name="name" placeholder=" name of service" />
        <br>
        <br>
        <input style="text-align:center; font-size:50px;" type="text" name="status" placeholder=" status of service " />
        <br>
        <br>
        <input style="text-align:center; font-size:50px;" type="text" name="D_num" placeholder=" D_num of service" />
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