<?php
include_once'Includes/connection.php';
include_once'Includes/header.php';
$Count_NameErr = $Count_emailErr = $CountMessErr = 0;

if (isset($_POST['Send'])) {

    $name = trim(addslashes($_POST['name']));
    $email = trim(addslashes($_POST['email']));
    $message = trim(addslashes($_POST['message']));
    $service = (trim(addslashes($_POST['service'])))? trim(addslashes($_POST['service'])):'B';
    $date = date("Y-m-d h:i:s");

    if (empty($name)) {
        $NameErr = 'Please enter your name';
        $Count_NameErr++;
    } else if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
        $NameErr = 'Only letters and white space allowed';
        $Count_NameErr++;
    }

    if (empty($email)) {
        $emailErr = 'Please Enter your email';
        $Count_emailErr++;
    }
    else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErr = 'Invalid email format';
        $Count_emailErr++;
    }

    if(empty($message)) {
        $messErr = 'Please write your message';
        $CountMessErr++;
    }

    if($CountMessErr == 0 && $Count_emailErr == 0 && $Count_NameErr == 0){
        $query = "INSERT INTO mjtech_Contact(name, email, message, service, clock) VALUES ('$name','$email', '$message','$service', '$date')";
        $res = mysqli_query($connect, $query);
        if ($res) {
        	$mes = "<div class='alert alert-success' role='alert' id='Status_mes'>
  							Sent with success!
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

?>

<body data-spy="scroll" data-target="navbarResponsive">

  <!--__________Preloader__________-->
    <div class="loader-wrapper">
    <div class="loader">
      <span></span>
      <span>MJTEC</span>
      <span></span>
    </div>
    </div>


<!--Home section-->
<div id="home">
	<!--Navigation-->
	<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
  <a class="navbar-brand" href="#"><img src="img/logo.png">MJ_Tech</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse"
	 data-target="#navbarResponsive" >
    <span class="navbar-toggler-icon"></span>
  </button>
		<div class="collapse navbar-collapse" id="navbarResponsive">
			<ul class="navbar-nav ml-auto active">

				<li class="nav-item">
					<a class="nav-link" href="#home">home</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#about">About</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#project">Project</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#ourteam">Our Team</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#service">Service</a>
				</li>
					<li class="nav-item">
						<a class="nav-link" href="#contact">Contact us</a>
					</li>
			</ul>
		</div>
	</nav>
	<!--End Navbar-->

	<!--Landing page-->
				<!--carousel=========-->
				<div id="slides" class="carousel slide" data-ride="carousel">
				  <ol class="carousel-indicators">
				    <li data-target="#slides" data-slide-to="0" class="active"></li>
				    <li data-target="slides" data-slide-to="1"></li>
				    <li data-target="#slides" data-slide-to="2"></li>
				  </ol>
				  <div class="carousel-inner">
				    <div class="carousel-item active">
				      <img src="img/slide.jpg" class="d-block w-100" alt="...">
							<div class="carousel-caption">
								<h1 class="display-2 animated bounceInRight" style="animation-delay:1s">
									<span>MJ_</span>TECH</h1>
								<h3 class="animated bounceInLeft" style="animation-delay:2s">The Technology that simplifies your life</h3>
								<a href="#service">
									<button type="button" class="btn btn-outline-light btn-lg animated zoomIn"
									style="animation-delay:1s">Our Service
								</button></a>
								<a href="#contact"><button type="button" class="btn btn-danger btn-lg animated zoomIn"
									style="animation-delay:2s">Contact US
								</button></a>
							</div>
				    </div>
				    <div class="carousel-item">
				      <img src="img/slide4.jpg" class="d-block w-100" alt="">
							<div class="carousel-caption">
								<h1 class="display-2 animated slideInDown" style="animation-delay:1s"><span>
									We're</span> Creative</h1>
								<h3 class=" animated fadeInUp" style="animation-delay:2s"><em>Web Design and Development</em></h3>
								<a href="#contact"><button type="button" class="btn btn-danger btn-lg animated zoomIn"
									style="animation-delay:3s">Contact US
								</button></a>
							</div>
				    </div>
				    <div class="carousel-item">
				      <img src="img/slide3.jpg" class="d-block w-100" alt="...">
							<div class="carousel-caption">
								<h1 class="display-2 animated zoomIn" style="animation-delay:1s">here  <span>for you</span></h1>
								<h3 class="animated fadeInLeft" style="animation-delay:2s">Web Design and Development</h3>
								<a href="#service
								"><button type="button" class="btn btn-outline-light btn-lg animated bounceInLeft" style="animation-delay:3s">Our Service
								</button></a>

							</div>
				    </div>
				  </div>
				  <a class="carousel-control-prev" href="#slides" role="button" data-slide="prev">
				    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
				    <span class="sr-only">Previous</span>
				  </a>
				  <a class="carousel-control-next" href="#slides" role="button" data-slide="next">
				    <span class="carousel-control-next-icon" aria-hidden="true"></span>
				    <span class="sr-only">Next</span>
				  </a>
				</div>


<!--==== About Section ====-->
<section id="about" class="py-5" class="offset ">
<div class="row">
<div class="col-md-8 my-4 animated fadeInUp" style="animation-delay:1s" >
			<h1 class=" display-3" >Intro</h1>
			<h5 class="text-muted" >MJ_tech specializes in Web development and mobile applications,
															customized and tailored to your needs.

													<p>we work with individuals, small businesses with projects that they want to "implement/update/add " or just refactor for a better architecture. we also work with teams that want someone with our skills.</p> </h5>
				  <a class="btn btn-secondary my-4 text-capitalize pull-right" data-aos="fade-up"
			 data-aos-duration="800" data-aos-offset="300" href="#about" target="">learn more</a>
</div>

		<div class="col-md-4 about-pictures my-4 d-none d-lg-block" class="offset" data-aos="zoom-out-up"
		data-aos-duration="300" data-aos-offset="300">
			<img src="img/img1.jpg" alt="" class="img-1 img-thumbnail about-image">
			<img src="img/img2.jpg" alt="" class="img-2 img-thumbnail about-image">
			<img src="img/img3.jpg" alt="" class="img-3 img-thumbnail about-image">
			<img src="img/img4.jpeg" alt="" class="img-4 img-thumbnail about-image">
			<img src="img/img5.jpeg" alt="" class="img-5 img-thumbnail about-image">

		</div>
</div>


</section>


<!-- Counter up section-->
<section data-aos="fade-up-right">

	<div id="teampage" class="offset midde ">
	<div class="fixed-background">
		<div class="row dark text-center">

			<div class="col-12">
				<h3 class="heading">OUR STATS</h3>
				<div class="heading-underline"></div>
			</div>
				        <div class="col">
				         <i class="fas fa-briefcase fa-3x facount"></i>
				          <div class="num">1246</div>
				          <span>Projetos desenvolvidos</span>
				        </div>

				        <div class="col">
				         <i class="fa fa-certificate fa-3x facount"></i>
				          <div class="num">2</div>
				          <span>Anos de experiencia</span>
				        </div>

				        <div class="col">
				          <i class="fa fa-users fa-3x facount"></i>
				          <div class="num">687</div>
				          <span>Clientes Satisfeitos</span>
				        </div>
				      </div>
				    </div>
				  </div>
				 </section>


  <script type="text/javascript">
    $(".num").counterUp({delay:10,time:1000});
  </script>



<!-- Project section -->
<section id="project" class="offset">
<div class="container-fluid">
<div class="row" >
		<div class="col-12">
			<h3 class="heading text-center">Our expertise</h3>
			<div class="heading-underline"></div>
		</div>

		<div class="col-md-4" data-aos="flip-left"
		     data-aos-easing="ease-out-cubic"
		     data-aos-duration="1000" data-aos-offset="300">
		<div class="box">
			<div class="imgBox">
				<img src="img/b1.jpg" class="img-responsive">
			</div>

			<div class="content">
				<h3>Web development</h3>
				<p>We develop iOS and Android apps</p>
				<a href="#" class="btn btn-info btnD">Read More </a>

			</div>

		</div>
		</div>

		<div class="col-md-4" data-aos="flip-left"
		     data-aos-easing="ease-out-cubic"
		     data-aos-duration="1000" data-aos-offset="300">
		<div class="box">
			<div class="imgBox">
				<img src="img/b2.jpg" class="img-responsive">
			</div>

			<div class="content">
				<h3>Mobile App</h3>
				<p>To better manage your daily business</p>
				<a href="#" class="btn btn-info btnD">Read More </a>

			</div>

		</div>
		</div>

		<div class="col-md-4" data-aos="flip-left"
		     data-aos-easing="ease-out-cubic"
		     data-aos-duration="1000" data-aos-offset="300">
		<div class="box">
			<div class="imgBox">
				<img src="img/img3.jpg">
			</div>

			<div class="content">
				<h3>web hosting</h3>
				<p>We ensure the putting on line and the availability of your site</p>
				<a href="#" class="btn btn-info btnD">Read More </a>

			</div>

		</div>
		</div>


</div>
</div>
</section>

	<!--======Jumbotron======-->

<section class="offset">
			<div class="row text-center">

				<div class="col-md-4">
					<div class="feature">
						<i class="fa fa-play-circle fa-4x" data-fa-transform=
						"shrink-3 up-5"></i>
						<h3>Animation section</h3>
						<p>n sait depuis longtemps que travailler avec du texte
							lisible et co
						</p>
					</div>
				</div>

				<div class="col-md-4">
					<div class="feature">
						<i class="fa fa-sliders-h fa-4x" data-fa-transform=
						"shrink-4.5 up-4.5"></i>
						<h3> slider Section</h3>
						<p>n sait depuis longtemps que travailler avec du texte
							lisible et co
						</p>
					</div>
				</div>

				<div class="col-md-4">
					<div class="feature">
						<i class="fab fa-wpforms fa-4x" data-fa-transform=
						"shrink-3 up-5"></i>
						<h3>contact form</h3>
						<p>n sait depuis longtemps que travailler avec du texte
							lisible et co
						</p>
					</div>
				</div>


			</div>
</section>



<!--team  Section-->
<div id="ourteam" class="offset">
	<div class="fixed-background">
		<div class="row dark text-center">

			<div class="col-12">
				<h3 class="heading">The MJ_TECH LEAD</h3>
				<div class="heading-underline"></div>
			</div>
			<!--Cards-->
<div class="container-fluid padding">
<div class="row padding"  data-aos-offset="150">

	<div class="col-md-6" id="bor" data-aos="zoom-out-up" data-aos="fade-left"
     data-aos-duration="1000" >
	<div class="car">
			<img class="card-img-top" src="img/lateam.jpg">
			<div class="card-body">
				<h4 class="card-title text-center">Marc-kender</h4>


				<button type="button" class="btn btn-danger pull-left" data-toggle="modal" data-target="#marc">
					 	Profile
				</button>
			</div>
	</div>
	</div>
		<!-- Modal -->
<div class="modal fade" id="marc" tabindex="-1" role="dialog" aria-labelledby="marc" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered" role="document">
<div class="modal-content">
	<div class="modal-header">
		<h5 class="modal-title" id="exampleModalCenterTitle">Marc-kender R. Jean-Charles</h5>
		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
	</div>

	<div class="modal-body">
		 <p class="card-text"> Marc is a student in Computer Science,
					he is a <b>front-end</b> devlopper.</p>
	</div>
	<!--Social modal-->
	<div class="mo-footer">

	<div class="col-12 container-fluid social-footer m-footer">
		<div class="heading-underline"></div>
		<a href="https://www.linkedin.com/in/marc-kender-romel-jean-charles-bb1b35175/" target="_blank"> <i class='fab fa-linkedin' style='font-size:40px;color:#007dbb'></i></a>
		<a href="https://github.com/Makender103" target="_blank"><i class='fab fa-github' style='font-size:40px;color:black'></i></a>

	</div>
	</div>

	<div class="modal-footer">
		<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
	</div>

</div>
</div>
</div>

	<div class="col-md-6" data-aos="fade-down"
     data-aos-duration="1000">
	<div class="car">
			<img class="card-img-top" src="img/jod.jpg" >
			<div class="card-body">
				<h4 class="card-title text-center">Jod Fedlet</h4>

				<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#jod">
					 Profile
				</button>
			</div>
	</div>
	</div>
	<!-- Modal -->
<div class="modal fade" id="jod" tabindex="-1" role="dialog" aria-labelledby="jod" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered" role="document">
<div class="modal-content">
	<div class="modal-header">
		<h5 class="modal-title" id="exampleModalCenterTitle">ING. Jod Fedlet</h5>
		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
	</div>
	<div class="modal-body">
		<p class="card-text"> ..... student in Computer Science, Data Scientist,
								 Back-End Developper and software Engineer .........</p>
	</div>

	<div class="mo-footer">

	<div class="col-12 container-fluid social-footer m-footer">
		<div class="heading-underline"></div>
		<a href="https://www.linkedin.com/in/jod-fedlet-pierre-b6ab56152/" target="_blank"> <i class='fab fa-linkedin' style='font-size:40px;color:#007dbb'></i></a>
		<a href="https://github.com/jodfedlet" target="_blank"><i class='fab fa-github' style='font-size:40px;color:black'></i></a>

	</div>
	</div>

	<div class="modal-footer">
		<button type="button" class="btn btn-danger " data-dismiss="modal">Close</button>
	</div>
</div>
</div>
</div>


</div>
</div>


			<div class="fixed-wrap"><!--landing-->
				<div class="fixed">
				</div>
			</div>

	</div>
</div>
<!--end-->

<!--clients Section-->

<!--end-->

<!--Service Section-->
<div id="service" class="offset">
<div class="jumbotron">	<!--jumbotron-->
		<div class="col-12 text-center">
			<h3 class="heading">Our Services</h3>
			<div class="heading-underline"> </div>
		</div>

			<div class="row">
				<div class="col-md-4" data-aos="fade-right"
				     data-aos-offset="300" data-aos-duration="1000"
				     data-aos-easing="ease-in-sine">
				<div class="single-service">

							<div class="service-bg service-bg-1">
								<h2>Web Design</h2>
							</div>


				</div>
				</div>

				<div class="col-md-4" data-aos="fade-up"
     data-aos-duration="1000"  data-aos-easing="ease-in-sine
		 " data-aos-offset="300">
				<div class="single-service">

							<div class="service-bg service-bg-2">
								<h2>Web Development</h2>
							</div>

				</div>
				</div>

				<div class="col-md-4" data-aos="fade-right"
				     data-aos-offset="300"
				     data-aos-duration="1000">
				<div class="single-service">

							<div class="service-bg service-bg-3">
								<h2>Mobile Dev</h2>
							</div>


				</div>
				</div>

			</div>





</div>
</div> <!-- // Jumbotron-->

		<div  class="col-12 narrow text-center" data-aos="flip-left"
		     data-aos-easing="ease-out-cubic"
		     data-aos-duration="1000" data-aos-offset="300">
			<p class="lead">On sait depuis longtemps que travailler avec du texte lisible </p>
			<a class="btn btn-secondary btn-md" href="#contact">Work with us</a>
		</div>


</div>
<!--end-->

<!--=====Contact===-->
<div id="contact" class="offset fixed-b">
	<div class="fixed-background">
		<div class="dark text-center">

			<div class="col-12">
				<h3 class="heading">how can we help u ?</h3>
				<div class="heading-underline"></div>
			</div>
			<!--contact form-->
	<div class="container contact_form">
		<?php 
					if (isset($mes)) {
						echo $mes;
					}
					else{
				?>
	<div class="row">
			<div class="col-lg-6">
				<form action="" method="post" enctype="multipart/form-data">

						<i class="fa fa-phone fa-2x fa-fw" aria-hidden="true"></i>
						<h4>+(55) 49 ... ... ...</h4>
							<div class="tex-form">
								<input type="text" class="form-control" placeholder="Your Name" name="name" value="<?php isset($_POST['name'])? $_POST['name']: '' ?>">
								<span class="span">
                                    <?php
                                        if($Count_NameErr > 0) {
                                            echo $NameErr;
                                        }
								    ?>
                                </span><br><br>
                                <input type="email" class="form-control" placeholder="Enter Your Email" name="email" value="<?php isset($_POST['email'])? $_POST['email']: '' ?>">
                                <span class="span">
                                    <?php
                                    if($Count_emailErr > 0) {
                                        echo $emailErr;
                                    }

                                    ?>
                                </span><br>
							</div>

						<div class="checkbox">
								<div class="radio"  >
									<label>
										<input type="radio" name="service"  value="W">     Web<br>
									</label>

									<label>
										<input type="radio" name="service"  value="M">    Mobile<br>
									</label>

									<label>
										<input type="radio" name="service"  value="B" checked="">    Both
									</label>
								</div>
						</div>

			</div>


			<div class="col-lg-6">
				<i class="fas fa-envelope fa-2x fa-fw" aria-hidden="true"></i>
				<h4>admin@mj_tech.com</h4>
				<div class="form-group">
					 <textarea class="form-control" rows="5" placeholder="share your project with us" name="message" value="<?php isset($_POST['message'])? $_POST['message']: '' ?>"></textarea>
                    <span class="span">
                                    <?php
                                    if($CountMessErr > 0) {
                                        echo $messErr;
                                    }

                                    ?>
                                </span><br>
                </div>
				<input type="submit" class="btn btn-success pull-right" name="Send"></br>

			</div>




			<div class="fixed-wrap"><!--landing-->
				<div class="fixed-b">
				</div>
			</div>

	</div>
</div>
</form><?php }?>

	<div class="col-12">
		<h3 class="heading">From Social Media</h3>
		<div class="heading-underline"></div>
	</div>

	<div class="container-fluid padding">
	<div class="row text-center padding">
	<div class="col-12 social padding">
		<a href="#" target="_blank"><i class="fab fa-facebook-square"></i></a>
		<a href="#" target="_blank"><i class="fab fa-twitter-square"></i></a>
		<a href="#" target="_blank"><i class="fab fa-instagram"></i></a>
		<a href="#" target="_blank"><i class="fab fa-youtube"></i></a>

	</div>
	</div>
	</div>


</div>
</div>
</div>

<!--end-->


<!--footer-->
<footer>
<div class="row justify-content-center">
	<hr class="socket">
</div>
<div class="row justify-content-center">
	<small>Copyright &copy 2018.
			 All Rights Reserved.</small>

</div>
</footer>

<!--- Script Source Files -->
<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/index.js"></script>
<script src="bootstrap-4.1.3-dist/js/bootstrap.min.js"></script>
<script src="https://use.fontawesome.com/releases/v5.5.0/js/all.js"></script>
</body>
</html>
