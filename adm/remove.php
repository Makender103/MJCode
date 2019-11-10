<?php
require_once '../Includes/connection.php';

if(isset($_GET['id'])){
    if(is_numeric($_GET['id'])){
        $sql = "delete from mjcode_Contact where id = {$_GET['id']}";
				$resultado = mysqli_query($connect, $sql);
				if($resultado){
                    header('location: clients.php');
				}
				else{
					echo "<p>Delete failed</p>";
					echo mysqli_error($connect);
				}
    }else{
        echo "<p>ID not found</p>";
    }
}
else{
    echo "<p>ID not found</p>";
}