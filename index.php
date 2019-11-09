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
        $query = "INSERT INTO mjcode_Contact(name, email, message, service, clock) VALUES ('$name','$email', '$message','$service', '$date')";
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
      <span></span>
      <span></span>
    </div>
    </div>


<!--Home section-->
<div id="home">
	<!--Navigation-->
	<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
  <a class="navbar-brand" href="index.php"><img src="img/logom.png"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse"
	 data-target="#navbarResponsive" >
    <span class="navbar-toggler-icon"></span>
  </button>
		<div class="collapse navbar-collapse" id="navbarResponsive">
			<ul class="navbar-nav ml-auto active">

				<li class="nav-item">
					<a class="nav-link" href="index.php">Home</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#about">About us</a>
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
						<a class="nav-link" href="#contact">Contact Us</a>
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
				      <img src="img/slide.jpg" class="d-block w-100" alt="slide 1">
							<div class="carousel-caption">
								<h1 class="display-2 line anim-typewriter">
									<span>MJ</span>code</h1>
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
								<h1 class="display-2 animated zoomIn" style="animation-delay:1s">Here  <span>For you</span></h1>
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
			<h5 class="text-muted" >MJCode specializes in Web development and mobile applications,
															customized and tailored to your needs.

													<p>50e work with individuals, small businesses with projects that they want to "implement/update/add " or just refactor for a better architecture. we also work with teams that want someone with our skills.</p> </h5>
				  <a class="btn btn-secondary my-4 text-capitalize pull-right" href="#about" target="">learn more</a>
</div>

		<div class="col-md-4 offset " data-aos="zoom-out-up"
		data-aos-duration="300" data-aos-offset="300">
			<img src="img/logheader.png"  class="img-1 about-image">

		</div>
</div>


</section>

<!--Service Section-->
<div id="service" class="offset ">
<div class=" row service-section">	<!--jumbotron-->
		<div class="col-md-12 text-center">
			<h3 class="heading head">Our Services</h3>
			<div class="heading-underline"></div>
		</div>

		<a href="service.html#Web"><div class="card mb-6 col-md-6">
              <div class="row no-gutters">
                <div class="col-md-4">
				<i class="fas fa-laptop-code img-responsive text-center"></i>
				</div>
				
                <div class="col-md-8">
                  <div class="card-body">
                    <h5>Website Creation</h5>
                    <p class="card-text">
					You may not be a web designer, 
					that´s where MJcode come in. We facilitate the process 
					of creating a website, making it accessible to everyone. 
					you can easily launch a professional website.
					</p>
                  </div>
                </div>
              </div></a>
			</div>


				<a href="service.html#App"><div class="col-md-6 card mb-6">
              <div class="row no-gutters">
                <div class="col-md-4">
				<i class="fas fa-tv img-responsive"></i>
                </div>
                <div class="col-md-8">
                  <div class="card-body">
                    <h5>Dekstop App</h5>
                    <p class="card-text">
					You may not be a Programer
					that´s where MJcode come in. We facilitate the process 
					of creating your Dekstop APP, making it accessible to everyone. 
				
					</p>
                  </div>
                </div>
              </div></a>
			</div>


			<a href="service.html#mobile"><div class="col-md-6 card mb-6">
              <div class="row no-gutters">
                <div class="col-md-4">
				<i class="fas fa-mobile-alt img-responsive"></i>
                </div>
                <div class="col-md-8">
                  <div class="card-body">
                    <h5>Mobile App</h5>
                    <p>
						We facilitate the process 
					of creating a Mobile APP, making it accessible to everyone. 
					</p>
                  </div>
                </div>
              </div></a>
			</div>


			<a href="#"><div class="col-md-6 card mb-6">
              <div class="row no-gutters">
                <div class="col-md-4">
				<i class="fas fa-chalkboard-teacher"></i>
                </div>
                <div class="col-md-8">
                  <div class="card-body">
                    <h5>Personal Blog</h5>
                    <p class="card-text">
					You may not be a web designer or a programer, 
					that´s where MJcode come in. We facilitate the process 
					of creating Personal Blog, making it accessible to everyone. 
					you can easily launch a personal Blog.
					</p>
                  </div>
                </div>
              </div> </a>
			</div>



		
</div>
</div>

		<!--service section -->
		


	<!--======Jumbotron======-->

<section class="offset"  >
			<div class="row text-center ">

					<div  class="col-12 narrow text-center" >
					<a class="btn btn-secondary btn-md" href="#contact">Hire us</a>
					</div>



			</div>
</section>



<!--team  Section-->
<div id="ourteam" class="offset">
	<div class="ourteam">
		<div class="row dark text-center">

			<div class="col-12">
				<h3 class="heading">The MJcode Lead</h3>
				<div class="heading-underline"></div>
			</div>
			<!--Cards-->
<div class="container-fluid padding">
<div class="row padding"  data-aos-offset="150">

	<div class="col-sm-6" id="bor" data-aos="zoom-out-up" data-aos="fade"
     data-aos-duration="1000" >
	<div class="car">
			<img class="card-img-top img-responsive" src="img/marck.png">
			<div class="card-body">
				<h4 class="card-title text-center">Marc-kender</h4>


				<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#marc">
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
			<img class="card-img-top img-responsive" src="img/jodmj.png" >
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
				<h3 class="text-center">Web development</h3>
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


</div>
</div> <!-- // Jumbotron-->

		<div  class="col-12 narrow text-center" data-aos="flip-left"
		     data-aos-easing="ease-out-cubic"
		     data-aos-duration="1000" data-aos-offset="300">
			<p class="lead"></p>
			<a class="btn btn-secondary btn-md" href="#contact">Work with us</a>
		</div>


</div>
<!--end-->

<!--=====Contact===-->
<div id="contact" class="offset fixed-b">
	<div class="fixed-background">
		<div class="dark text-center">

		<div class="col-12">
				<h3 class="heading"> Where to find us?</h3>
                <div class="heading-underline"></div>
                <p class="heading-title">Space Reserved for you to contact us</p>
        </div>

        <div class="row">

            <div class="col-xs-12 col-sm-4 col-md-4">
            <a href="#"><div class="contact-box">

            <div class="box-icon">
                <img src="img/icon-perso.png" alt="">
            </div>

            <h3>
                <a href="#" title="Orçamento de site" data-toggle="modal" data-target="#Orçamento-Modal"><b>Website Budget</b></a>
                
            </h3>
            <span class="cont-text">Contact us to request 
                                        your <b>site</b> budget</span>
            </div>
			</div>
			
			<!-- MOdal budget -->

			<!-- Modal -->
<div class="modal fade" id="Orçamento-Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Faça o seu Orçamento</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>


            <div class="col-xs-12 col-sm-4 col-md-4">
            <a href="#"><div class="contact-box">

            <div class="box-icon">
                <img src="img/contato-icone.png" alt="">
            </div>

            <h3>
                <a href="#" title="Orçamento de site" target="_blank"><b>Contact</b></a>
                
            </h3>
            <span class="cont-text">
                    <b>Commercial:</b>
                    <i class="fa fa-whatsapp" style="margin-right:2px;"></i>
                    <a href="https://api.whatsapp.com/send?phone=5549988859041&text=sua%20mensagem"
                             title="Fale Conosco por WhatsApp" target="_blank">
                        (49) 988859041</a>
                        <br>
                    <i class="fa fa-map-marker" style="margin-right:2px;"></i>
                    <a href="#" title="Portal do Cliente" target="_blank">Customer Portal</a>
                                        </span>
            </div>
            </div>


            <div class="col-xs-12 col-sm-4 col-md-4">
            <a href="#"><div class="contact-box">

            <div class="box-icon">
                <img src="img/curtir-icon.png" alt="">
            </div>

            <h3>
                <a href="#" title="Orçamento de site" target="_blank">Like and<b> share</b></a>
                
            </h3>
            <ul class="contact-ul">
                <li>
                        <a href="https://www.facebook.com/MJcode13/" title="MJcode's Facebook" target="_blank">
                            <img alt="MJcode's Facebook" class="cont im" src="img/ico-facebook.png" data-was-processed="true"></a>
                </li>

            </ul>
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
<!--counter up-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/index.js"></script>
<script src="js/validation.js"></script>
<script src="bootstrap-4.1.3-dist/js/bootstrap.min.js"></script>
<script src="https://use.fontawesome.com/releases/v5.5.0/js/all.js"></script>
<script src="https://kit.fontawesome.com/691f1a5fce.js" crossorigin="anonymous"></script>
</body>
</html>
