<?php 

require "database.php";
$nom = $mail = $mdp = $mdp2 = $imageError = "";
function inputVerify($var){

    $var = trim($var);
    $var = htmlspecialchars($var);
    $var = stripslashes($var);

    return $var;
}

if (!empty($_POST)) {
    $nom = inputVerify($_POST["username"]);
    $mail = inputVerify($_POST["usermail"]);
    $mdp = inputVerify($_POST["motDePasse"]);
    $mdp2 = inputVerify($_POST["ville"]);
    $image = inputVerify($_FILES["pp"]["name"]);
    $imagePath = '../inter/image/'.basename($image);
    $imageExtension = pathinfo($imagePath,PATHINFO_EXTENSION);
    
    $isUploadSuccess = true;
            if($imageExtension != "jpg" && $imageExtension != "png" && $imageExtension != "jpeg" && $imageExtension != "gif" ) 
            {
                $imageError = "Les fichiers autorises sont: .jpg, .jpeg, .png, .gif";
                $isUploadSuccess = false;
            }
            if(file_exists($imagePath)) 
            {
                $imageError = "Le fichier existe deja";
                $isUploadSuccess = false;
            }
            if($_FILES["pp"]["size"] > 500000) 
            {
                $imageError = "Le fichier ne doit pas depasser les 500KB";
                $isUploadSuccess = false;
            }
            if($isUploadSuccess) 
            {
                if(!move_uploaded_file($_FILES["pp"]["tmp_name"], $imagePath)) 
                {
                    $imageError = "Il y a eu une erreur lors de l'upload de votre photo";
                    $isUploadSuccess = false;
                } 
            } 
    
    if($isUploadSuccess){
        $db = Database::connect();
        $statement = $db->prepare("INSERT INTO users_tables (nom,email,mot_de_passe,photo,ville) VALUES(?, ?, ?, ?, ?)");
        $statement->execute(array($nom,$mail,$mdp,$image,$mdp2));
        Database::disconnect();
        header("location:index.php");
    }
    
}

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
<meta charset="utf-8" />
<title>Inscrivez vous - The Online City Hall</title>
<meta content="width=device-width, initial-scale=1.0" name="viewport" />
<meta name="description"  content="Educo"/>
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
<?php include "scripts/header.php"; ?>
<!--header end -->
<!--Breadcrumb start-->
<div class="ed_pagetitle" data-stellar-background-ratio="0.5" data-stellar-vertical-offset="0" style="background-image: url(http://placehold.it/921X533);">
<div class="ed_img_overlay"></div>
	<div class="container">
		<div class="row">
			<div class="col-lg-6 col-md-4 col-sm-6">
				<div class="page_title">
					<h2>Création de compte</h2>
				</div>
			</div>
			<div class="col-lg-6 col-md-8 col-sm-6">
				<ul class="breadcrumb">
					<li><a href="index.php">Accueil</a></li>
					<li><i class="fa fa-chevron-left"></i></li>
					<li><a href="signup.php">S'inscrire</a></li>
				</ul>
			</div>
		</div>
	</div>
</div>
<!--Breadcrumb end-->
<div class="ed_transprentbg ed_toppadder80 ed_bottompadder80">
	<div class="container">
		<div class="row">
			<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 col-lg-offset-3 col-md-offset-3">
				<div class="ed_teacher_div">
					<div class="ed_heading_top">
						<h3>Inscris toi maintenant !</h3>
					</div>
					<form class="ed_contact_form ed_toppadder40"  method="post" enctype="multipart/form-data">
						<div class="form-group">
							<label class="control-label">Votre nom d'utlisateur:</label>
							<input type="text" name="username" required="" class="form-control">
						</div>
						<div class="form-group">
							<label class="control-label">Votre Email :</label>
							<input type="email" name="usermail" required="" class="form-control">
						</div>
						<div class="form-group">
							<label class="control-label">Votre mot de passe :</label>
							<input type="password" name="motDePasse" required="" class="form-control">
						</div>
						<div class="form-group">
							<label class="control-label">Votre ville:</label>
							<input type="text" name="ville" required="" class="form-control">
						</div>
						<div class="form-group">
							<label class="control-label">Charger votre photo de profil:</label>
							<input type="file" name="pp" required="" class="form-control">
							<div style="color:red;font-style:italic;">
								<?php echo $imageError; ?>
							</div>
							
						</div>
						<input type="submit" class="btn ed_btn ed_orange pull-right" value="Valider">
					</form>
				</div>
				
			</div>
		</div>
	</div>
</div>
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