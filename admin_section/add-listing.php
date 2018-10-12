<?php 

require "database.php";
$titre = $desc = $imageError = $felicitations ="";
function inputVerify($var){

    $var = trim($var);
    $var = htmlspecialchars($var);
    $var = stripslashes($var);

    return $var;
}

if (!empty($_POST)) {
    $titre = inputVerify($_POST["titre"]);
    $desc = inputVerify($_POST["desc"]);
    $image = inputVerify($_FILES["pp"]["name"]);
    $imagePath = '../inter/image/'.basename($image);
    $imageExtension = pathinfo($imagePath,PATHINFO_EXTENSION);
    
    $isUploadSuccess = true;
            if($imageExtension != "jpg" && $imageExtension != "png" && $imageExtension != "jpeg") 
            {
                $imageError = "Les fichiers autorises sont: .jpg, .jpeg, .png";
                $isUploadSuccess = false;
            }
            if(file_exists($imagePath)) 
            {
                $imageError = "Le fichier existe déjà, pensez à renommer le fichier";
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
                    $imageError = "Il y a eu une erreur lors de l'upload";
                    $isUploadSuccess = false;
                } 
            } 
    
    if($isUploadSuccess){
        $db = Database::connect();
        $statement = $db->prepare("INSERT INTO services_tables (titre,descr,photo) values(?, ?, ?)");
        $statement->execute(array($titre,$desc,$image));
        Database::disconnect();
        $felicitations = "Votre compte est maintenant actif";
    }
    
}

?>

<?php include "head.php"; ?>

<body class="fixed-nav sticky-footer" id="page-top">
  <!-- Navigation-->
  <?php include "side_menu.php"; ?>
  <!-- /Navigation-->
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Tableau de bord</a>
        </li>
        <li class="breadcrumb-item active">Ajouter service</li>
      </ol>
		<form action="" method="post" enctype="multipart/form-data">
            <div class="msg_good">
                <?php echo $felicitations; ?>
            </div>
		<div class="box_general padding_bottom">
			<div class="header_box version_2">
				<h2><i class="fa fa-file"></i>Informations basiques</h2>
			</div>
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label>Titre du service</label>
						<input type="text" class="form-control" name="titre" placeholder="Titre ..." required="">
					</div>
				</div>
			</div>
			<!-- /row-->
			<div class="row">
				<div class="col-md-12">
					<div class="form-group">
						<label>Image du service</label><br>
						<input type="file" name="pp" id="" required="" autocomplete="no">
						<div style="color:red;font-style:italic;">choisissez une image en format .jpg, .jpeg, .png</div>
					</div>
				</div>
			</div>
			<!-- /row-->
		</div>
		<!-- /box_general-->
		
		<div class="box_general padding_bottom">
			<div class="header_box version_2">
				<h2><i class="fa fa-file-text"></i>Description</h2>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="form-group">
						<label>description du service</label>
						<textarea rows="5" class="form-control" style="height:100px;" name="desc" placeholder="Description" required=""></textarea>
					</div>
				</div>
			</div>			
		<!-- /row-->
		</div>
			<button type="submit" class="btn btn-large btn-success btn_1 medium">Ajouter le service</button>
		</form>
	  </div>
      <div class="msg_erreur">
            <?php echo $imageError; ?>
      </div>
      
      
	  <!-- /.container-fluid-->
   	</div>
    <!-- /.container-wrapper-->
    <footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
          <small>Copyright © TOCH 2018</small>
        </div>
      </div>
    </footer>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>
    <!-- Logout Modal-->
    <?php include "deconnexion_modal.php" ?>
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Page level plugin JavaScript-->
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="vendor/datatables/jquery.dataTables.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.js"></script>
	<script src="vendor/jquery.selectbox-0.2.js"></script>
	<script src="vendor/retina-replace.min.js"></script>
	<script src="vendor/jquery.magnific-popup.min.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/admin.js"></script>
	<!-- Custom scripts for this page-->
	<script src="vendor/dropzone.min.js"></script>
	<script src="vendor/bootstrap-datepicker.js"></script>
	<script>$('input.date-pick').datepicker();</script>
	
</body>
</html>
