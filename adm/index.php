<?php
include 'adm-head.php';
include_once'../Includes/connection.php';

  if(isset($_POST['login'])){
    $user = $_POST['username'];
    $pswd = $_POST['password'];

    if (empty($pswd) || empty($user)) {
       echo "<script>alert('Please, fill the blank space')</script>";
    }
    else{
      $pswd = md5($pswd);
     $sql = "SELECT name, email, username, password FROM add_adm WHERE username = '$user' AND  password = '$pswd'";
      $res = mysqli_query($connect, $sql);
      if (mysqli_num_rows($res)  == 0) {
          echo "<script>alert('Login not found')</script>";
          header("Location: index.php");
      }
      else{
        $row = mysqli_fetch_array($res);
        if ($row['password'] == $pswd) {
          session_start();
          $_SESSION['username'] = $user;
          $_SESSION['name'] = $row['name'];
          $_SESSION['password'] = $row['password'];
          header('Location: adm.php');
        }
      }
    }
    
  }

?>

        <div class="container-fluid bg">
        <div class="row">
          <div class="col md-4 col-sm-4 col-xs-12"></div>
          <div class="col md-4 col-sm-4 col-xs-12">
              <form id="log" action="" method="post" enctype="multipart/form-data">
              <h1 class="text-center">Log In</h1>
                <div class="form-group">
                  <label>Username</label>
                  <input type="text" class="form-control" placeholder="Enter your Username" name="username">
                </div>

                <div class="form-group">
                  <label>Password</label>
                  <input type="password" class="form-control" placeholder="Enter your Password" name="password">
                </div>
                <button class="btn btn-success btn-block" type="submit" name="login">Login</button>


              </form>
          </div>

        <div class="col md-4 col-sm-4 col-xs-12"></div>

        </div>
        </div>

