<?php
include_once'../Includes/connection.php'; 
session_start();

$each_page = 8;

$sql = "SELECT  id, name, email, message, service, clock, Cliente_IP FROM mjcode_Contact";
//$sql .= "ORDER BY id DESC";
$response = mysqli_query($connect, $sql);

$number_of_result = mysqli_num_rows($response);
$page_total = ceil($number_of_result / $each_page);

if(!isset($_GET['page'])){
  $i = 1;
}else{
  $i = $_GET['page'];
}
$first_page = ($i - 1) * $each_page;

if(isset($_GET['order']) && isset($_GET['sort'])){
  $ORDER = "ORDER BY {$_GET['order']} {$_GET['sort']}";
}
else{
  $ORDER = "ORDER BY id ASC";
}
$sql = "SELECT  id, name, email, message, service, clock, Cliente_IP FROM mjcode_Contact ".$ORDER." LIMIT " .$first_page. ','.$each_page;

//$sql .= "ORDER BY id DESC";
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

            <th scope="col">ID<a href="?order=id&sort=asc">&and;</a><a href="?order=id&sort=desc">&or;</a></th>
            <th scope="col">NAME<a href="?order=name&sort=asc">&and;</a><a href="?order=name&sort=desc">&or;</a></th>
            <th scope="col">EMAIL<a href="?order=email&sort=asc">&and;</a><a href="?order=email&sort=desc">&or;</a></th>
            <th scope="col">SERVICE<a href="?order=service&sort=asc">&and;</a><a href="?order=service&sort=desc">&or;</a></th>
             <th scope="col">MESSAGE<a href="?order=message&sort=asc">&and;</a><a href="?order=message&sort=desc">&or;</a></th>
             <th scope="col">DATE<a href="?order=clock&sort=asc">&and;</a><a href="?order=clock&sort=desc">&or;</a></th>
             <th scope="col">IP<a href="?order=CLiente_IP&sort=asc">&and;</a><a href="?order=CLiente_IP&sort=desc">&or;</a></th>
            <th scope="col">OPTION</th>
          </tr>
        </thead>
        <tbody>
        <?php if( mysqli_num_rows($res) == 0){
				?>
				<tr>
					<td colspan="8" class="text-center" >
                <div class="alert alert-info">
                    Ther is no Contact
              </div>
        </td>
				</tr>
				<?php	
		  	}else
             while($value = mysqli_fetch_array($res)) {
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
              <td><?= $value['id']?></td>
              <td><?= $value['name']?></td>
              <td><?= $value['email']?></td>
              <td><?= $service ?></td>
              <td><?= $value['message']?></td>
              <td><?= $value['clock']?></td>
              <td><?= $value['Cliente_IP']?></td>
              <td>
                <a href="delete.php?id=<?=$value['id']?>"><button type="button" class="btn btn-danger"  onclick="return deleteConfirm()">Delete</button></a>
              </td>
            </tr>
          <?php }?>
        </tbody>
      </table> 
      <ul class="pagination" id="pagination">
      <?php
          for($i = 1; $i<= $page_total; $i++){
           echo '<li class="page-item"><a class="page-link" href="adm.php?page=' .$i. '">' .$i. '</a></li>';
          }
      ?>  
      </ul> 
      </div>
 <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="js/index.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
</body>
</html>