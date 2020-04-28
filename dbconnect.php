<?php
$serverName = "localhost";
$userName = "root";
$password = "";
$dbName= "LOGIN";

$connect = mysqli_connect($serverName, $userName, $password, $dbName);
if(mysqli_connect_error()):
    echo "Falha na conexão". mysqli_connect_error();
    endif;