<?php
include_once'../Includes/connection.php';


$query = "SELECT id, name, email, message, service FROM scinnob_Contact";
$response = mysqli_query($connect,$query);

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>SCINNOB - ADM</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <p class="text-center">LIST OF CONTACT</p>            
  <table class="table">
    <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
         <th>Service</th>
        <th>Message</th>
        <th>Option</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($response as $key => $value) { ?>
      <tr>
        <td><?php echo $value['id']?></td>
        <td><?php echo $value['name']?></td>
        <td><?php echo $value['email']?></td>
        <td><?php echo $value['service']?>Web</td>
        <td><?php echo $value['message']?></td>
        <th>
          <a href="#" class="btn btn-info btn-lg">
          <span class="glyphicon glyphicon-pencil"></span> Answer
        </a>
        </th>
      </tr>
    <?php }?>
    
    </tbody>
  </table>
</div>

</body>
</html>
