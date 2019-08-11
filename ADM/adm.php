<?php
include_once'../Includes/connection.php'; 

$sql = "SELECT  id, name, email, message, service FROM scinnob_Contact";
$response = mysqli_query($connect, $sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

 <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>



  <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/animate.css">
  <link rel="stylesheet" href="css/fixed.css">


  <title>SCINNOB - Blog</title>
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
  <a class="navbar-brand text-center" href="#">MJR_TEC</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav ml-auto active">
      <li class="nav-item">
        <a><ion-icon name="add-circle" id="addAdm"></ion-icon></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="www.mjtec.com">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Name of ADM</a>
      </li>
      <li class="nav-item">
        <a><ion-icon name="return-right" id="addAdm"></ion-icon></a>
      </li>
    </ul>
  </div>
</nav>

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
            <th scope="col">OPTION</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($response as $key => $value) {
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
              <td>
                <ion-icon data-toggle="tooltip" name="create" data-placement="right">Answer</ion-icon>
              </td>
            </tr>
          <?php }?>
        </tbody>
      </table>    

</body>
</html>