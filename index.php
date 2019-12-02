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

<body>

  <!--__________Preloader__________-->
    <div class="loader-wrapper">
    	<div class="loader">
			<span></span>
			<span></span>
			<span></span>
		</div>
    </div>


<!--Home section-->

	<!--Navigation-->
	<div id="home">
	<nav class="navbar navbar-expand-md navbar-dark bg-dark">
	
  <a class="navbar-brand" href="index.php"><img src="img/logom.png"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse"
	 data-target="#navbarResponsive" >
    <span class="navbar-toggler-icon"></span>
  </button>
		<div class="collapse navbar-collapse" id="navbarResponsive">
			<ul class="navbar-nav ml-auto active">

				<li class="nav-item">
					<a class="nav-link" href="index.php">Accueil</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#about">A Propos</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#project">Notre expertise</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#ourteam">Notre Equipe</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#service">Services</a>
				</li>
					<li class="nav-item">
						<a class="nav-link" href="#contact">Nous contacter</a>
					</li>
			</ul>
		</div>
	</nav>
</div>
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
								<h3 class="animated bounceInLeft" style="animation-delay:2s">La Technologie qui vous simplifie la vie</h3>
								<a href="#service">
									<button type="button" class="btn btn-outline-light btn-lg animated zoomIn"
									style="animation-delay:1s">Nos Services
								</button></a>
								<a href="#contact"><button type="button" data-toggle="modal" data-target="#Contact-Modal" class="btn btn-danger btn-lg animated zoomIn"
									style="animation-delay:2s">Nous contacter
								</button></a>
							</div>
				    </div>
				    <div class="carousel-item">
				      <img src="img/slide4.jpg" class="d-block w-100" alt="">
							<div class="carousel-caption">
								<h1 class="display-2 animated slideInDown" style="animation-delay:1s"><span>
									Nous Sommes</span> créatifs</h1>
								<h3 class=" animated fadeInUp" style="animation-delay:2s"><em>Conception et développement Web</em></h3>
								<a href="#contact"><button type="button" class="btn btn-danger btn-lg animated zoomIn"
									style="animation-delay:3s">Nous Contacter
								</button></a>
							</div>
				    </div>
				    <div class="carousel-item">
				      <img src="img/slide3.jpg" class="d-block w-100" alt="...">
							<div class="carousel-caption">
								<h1 class="display-2 animated zoomIn" style="animation-delay:1s">La  <span>Pour vous</span></h1>
								<h3 class="animated fadeInLeft" style="animation-delay:2s">Développement d'applications Dekstop et Android</h3>
								<a href="#service
								"><button type="button" data-toggle="modal" data-target="#Orçamento-Modal" class="btn btn-outline-light btn-lg animated bounceInLeft" style="animation-delay:3s">Faire un Devis
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
				<h5 class="text-muted" >MJCode est spécialisé dans le développement Web et les applications mobiles,
personnalisé et adapté à vos besoins.

<p> E travaille avec des particuliers, des petites entreprises avec des projets
qu'ils veulent "implémenter / mettre à jour / ajouter"
ou simplement refactorisé pour une meilleure architecture.
nous travaillons également avec des équipes qui recherchent 
une personne possédant nos compétences en la matière. </p> </h5>
					<a class="btn btn-secondary my-4 text-capitalize pull-right" href="#project" target="">Notre Expertise</a>
		</div>

		<div class="col-md-4 offset ">
				<img src="img/logheader.png"  class="img-1 about-image">
		</div>
	</div>


</section>

<!--Service Section-->
<div id="service" class="offset ">
<div class=" row service-section">	<!--jumbotron-->
		<div class="col-md-12 text-center">
			<h3 class="heading head">Nos Services</h3>
			<div class="heading-underline"></div>
		</div>

		<a href="service.html#Web"><div class="card mb-6 col-md-6">
              <div class="row no-gutters">
                <div class="col-md-4">
				<i class="fas fa-laptop-code img-responsive text-center"></i>
				</div>
				
                <div class="col-md-8">
                  <div class="card-body">
					<h2>Création de Site Internet</h2>
					<div class="heading-underline"></div>
                    <p class="card-text">
					<i>Vous n`etes pas un concepteur de sites Web,
					c'est là que MJcode entre en jeu. Nous facilitons le processus
					de créer un site Web, le rendant accessible à tous.
					vous pouvez facilement lancer un site web professionnel</i>.
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
					<h2> Application Dekstop</h2>
					<div class="heading-underline"></div>
                    <p class="card-text">
					<i>Nous facilitons le processus de création de votre application de bureau,
						 en le rendant accessible à tous. </i></p>
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
					<h2>Application Mobile</h2>
					<div class="heading-underline"></div>
                    <p>
						<i>
						Nous développons des applications natives de différents types, 
						telles que des applications de transport, de service et d’éducation. 
						Nous comprenons vos besoins, développons les fonctionnalités,
						 définissons la portée du projet et le développons.
						</i> 
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
					<h2>Blog Personnel</h2>
					<div class="heading-underline"></div>
                    <p class="card-text">
					<i>création des blogs pour les marques et les professionnels 
					qui souhaitent mettre en œuvre la stratégie de marketing de contenu.</i>
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
					<a class="btn btn-secondary btn-md" href="#contact">Nous Embauchez</a>
					</div>



			</div>
</section>



<!--team  Section-->
<div id="ourteam" class="offset">
	<div class="ourteam">
		<div class="row dark text-center">

			<div class="col-12">
				<h3 class="heading">MJcode Team</h3>
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


				<button type="button" class="btn btn-info" data-toggle="modal" data-target="#marc">
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
		 <p class="card-text"> Marc est un étudiant en <b>Science informatique</b>, 
		 <i> développeur front-end.
			 Programmeur : PYTHON,C,JAVASCRIPT e </i>web. </P>
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

				<button type="button" class="btn btn-info" data-toggle="modal" data-target="#jod">
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
		<p class="card-text"> Etudiant en <b>Science informatique</b>, 
								Data Scientist,
							 développeur back-end et ingénieur en logiciel.........</p>
	</div>

	<div class="mo-footer">

	<div class="col-12 container-fluid social-footer m-footer">
		<div class="heading-underline"></div>
		<a href="https://www.linkedin.com/in/jod-fedlet-pierre-b6ab56152/" target="_blank"> <i class='fab fa-linkedin' style='font-size:40px;color:#007dbb'></i></a>
		<a href="https://github.com/jodfedlet" target="_blank"><i class='fab fa-github' style='font-size:40px;color:black'></i></a>

	</div>
	</div>

	<div class="modal-footer">
		<button type="button" class="btn btn-danger " data-dismiss="modal">Fermer</button>
	</div>
</div>
</div>
</div>


</div>
</div>



<!--landing-->
<div class="fixed-wrap">
	<div class="fixed">
	</div>
</div>

	</div>
</div>
<!--end-->




<!-- Project section -->
<section id="project" class="offset">
<div class="container-fluid">
<div class="row" >
		<div class="col-12">
			<h3 class="heading text-center">Notre expertise</h3>
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
				<h3 class="text-center">Web Développement</h3>
				<p>	Construction de site Web réactif et plateforme de commerce électronique</p>
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
				<h3>Application Mobile</h3>
				<p>Facilitation du processus de Creation de votre application Mobile, 
					en le rendant accesive a tous</p>
				<a href="#" class="btn btn-info btnD">Voir plus </a>

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
				<h3>Hebergement de Website</h3>
				<p>Nous assurons la mise en ligne et la disponibilité de votre site</p>
				<a href="#" class="btn btn-info btnD">voir plus </a>

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
			<a class="btn btn-secondary btn-md" href="#contact">Travailler avec-nous</a>
		</div>


</div>
<!--end-->

<!--=====Contact===-->
<div id="contact" class="offset fixed-b">
<div class="fixed-background">
<div class="dark text-center">

		<div class="col-12">
				<h3 class="heading"> Où nous trouver?</h3>
                <div class="heading-underline"></div>
                <p class="heading-title">Espace réservé à vous pour nous contacter</p>
        </div>

        <div class="row">

            <div class="col-xs-12 col-sm-4 col-md-4">
            <a href="#devi" title="Demander un devis" data-toggle="modal" data-target="#Orçamento-Modal"><div class="contact-box">

            <div class="box-icon">
                <img src="img/icon-perso.png" alt="">
            </div>

            <h3>
                <b>Budget du site</b></a>
                
            </h3>
            <span class="cont-text">Contactez-nous pour demander le budget de
				votre <b> site </b></span>
</div>
</div>

			<!-- MOdal budget -->

			<!-- Modal -->
<div class="modal fade" id="Orçamento-Modal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg" role="document">
<div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel" class="text-center">Demander un devis</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
	  <form>
		<div class="row">

			<div class="col-xs-12 col-sm-12 col-md-12">
			<label for="inputname" class="pull-left">Nom</label>
				<input type="text" class="form-control" placeholder="Votre Nom ou Nom de l`entreprise">
			</div>
			<div class="col-xs-6 col-sm-6 col-md-6">
			<label for="phone" class="pull-left">Telephone Mobile:</label>
				<input type="tel"  class="form-control" pattern="[0-9]{2}-[0-9]{4}-[0-9]{4}" placeholder="exemple: XX-XXXX-XXXX" required>
			</div>
			<div class="col-xs-6 col-sm-6 col-md-6">
				<label for="phone" class="pull-left">Telephone Fix:</label>
					<input type="tel"  class="form-control" pattern="[0-9]{2}-[0-9]{4}-[0-9]{4}" placeholder="exemple: XX-XXXX-XXXX" required>
			</div>

			<div class="col-xs-12 col-sm-12 col-md-12">
			<label for="exampleInputEmail1" class="pull-left">Adresse Email:</label>
				<input type="text" class="form-control" placeholder="example: xxxxxxxxxx@mjcode.net">
			</div>

			<div class="col-xs-6 col-sm-6 col-md-6">
			<div class="input-group mb-3">
			<select class="custom-select" id="inputGroupSelect01">
					<option selected>Pays...</option>
					<option value="1">Haiti</option>
					<option value="2">Brazil</option>
					<option value="3">Chile</option>
			</select>
			</div>
			</div>

			<div class="col-xs-6 col-sm-6 col-md-6">
			<div class="input-group mb-3">
			<select class="custom-select" id="inputGroupSelect01">
					<option selected>Departement...</option>
					<option value="1">One</option>
					<option value="2">Two</option>
					<option value="3">Three</option>
			</select>
			</div>
			</div>

			<div class="col-xs-6 col-sm-6 col-md-6">
			<label class="container">J´ai deja un site web?
				<input type="checkbox" checked="checked">
				<span class="checkmark"></span>
				</label>

				<label class="container">J`ai deja un Logo?
				<input type="checkbox">
				<span class="checkmark"></span>
			</label>
			</div>

			<div class="col-xs-12 col-sm-12 col-md-12">
			<div class="input-group mb-3">
			<select class="custom-select" id="inputGroupSelect01">
					<option selected>Nos Services</option>
					<option value="1">Creation de site internet</option>
					<option value="2">Creation d´application Mobile</option>
					<option value="3">Creation d´application Dekstop</option>
			</select>
			</div>

			<div class="col-xs-12 col-sm-12 col-md-12">
			<div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text">Comment voulez-vous le site?</span>
				</div>
				<textarea class="form-control" aria-label="With textarea" placeholder="Expliquer en détail"></textarea>
			</div>
			</div>

			<div class="modal-footer">
			<button type="button" class="btn btn-success" data-dismiss="modal">Envoyer</button>
			</div>
		</div>
</div>
	</form>
      
        
      </div>
	</div>
	</div>
</div>


            <div class="col-xs-12 col-sm-4 col-md-4">
            <a href="index.php#Contact-Modal" title="Nous Contactez" data-toggle="modal" data-target="#Contact-Modal"><div class="contact-box">

            <div class="box-icon">
                <img src="img/contato-icone.png" alt="">
            </div>

            <h3>
                <b>Contact</b></a>
                
            </h3>
            <span class="cont-text">
                    <b>Commercial:</b>
                    <i class="fab fa-whatsapp" style="margin-right:2px;"></i>
                    <a href="https://api.whatsapp.com/send?phone=5549988859041&text=sua%20mensagem"
                             title="Nous parler Via WhatsApp" target="_blank">
                        (+55)49 84090209 </a>
                                        </span>
            </div>
			</div>
			
			<!-- MODAL CONTACT -->
			<div class="modal fade" id="Contact-Modal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg" role="document">
<div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel" class="text-center">Nous contacter</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
	  <form>
		<div class="row">

			<div class="col-xs-12 col-sm-12 col-md-12">
			<label for="inputname" class="pull-left">Nom</label>
				<input type="text" class="form-control" placeholder="Votre Nom ou Nom de l`entreprise">
			</div>

			<div class="col-xs-12 col-sm-12 col-md-12">
			<label for="exampleInputEmail1" class="pull-left">Adresse Email:</label>
				<input type="text" class="form-control" placeholder="example: xxxxxxxxxx@mjcode.net">
			</div>

			<div class="col-xs-6 col-sm-6 col-md-6">
			<label for="phone" class="pull-left">Telephone Mobile:</label>
				<input type="tel"  class="form-control" pattern="[0-9]{2}-[0-9]{4}-[0-9]{4}" placeholder="exemple: XX-XXXX-XXXX" required>
			</div>

			<div class="col-xs-12 col-sm-12 col-md-12">
			<div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text">En quoi pouvons nous vous aidez?</span>
				</div>
				<textarea class="form-control" aria-label="With textarea" placeholder="Message"></textarea>
			</div>
			</div>
</div>


			<div class="modal-footer">
			<button type="button" class="btn btn-success" data-dismiss="modal">Envoyer</button>
			</div>
		</div>
	</form>
      
        
      </div>
	</div>
	</div>

            <div class="col-xs-12 col-sm-4 col-md-4">
            <a href="#"><div class="contact-box">

            <div class="box-icon">
                <img src="img/curtir-icon.png" alt="">
            </div>

            <h3>
                <a href="#" title="Orçamento de site" target="_blank">suivez-<b>Nous</b></a>
                
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
<!--  -->
<i class="fas fa-chevron-up"></i>


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
