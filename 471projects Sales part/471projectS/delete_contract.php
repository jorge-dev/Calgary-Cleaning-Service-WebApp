
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Delete Contract</title>
</head>
<body>

    <h1 style="text-align:center; color : rebeccapurple; font-size: 80px;"> Delete Contract</h1>





    <form style="text-align: center;" action=" includes/delete_contract.db.php" method="POST">
        <input style="text-align:center; font-size:50px;" type="text" name="number" placeholder=" number of contract" />
        <br>
        <br>
        <br>
        <br>
        <button tyep=" submit" name="submit" style=" text-align:center; font-size:50px;">DELETE</button>

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