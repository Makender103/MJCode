<?php
$host = "localhost";
$user = "mjcodene_mjcode";
$senha = "0061995@xp";
$database = "mjcodene_MJcode";
$connect = mysqli_connect($host, $user, $senha, $database) or
die("Error to connect.");
mysqli_query($connect, "SET NAMES 'utf8'");
mysqli_query($connect, 'SET character_set_connection=utf8');
mysqli_query($connect, 'SET character_set_client=utf8');
mysqli_query($connect, 'SET character_set_results=utf8');
?>
