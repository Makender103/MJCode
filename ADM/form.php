<?php
  if(isset($_POST['login'])){
    $user = $_POST['username'];
    $pswd = $_POST['passwoerd'];

    echo testes;exit;

}


?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="bootstrap-4.1.3-dist/css/bootstrap.min.css">

	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="css/fixed.css">


	<title>MJTECH - ADM login Form</title>
	<link rel="icon" href="img/logo.png">


</head>


    <body>
        <div class="container-fluid bg">
        <div class="row">
          <div class="col md-4 col-sm-4 col-xs-12"></div>
          <div class="col md-4 col-sm-4 col-xs-12">


              <form id="log">
              <h1>MJTEC-ADM</h1>
              <img class="card-img-top img img-responsive" src="img/t4.gif">

                <div class="form-group">
                  <label>Username</label>
                  <input type="text" class="form-control" placeholder="Enter your Username" name="username">
                </div>

                <div class="form-group">
                  <label>Password</label>
                  <input type="password" class="form-control" placeholder="Enter your Password" name="password">
                </div>
                <button class="btn btn-danger btn-block" type="submit" name="login">Login</button>


              </form>
          </div>

        <div class="col md-4 col-sm-4 col-xs-12"></div>

        </div>
        </div>

    </body>
</html>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
 <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
