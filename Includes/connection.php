<?php
$host = "sql312.epizy.com";
$user = "epiz_24152290";
$senha = "VQvmlNUZaZ";
$database = "epiz_24152290_SCINNOB";
$connect = mysqli_connect($host, $user, $senha, $database) or
die("Error to connect.");
mysqli_query($connect, "SET NAMES 'utf8'");
mysqli_query($connect, 'SET character_set_connection=utf8');
mysqli_query($connect, 'SET character_set_client=utf8');
mysqli_query($connect, 'SET character_set_results=utf8');
?>
