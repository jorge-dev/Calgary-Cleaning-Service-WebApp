<?php
$serverName = "localhost";
$dbUsername = "root";
$dbPassword ="1234";
$dbName = "471db_project";

$connect = mysqli_connect($serverName,$dbUsername, $dbPassword,$dbName);

if (!$connect) {
    die("Connection Failed:".mysqli_connect_error());
}