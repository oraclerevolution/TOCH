<?php
	require "database.php";
	$bdd = Database::connect() ;
	$services_effec = $bdd->prepare('SELECT * FROM services_effectues');
	$nb_services = $services_effec->rowCount();
	$mail_envoyes = $bdd->query('SELECT * FROM mail_envoyes');
	$nb_mail = $mail_envoyes->rowCount();

	$nom = $numero_cni = $mail = $tel = $services = "";
	function inputVerify($var){

		$var = trim($var);
		$var = htmlspecialchars($var);
		$var = stripslashes($var);
	
		return $var;
	}
		
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {

		$nom = inputVerify($_POST["nom_demandeur"]);
		$numero_cni = inputVerify($_POST["numero_cni_demandeur"]);
		$mail = inputVerify($_POST["mail_demandeur"]);
		$tel = inputVerify($_POST["tel_demandeur"]);
		$services = inputVerify($_POST["services_d"]);

	
		if(!empty($nom) && !empty($numero_cni) && !empty($mail) && !empty($tel) && !empty($services ))
		{
			$db = Database::connect();
			$reponse = $db->prepare("INSERT INTO services_effectues (nom_demandeur, numero_cni, email_demandeur, tel_demandeur, nom_services) VALUES (?,?,?,?,?)");
			$reponse->execute(array($nom, $numero_cni, $mail, $tel, $services));
			Database::disconnect();
		}
	}
?>
<!DOCTYPE html>
<?php require "securite.php"; ?>

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
<meta charset="utf-8" />
<title>The Online City Hall: Procédons plus rapidement</title>
<meta content="width=device-width, initial-scale=1.0" name="viewport" />
<meta name="description"  content="Educo"/>
<meta name="keywords" content="The Online City Hall" />
<meta name="author"  content="Divinity Advice"/>
<meta name="MobileOptimized" content="320" />

<!--srart theme style -->
<link href="css/main.css" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" href="css/custom.css">
<!-- end theme style -->
<!-- favicon links -->
<link rel="shortcut icon" type="image/png" href="images/header/favicon.png" />
<style>
	.bouton{
		height:40px;
	}
</style>
</head>
<body>
<!--Page main section start-->
<div id="educo_wrapper">
<!--Header start-->
  <?php include "scripts/header2.php"; ?>
 <!--header end -->
<!--Breadcrumb start-->
<div class="ed_pagetitle" data-stellar-background-ratio="0.5" data-stellar-vertical-offset="0" style="background-image: url(http://placehold.it/921X533);">
<div class="ed_img_overlay"></div>
	<div class="container">
		<div class="row">
			<div class="col-lg-6 col-md-4 col-sm-6">
				<div class="page_title">
					<h2>la mairie en ligne</h2>
				</div>
			</div>
			
		</div>
	</div>
</div>
<!--Breadcrumb end-->
<!--single student detail start-->
<div class="ed_dashboard_wrapper">
	<div class="container">
		<div class="row">
			<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
				<div class="ed_sidebar_wrapper">
					<div class="ed_profile_img">
					<img src="../inter/image/<?php echo $_SESSION['photo']; ?>" alt="Dashboard Image" />
					</div>
					<h3>
						<?php echo $_SESSION['nom']; ?>
					</h3>
					 <div class="ed_tabs_left">
						<ul class="nav nav-tabs">
						  <li class="active"><a href="#dashboard" data-toggle="tab">Tableau de bord</a></li>
						  <li><a href="#courses" data-toggle="tab">Services <span><?= $nb_services ?></span></a></li>
						  <li><a href="#notification" data-toggle="tab">notifications <span><?= $nb_mail ?></span></a></li>
						  <li><a href="#profile" data-toggle="tab">profil</a></li>
						  <li><a href="#setting" data-toggle="tab">Paramètres</a></li>
						</ul>
					</div>
				</div>
			</div>
			<div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
			<div class="ed_dashboard_tab">
				<div class="tab-content">
					<div class="tab-pane active" id="dashboard">
						<div class="ed_dashboard_tab_info">
						<h1>Salut, <span><?php echo $_SESSION['nom']; ?></span></h1>
						<h1>Bienvenue sur votre tableau de bord</h1>
						<p>Salut <strong><?php $_SESSION['nom']; ?></strong>, ici sur cette page vous pourrez voir toutes les informations concernant vos services éffectués et notifications et paramètres de votre profil.</p>
						<button type="button" class="btn btn-large btn-primary bouton" data-toggle="modal" data-target="#myModal" style="width:200px;margin-bottom:10px;">Demande d'extrait</button>

						<button type="button" class="btn btn-large btn-primary bouton" data-toggle="modal" data-target="#myModal2" style="width:200px;margin-bottom:10px;">Déclaration de mariage</button><br>

						<button type="button" class="btn btn-large btn-primary bouton" data-toggle="modal" data-target="#myModal3" style="width:200px;margin-bottom:10px;">Déclaration de naissance</button>

						<button type="button" class="btn btn-large btn-primary bouton" data-toggle="modal" data-target="#myModal4" style="width:200px;margin-bottom:10px;">Déclaration de décès</button>
						</div>
						
					</div>
					<div class="tab-pane" id="courses">
						<div class="ed_dashboard_inner_tab">
							<div role="tabpanel">
								<!-- Nav tabs -->
								<ul class="nav nav-tabs" role="tablist">
									<li role="presentation" class="active"><a href="#my" aria-controls="my" role="tab" data-toggle="tab">Tous les services</a></li>
									<li role="presentation"><a href="#result" aria-controls="result" role="tab" data-toggle="tab">Services acceptés</a></li>
									<li role="presentation"><a href="#status" aria-controls="status" role="tab" data-toggle="tab">Services refusés</a></li>
									<li role="presentation"><a href="#instructing" aria-controls="instructing" role="tab" data-toggle="tab">Services en attente</a></li>
								</ul>
					
								<!-- Tab panes -->
								<div class="tab-content">
									<div role="tabpanel" class="tab-pane active" id="my">
									<div class="ed_inner_dashboard_info">
									<h2>Vous avez au total <?= $nb_services ?> services éffectués</h2>
										<div class="row">
											<div class="ed_mostrecomeded_course_slider">
											
												<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 ed_bottompadder20" style="border:1px solid;padding-top:10px;float:left;">
													<div class="ed_item_img">
														<img src="images/assia.jpg" alt="item1" class="img-responsive">
													</div>
													<div class="ed_item_description ed_most_recomended_data">
															<h4><a href="course_single.php">
																Statut:
															</a></h4>
															<div class="row">
																<div class="ed_rating">
																	<div class="col-lg-6 col-md-7 col-sm-6 col-xs-6">
																		<div class="row">
																			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
																				<div class="ed_stardiv">
																				Service:
																				</div>
																			</div>
																			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
																				<div class="row">
																					<p>
																						
																					</p>
																				</div>
																			</div>
																		</div>
																	</div>
																	
																</div>
															</div>

															<p>Project-Based Learning is a flexible tool for framing given academic standards into flexible tool for framing.</p>
													</div>
													
												</div>
												
											</div>
										</div>
									</div>
									</div>
									<div role="tabpanel" class="tab-pane" id="result">
										<div class="ed_dashboard_inner_tab">
											<h2>Détails des resultats</h2>
											<p>Vous avez sur cette page tous les détails sur les services acceptés.</p>
										</div>
									</div>
									<div role="tabpanel" class="tab-pane" id="status">
										<div class="ed_dashboard_inner_tab">
											<h2>Détails des resultats</h2>
											<p>Vous avez sur cette page tous les détails sur les services refusés.</p>
										</div>
									</div>
									<div role="tabpanel" class="tab-pane" id="instructing">
										<div class="ed_dashboard_inner_tab">
											<h2>Détails des resultats</h2>
											<p>Vous avez sur cette page tous les détails sur les services en attente.</p>
										</div>
									</div>
								</div>
					
							</div><!--tab End-->
						</div>
					</div>
					
					<div class="tab-pane" id="notification">
						<div class="ed_dashboard_inner_tab">
							<div role="tabpanel">

								<div class="tab-content">
									<div role="tabpanel" class="tab-pane active" id="unread">
									<div class="ed_dashboard_inner_tab">
										<?php
										if ($nb_mail == 0) {
										?>
										<h2 style="text-align:center;">Vous avez <?= $nb_mail ?> mail(s) recu(s).</h2>
										<?php
										}else {
											# code...
										}
										?>
									</div>
									</div>
									
								</div>
							</div><!--tab End-->
						</div>
					</div>
					<div class="tab-pane" id="profile">
						<div class="ed_dashboard_inner_tab">
							<div role="tabpanel">
								<!-- Nav tabs -->
								<ul class="nav nav-tabs" role="tablist">
									<li role="presentation" class="active"><a href="#view" aria-controls="view" role="tab" data-toggle="tab">Voir</a></li>
									<li role="presentation"><a href="#edit" aria-controls="edit" role="tab" data-toggle="tab">Modifier</a></li>
									<li role="presentation"><a href="#change" aria-controls="change" role="tab" data-toggle="tab">changer de photo de profil</a></li>
								</ul>
								<!-- Tab panes -->
								<div class="tab-content">
									<div role="tabpanel" class="tab-pane active" id="view">
									<div class="ed_dashboard_inner_tab">
										<h2>Votre profil</h2>
										<table id="profile_view_settings">
											<thead>
												<tr>
													<th>Noms et prenoms</th>
													<th>Mail</th>
												</tr>
											</thead>

											<tbody>
												<tr>
													<td>
														<?php echo $_SESSION['nom']; ?>
													</td>
													<td>
														<a href="#">
														<?php echo $_SESSION['email']; ?>
														</a>
													</td>
												</tr>												
											</tbody>
										</table>
									</div>
									</div>
									<div role="tabpanel" class="tab-pane" id="edit">
									<div class="ed_dashboard_inner_tab">
										<h2>Modifiez votre profil</h2>
											<form class="ed_tabpersonal">
												<div class="form-group">
												<label for="">Modifier votre nom:</label>
												<input type="text" class="form-control"  placeholder="Votre nom">
												</div>
												<div class="form-group">
												<label for="">Modifier votre mot de passe:</label>
												<input type="password" class="form-control"  placeholder="Votre mot de pase">
												</div>
												<div class="form-group">
												<button class="btn ed_btn ed_green">Enregistrer</button>
												</div>
											</form>
									</div>
									</div>
									<div role="tabpanel" class="tab-pane" id="change">
										<div class="ed_dashboard_inner_tab">
											<h2>changer de photo</h2>
											<form class="ed_tabpersonal">
												<div class="form-group">
												<p>Cliquer pour selecctionner un format JPG, GIF or PNG depuis votre orddinateur et cliquer sur 'Mettre à jour'.</p>
												</div>
												<div class="form-group">
												<input type="file" name="photo" accept="image/*">
												</div>
												<div class="form-group">
												<button class="btn ed_btn ed_green">Mettre à jour</button>
												</div>
												<div class="form-group">
												<p>Si vous voulez supprimer votre photo de profil cliquer sur le bouton 'supprimer' ci-dessous.</p>
												</div>
												<div class="form-group">
												<button class="btn ed_btn ed_orange">supprimer</button>
												</div>
											</form>
										</div>
									</div>
								</div>
							</div><!--tab End-->
						</div>
					</div>
					<div class="tab-pane" id="setting">
						<div class="ed_dashboard_inner_tab">
							<div role="tabpanel">
								<!-- Nav tabs -->
								<ul class="nav nav-tabs" role="tablist">
									<li role="presentation" class="active"><a href="#general" aria-controls="general" role="tab" data-toggle="tab">general</a></li>
									
								</ul>
					
								<!-- Tab panes -->
								<div class="tab-content">
									<div role="tabpanel" class="tab-pane active" id="general">
									<div class="ed_dashboard_inner_tab">
										<h2>Paramètre general</h2>
										<form class="ed_tabpersonal" method="post">
											<div class="form-group">
											<input type="text" class="form-control" value="<?= $_SESSION['email'];?>" disabled="">
											</div>
											<div class="form-group">
											<p>Changer de mot de passe <strong>(laissez les cases vides pour ne pas changer)</strong></p>
											</div>
											<div class="form-group">
											<input type="password" class="form-control"  placeholder="Ancien mot de passe" name="ancien_mot">
											</div>
											<div class="form-group">
											<input type="password" class="form-control"  placeholder="Nouveau mot de passe" name="nveau_mot">
											</div>
											<div class="form-group">
											<button class="btn ed_btn ed_green" type="submit">Sauvegarder les changements</button>
											</div>
										</form>
									</div>
									</div>
									
								</div>
					
							</div><!--tab End-->
						</div>
					</div>
					<div class="tab-pane" id="forums">
						<div class="ed_dashboard_inner_tab">
							<div role="tabpanel">
								<!-- Nav tabs -->
								<ul class="nav nav-tabs" role="tablist">
									<li role="presentation" class="active"><a href="#started" aria-controls="started" role="tab" data-toggle="tab">topics started</a></li>
									<li role="presentation"><a href="#replies" aria-controls="replies" role="tab" data-toggle="tab">replies created</a></li>
									<li role="presentation"><a href="#favourite" aria-controls="favourite" role="tab" data-toggle="tab">favourite</a></li>
									<li role="presentation"><a href="#subscribed" aria-controls="subscribed" role="tab" data-toggle="tab">subscribed</a></li>
								</ul>
					
								<!-- Tab panes -->
								<div class="tab-content">
									<div role="tabpanel" class="tab-pane active" id="started">
									<div class="ed_dashboard_inner_tab">
										<h2>forum topics started</h2>
										<span>You have not created any topics.</span>
									</div>
									</div>
									<div role="tabpanel" class="tab-pane" id="replies">
									<div class="ed_dashboard_inner_tab">
										<h2>forum replies created</h2>
										<span>You have not replied to any topics.</span>
									</div>
									</div>
									<div role="tabpanel" class="tab-pane" id="favourite">
									<div class="ed_dashboard_inner_tab">
										<h2>favorite forum topics</h2>
										<span>You currently have no favourite topics.</span>
									</div>
									</div>
									<div role="tabpanel" class="tab-pane" id="subscribed">
									<div class="ed_dashboard_inner_tab">
										<h2>subscribed forums</h2>
										<span>You are not currently subscribed to any forums.</span>
									</div>
									</div>
								</div>
					
							</div><!--tab End-->
						</div>
					</div>
				</div>
			</div>
			</div>
			
			
		</div>
	</div>
</div>
<!--Modal 1-->

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">x</button>
        <h4 class="modal-title">Demande d'extrait de naissance</h4>
      </div>
      <div class="modal-body">
		  <form action="" method="post">
		  <div class="form-group">
			<fieldset>
				<legend>Informations personnelles</legend>
				<label for="">Votre nom et prenoms:</label>
				<input type="text" name="nom_demandeur" class="form-control" placeholder="" id="" required="">
				<label for="">Votre numero de CNI:</label>
				<input type="text" name="numero_cni_demandeur" class="form-control" placeholder="" id="" required="">
				<label for="">Votre addresse email:</label>
				<input type="email" name="mail_demandeur" class="form-control" placeholder="" id="" required="">
				<label for="">Votre numero de téléphone:</label>
				<input type="number" name="tel_demandeur" class="form-control" placeholder="" id="" required="">
			</fieldset>
			<br>
			<fieldset>
				<legend>Informations sur le service</legend>
				<input type="text" value="Demande d'extrait de naissance" name="services_d" class="form-control" disabled="">
			</fieldset>
	  </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-info" data-dismiss="modal">Envoyez</button>
      </div>
	</div>
  </div>
</div>

<!--Modal 2-->

<!-- Modal -->
<div id="myModal2" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modal Header</h4>
      </div>
      <div class="modal-body">
        <p>Some text in the modal.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<!--Modal 3-->

<!-- Modal -->
<div id="myModal3" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modal Header</h4>
      </div>
      <div class="modal-body">
        <p>Some text in the modal.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<!--Modal 4-->

<!-- Modal -->
<div id="myModal4" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modal Header</h4>
      </div>
      <div class="modal-body">
        <p>Some text in the modal.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<!--single student detail end-->
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