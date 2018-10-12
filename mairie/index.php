<?php session_start(); ?>
<?php
require "database.php";
function inputVerify($var){

    $var = trim($var);
    $var = htmlspecialchars($var);
    $var = stripslashes($var);

    return $var;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $usermail = inputVerify($_POST['email']);
    $password = inputVerify($_POST['password']);

    if(!empty($_POST['email']) and !empty($_POST['password']) )
    {
        $db = Database::connect();
        $req=$db->prepare("SELECT * from users_tables where email=? AND  mot_de_passe=?");
        $req->execute(array($_POST['email'],$_POST['password']));
       

        $userHasBeenFound = $req->rowCount();
        if ($userHasBeenFound) {
            $user = $req->fetch(PDO::FETCH_OBJ);
            
            $_SESSION['id'] = $user->id;
            $id=$_SESSION['id'];
            $_SESSION['nom'] = $user->nom;
            $nom = $user->nom;
            $_SESSION['NIV0'] = 1 ;
            $_SESSION['photo'] = $user->photo;
            $photo = $user->photo;
            Database::disconnect();

            header('location:dashboard.php');
        }
    } else {
		$error_msg = "coordonnées incorrectes";
	}
}

// if (isset($_POST['remember'])) {
//     setcookie('auth_id', $user->id . '-----' . sha1($user->user), time() + 3600 * 24 * 3, '/', 'localhost', false, true);
// }


$bdd = Database::connect() ;
$mairie = $bdd->query('SELECT * FROM mairie_tables');
$nbmairies = $mairie->rowCount();
$users = $bdd->query('SELECT * FROM users_tables');
$nbusers = $users->rowCount();
$reponse = $bdd->query('SELECT * FROM services_tables');

?>
<!DOCTYPE html>
<!-- 
Developper: N'goran Assia Jean 
-->
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->

<!-- Begin Head -->
<head>
<meta charset="utf-8"/>
<title>The Online City Hall: Procédons plus rapidement</title>
<meta content="width=device-width, initial-scale=1.0" name="viewport" />
<meta name="description"  content="The Online City Hall"/>
<meta name="keywords" content="The Online City Hall" />
<meta name="author"  content="Divinity Advice"/>
<meta name="MobileOptimized" content="320" />

<!--srart theme style -->
<link href="css/main.css" rel="stylesheet" type="text/css"/>
<!-- end theme style -->
<!-- favicon links -->
<link rel="shortcut icon" type="image/png" href="images/header/favicon.png" />
</head>

<body>
<!--Page main section start-->
<div id="educo_wrapper">
<!--Header start-->
<?php include "scripts/header.php" ?>
<!--header end -->
<div class="ed_slider_form_section">
<!--Slider start-->
<?php include "scripts/slider.php"; ?>
<!--Slider end-->




<!--Our expertise section one start -->
<div class="ed_transprentbg ed_toppadder100">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="ed_heading_top ed_toppadder50">
					<h3>Vos services disponibles</h3>
				</div>
			</div>
			
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="ed_populer_areas_slider">
				
					<div class="owl-carousel owl-theme">
							<?php

								$compt = 1;
								while ($donnees = $reponse->fetch()) {
									
							echo '
								<div class="item">
									<div class="ed_item_img">
										<img src="../inter/image/'.$donnees["photo"].'" alt="item1" class="img-responsive">
									</div>
									<div class="ed_item_description">
										<h4>
											'.$donnees["titre"].'
										</h4>
										<p>
											'.$donnees["descr"] .'
										</p>
									</div>
								</div> ';

								
				}
				Database::disconnect();
			?>			
					</div>
				</div>
			</div>
		</div>
    </div><!-- /.container -->
</div>
<!--Our expertise section one end -->
<!--counter section start -->
<div class="ed_graysection ed_toppadder90 ed_bottompadder90">
	<div class="container">
		<div class="ed_counter_wrapper">
		<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
            <div class="ed_counter">
				<h2 class="timer" data-from="0" data-to="<?= $nbmairies ?>" data-speed="5000"></h2>
				<h4>Mairie connectées</h4>
			</div>
        </div>
		<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
            <div class="ed_counter">
				<h2 class="timer" data-from="0" data-to="<?= $nbusers ?>" data-speed="5000"></h2>
				<h4>Citoyens inscrits</h4>
			</div>
        </div>
		<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
            <div class="ed_counter">
				<h2 class="timer" data-from="0" data-to="8400" data-speed="5000"></h2>
				<h4>Clients satisfaits</h4>
			</div>
        </div>
        </div>
	</div>
</div>
<!--counter section end -->
<!--video_section Section three start -->
<div class="ed_parallax_section" data-stellar-background-ratio="0.5" data-stellar-vertical-offset="100" style="">
<div class="ed_img_overlay"></div>
	<div class="container">
		<div class="row">
			<div class="col-lg-6 col-md-6 col-sm-12">
				<div class="ed_video_section">
					<div class="embed-responsive embed-responsive-16by9">
						<div class="ed_video">
							<img src="images/assia.jpg" style="cursor:pointer"  alt="1" />
							<div class="ed_img_overlay">
								<a href="#"><i class="fa fa-chevron-right"></i></a>
							</div>
						</div>
						<!-- <iframe id="educo_video" class="embed-responsive-item" src="https://www.youtube.com/watch?v=gAIMxtDCuHs" allowfullscreen></iframe> -->
						<video src="fichiers/dn.mp4" controls="" cover="images/assia.jpg"></video>
					</div>
				</div>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-12">
				<div class="ed_video_section_discription">
					<h4>Presentation du projet par la DA</h4>
					<p>Vu l'avancement des TIC en Côte d'Ivoire, les développeurs de la start-up Divinity Advice ont decidés de concevoir ce système afin d'aider les mairies dans leurs tâches et de promouvoir aussi les TIC.</p>
<!-- 					<span><a href="#" class="btn ed_btn ed_orange">Savoir plus</a></span>
 -->				</div>
			</div>
		</div>
	</div>
</div>
<!--video_section Section three end -->
<!-- Most recomended Courses start -->
<div class="ed_graysection ed_toppadder80 ed_bottompadder80">
	<h2 style="text-align:center;">Les initiateurs du projet</h2>
	<hr width="60%;">
	<div class="container">
		<div class="row">
			<div class="ed_mostrecomeded_course_slider">
				<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
					<div class="ed_mostrecomeded_course">
						<div class="ed_item_img">
							<img src="images/assia.jpg" alt="item1" class="img-responsive">
						</div>
						<div class="ed_item_description ed_most_recomended_data">
								<h4 style="text-align:center;"><a href="course_single.html">Assia Jean Gontran N'goran </a></h4>
								<div class="course_detail">
									<div class="course_faculty" style="text-align:center;font-weight:500">
										<a href="instructor_dashboard.html"> Chef Developpeur front-end </a>
									</div>
								</div>
								<p>Titulaire d'une licence II en Informatique et Sciences du Numérique dans la spécialité Développement d'Applications et e-Services. Il est également webmaster à <a href="">Katorz Music</a>.</p>
								<br>
								<a href="fichiers/cv_assia.pdf"><button type="button" class="btn btn-large  btn-info">Télécharger son CV</button></a>
								
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
						<div class="ed_mostrecomeded_course">
							<div class="ed_item_img">
								<img src="images/cecilia.jpg" alt="item1" class="img-responsive">
							</div>
							<div class="ed_item_description ed_most_recomended_data">
									<h4 style="text-align:center;"><a href="course_single.html">Cecilia Mouayé Koffi </a></h4>
									<div class="course_detail">
										<div class="course_faculty" style="text-align:center;font-weight:500">
											<a href="instructor_dashboard.html">Rédactrice du projet</a>
										</div>
									</div>
									<p>Titulaire d'une licence II en Informatique et Sciences du Numérique dans la spécialité Développement d'Applications et e-Services. Il est également webmaster à <a href="">Katorz Music</a>.</p>
									<br>
								<button type="button" class="btn btn-large  btn-info">Télécharger son CV</button>
							</div>
						</div>
					</div>
					<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
							<div class="ed_mostrecomeded_course">
								<div class="ed_item_img">
									<img src="images/assia.jpg" alt="item1" class="img-responsive">
								</div>
								<div class="ed_item_description ed_most_recomended_data">
										<h4 style="text-align:center;"><a href="course_single.html">Inconnu</a></h4>
										<div class="course_detail">
											<div class="course_faculty" style="text-align:center;font-weight:500">
												<a href="instructor_dashboard.html">Chef Developpeur back-end </a>
											</div>
										</div>
										<p>Titulaire d'une licence II en Informatique et Sciences du Numérique dans la spécialité Développement d'Applications et e-Services. Il est également webmaster à <a href="">Katorz Music</a>.</p>
										<br>
								<button type="button" class="btn btn-large  btn-info">Télécharger son CV</button>
								</div>
							</div>
						</div>
			</div>
		</div>
    </div><!-- /.container -->
</div>
<!-- Most recomended Courses end -->

<!--client section start -->
<div class="ed_graysection ed_toppadder80 ed_bottompadder80">
	<h2 style="text-align:center;">Nos partenaires</h2>
	<hr style="width:60%;">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="ed_clientslider">
					<div id="owl-demo5" class="owl-carousel owl-theme">
						<div class="item">
							<a href="#">
								<img src="images/content/bank2.png" alt="Partner Img" />
							</a>
						</div>
						<div class="item">
							<a href="#">
								<img src="images/content/cinetpay2.png" alt="Partner Img" />
							</a>
						</div>
						<div class="item">
							<a href="#">
								<img src="images/content/mtn2.jpg" alt="Partner Img" />
							</a>
						</div>
						<div class="item">
							<a href="#">
								<img src="images/content/orange2.png" alt="Partner Img" />
							</a>
						</div>
						<div class="item">
							<a href="#">
								<img src="images/content/partner5.png" alt="Partner Img" />
							</a>
						</div> 
					</div>
				</div>
			</div>
		</div>
    </div><!-- /.container -->
</div>
<!--client section end -->
<!--Newsletter Section six start-->
<div class="ed_newsletter_section" data-stellar-background-ratio="0.5" data-stellar-vertical-offset="-500">
<div class="ed_img_overlay"></div>
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12">
				<div class="row">
					<div class="col-lg-7 col-md-7 col-sm-12 col-xs-12">
						<div class="ed_newsletter_section_heading">
							<h4>Laissez-vous informer directement par notre newsletters</h4>
						</div>
					</div>
					<div class="col-lg-5 col-md-5 col-sm-6 col-xs-6 col-lg-offset-0 col-md-offset-0 col-sm-offset-3 col-xs-offset-3">
						<div class="row">
							<div class="ed_newsletter_section_form">
								<form class="form" method="post" action="newsletters.php">
									<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
										<input class="form-control" type="mail" name="mailnewletter" placeholder="Entrez votre Email" required="" />
									</div>
									<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
										<button type="submit" class="btn ed_btn ed_green">confirmer</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
        </div>
	</div>
</div>
<!--Newsletter Section six end-->
<?php include "scripts/footer.php"; ?>
<!--Page main section end-->
<!--main js file start--> 
<script type="text/javascript" src="js/jquery-1.12.2.js"></script> 
<script type="text/javascript" src="js/bootstrap.js"></script> 
<script type="text/javascript" src="js/modernizr.js"></script> 
<script type="text/javascript" src="js/owl.carousel.js"></script> 
<script type="text/javascript" src="js/jquery.stellar.js"></script> 
<script type="text/javascript" src="js/smooth-scroll.js"></script> 
<script type="text/javascript" src="js/plugins/revel/jquery.themepunch.tools.min.js"></script>
<script type="text/javascript" src="js/plugins/revel/jquery.themepunch.revolution.min.js"></script>
<script type="text/javascript" src="js/plugins/revel/revolution.extension.layeranimation.min.js"></script>
<script type="text/javascript" src="js/plugins/revel/revolution.extension.navigation.min.js"></script>
<script type="text/javascript" src="js/plugins/revel/revolution.extension.slideanims.min.js"></script>
<script type="text/javascript" src="js/plugins/countto/jquery.countTo.js"></script>
<script type="text/javascript" src="js/plugins/countto/jquery.appear.js"></script>
<script type="text/javascript" src="js/custom.js"></script> 

<!--main js file end-->
</body>
</html>