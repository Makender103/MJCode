<?php
include_once'../Includes/connection.php'; 
session_start();

$each_page = 8;

$sql = "SELECT  id, name, email, message, service, clock, Cliente_IP FROM mjcode_Contact";
$response = mysqli_query($connect, $sql);

$number_of_result = mysqli_num_rows($response);
$page_total = ceil($number_of_result / $each_page);

if(!isset($_GET['page'])){
  $i = 1;
}else{
  $i = $_GET['page'];
}
$first_page = ($i - 1) * $each_page;
    
    
$sql = "SELECT  id, name, email, message, service, clock, Cliente_IP FROM mjcode_Contact LIMIT " .$first_page. ','.$each_page;
$res = mysqli_query($connect, $sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/animate.css">
  <link rel="stylesheet" href="css/fixed.css">


  <title>MJcode</title>
  <link rel="icon" href="img/logo.png">
  <style type="text/css">
     .nav{padding: 20px; background: yellow;}
     #addAdm{
        font-size: 34px;
    }
  </style>

</head>
<body>


<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand text-center" href="#">MJcode</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav ml-auto active">
      <li class="nav-item">
        <a href="sign_up.php"><ion-icon name="add-circle" id="addAdm"></ion-icon></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="../index.php">Home<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <?php
            if(isset($_SESSION['username']) && isset($_SESSION['name'])){
              $variavel = $_SESSION['name'] ;
              $variavel.="<li class='nav-item'>
                            <a href='logout.php'><ion-icon name='return-right' id='addAdm'></ion-icon></a>
                          </li>";
            }
       ?>
        <a class="nav-link" href="#"><?=$variavel?></a>&nbsp;&nbsp;&nbsp;&nbsp;
      </li>
  
    </ul>
  </div>
</nav>
<div class="container">
          <div>
             <h3 class="text-center">LIST OF CONTACT</h3>
          </div>

        <table class="table">

        <thead class="thead-dark">
          <tr>

            <th scope="col">ID</th>
            <th scope="col">NAME</th>
            <th scope="col">EMAIL</th>
            <th scope="col">SERVICE</th>
             <th scope="col">MESSAGE</th>
             <th scope="col">DATE</th>
             <th scope="col">IP ADDRESS</th>
            <th scope="col">OPTION</th>
          </tr>
        </thead>
        <tbody>
          <?php while($value = mysqli_fetch_array($res)) {
              $service = $value['service'];
              if ($service=='W') {
                  $service = 'Web';
                }
                else if ($service=='M') {
                  $service = 'Mobile';
                }
                else{
                  $service = 'Web And Mobile';
                } 
            ?>
            <tr>
              <td><?php echo $value['id']?></td>
              <td><?php echo $value['name']?></td>
              <td><?php echo $value['email']?></td>
              <td><?= $service ?></td>
              <td><?php echo $value['message']?></td>
              <td><?php echo $value['clock']?></td>
              <td><?php echo $value['Cliente_IP']?></td>
              <td>
                <a href="" id="delete">Delete</a>
              </td>
            </tr>
          <?php }
                // $total_page = "SELECT  COUNT(id) AS total_page FROM mjcode_Contact";
                // $response_page = mysqli_query($connect, $sql);

                // $row_pg = mysqli_fetch_assoc($response_page);
                // //echo $row_pg['total_page'];

             
          ?>
        </tbody>
      </table> 
      <?php
          
          
          for($i = 1; $i<= $page_total; $i++){
            echo '<a href="adm.php?page=' .$i. '">' .$i. '</a>';
          }
     
      ?>   
      </div>
      

 <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="js/index.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
</body>
</html>