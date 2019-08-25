<?php
include_once'../Includes/connection.php'; 

$error = 0;

if (isset($_POST['create_adm'])) {
  $name = trim(addslashes($_POST['name_adm']));
  $email = trim(addslashes($_POST['email_adm']));
  $username = trim(addslashes($_POST['username_adm']));
  $password = trim(addslashes($_POST['password_adm']));

  if (empty($name)) {
        echo "<script> alert('Please enter your name')</script>";
        $error++;
  } else if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
        echo "<script> alert('Only letters and white space allowed')</script>";
        $error++;
  }

   if (empty($email)) {
        echo "<script> alert('Please Enter your email')</script>";
        $error++;
   }else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<script> alert('Invalid email format')</script>";
        $error++;
  }

  if (empty($username)) {
        echo "<script> alert('Please enter your username')</script>";
        $error++;
  } else if (strlen($username) < 6) {
        echo "<script> alert('Usuário deve conter pelo menos 6 caracteres')</script>";
        $error++;
  }

  if (empty($password)) {
        echo "<script> alert('Please enter a password')</script>";
        $error++;
  }
  else{
    $password = md5($password);
  }

  if ($error == 0) {

      $query = "SELECT email FROM add_adm WHERE email = '$email' OR username = '$username'";
      $resp = mysqli_query($connect, $query);

      if (mysqli_num_rows($resp) > 0) {
          $ans = mysqli_fetch_array($resp);
          if($ans['email'] == $email) {
           echo "<script> alert('Email already existed')</script>";
          }
          else{
            echo "<script> alert('Username already existed')</script>";
          }
      }
      else{
    
        $sql = "INSERT INTO add_adm (name, email, username, password) VALUES ('$name', '$email', '$username', '$password')";
        $res = mysqli_query($connect, $sql);

        if ($res) {
            $mes = "<div class='alert alert-success' role='alert'>
                        Cadastro realizado com sucesso!
                    </div>";
          }
          else{
            $mes = "<div class='alert alert-danger' role='alert'>
                      Sent failed!
                    </div>";
            $mes.= mysqli_error($connect);
          }
      }
  }
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


    <body class="bck_log">
        <div class="container-fluid bg">
        <div class="row">


        <div class="col-md-3 col-sm-3 col-xs-12"></div>
        <div class="col-md-6 col-sm-6 col-xs-12">
                        <?php
                          if (isset($mes)) {
                             echo $mes;
                             header('Location: adm.php');
                          }else{?>
                      
                        <form id="log" action="" method="post" enctype="multipart/form-data">
                        <h1>MJTEC - Add New ADM</h1>
                        <img class="card-img-top img img-responsive" src="img/t4.gif">

                          <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" placeholder="Enter your Name" name="name_adm" value="<?= isset($name)? $name: '';?>">
                          </div>

                          <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" placeholder="Enter your email" name="email_adm" value="<?= isset($email)? $email: '';?>">
                          </div>

                          <div class="form-group">
                            <label>Username</label>
                            <input type="text" class="form-control" placeholder="Enter your Username" name="username_adm" value="<?= isset($username)? $username: '';?>">
                          </div>

                          <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" placeholder="Create your Password" name="password_adm">
                          </div>
                          <button class="btn btn-danger btn-block" type="submit" name="create_adm">Sign Up</button>


                        </form><?php }?>

        </div>


        </div>
        </div>

    </body>
</html>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
 <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
