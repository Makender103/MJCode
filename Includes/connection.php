<?php
$host = "localhost";
$user = "root";
$senha = "root";
$database = "MJCode";
$connect = mysqli_connect($host, $user, $senha, $database) or
die("Error to connect.");
mysqli_query($connect, "SET NAMES 'utf8'");
mysqli_query($connect, 'SET character_set_connection=utf8');
mysqli_query($connect, 'SET character_set_client=utf8');
mysqli_query($connect, 'SET character_set_results=utf8');
?>
