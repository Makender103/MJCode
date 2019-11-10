
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>::MJcode - ADM</title>
	
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="css/style.css">
</head>

<body>
	<nav class="navbar navbar-inverse">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle pull-left">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#">Administrator</a>
			</div>
			<div class="collapse navbar-collapse">
				<ul class="nav navbar-nav navbar-right">
				<?php
				session_start();
            if(isset($_SESSION['username']) && isset($_SESSION['name'])){
              $variavel = $_SESSION['name'] ;
              $variavel.= "  <a href='logout.php'><ion-icon name='return-right' id='addAdm'></ion-icon></a>";
            }else{
				$variavel = "<a href='logout.php' id='addAdm'>Log In</a>";
			}
       		?>
        <a href="#" id="addAdm"><?=$variavel?></a>&nbsp;&nbsp;&nbsp;&nbsp;
				</ul>
			</div>
		</div>
	</nav>
	<div class="main">
		<div class="menu">
			<ul>
				<li class="active"><a href="#">Panel</a></li>
				<li><a href="addAdm.php">Add Adm</a></li>
				<li><a href="clients.php">Clients</a></li>
				<li><a href="../index.php">Go to site</a></li>
			</ul>
		</div>
		<div class="content">
			<div class="container-fluid">
