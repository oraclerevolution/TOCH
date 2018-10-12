<?php include "head.php"; ?>
<?php require "database.php";  ?>

<?php
if (!empty($_GET['id'])) 
  {  $id = checkInput($_GET['id']);

        $db = Database::connect();
        $statement = $db->query('SELECT * FROM services_tables where id ='.$id);
        $item = $statement->fetch();
    
    } 

if(!empty($_POST)) 
    {
      $titre = checkInput($_POST["titre"]);
	    $desc = checkInput($_POST["desc"]);
	    $photo = checkInput($_FILES["pp"]["name"]);
	    $imagePath = '../inter/image/'.basename($photo);
	    $imageExtension = pathinfo($imagePath,PATHINFO_EXTENSION);
      $isSuccess = true;
        
      
         if(empty($titre)) 
        {
            // $isSuccess = false;
            $titre = $item['titre'];
        }

         if(empty($desc)) 
        {
            // $isSuccess = false;
            $desc = $item['descr'];
        }
      
         if(empty($photo)) 
        {
            // $isSuccess = false;
            $photo = $item['photo'];
        }
        
        if($isSuccess)
        {
            $db = Database::connect();
            $statement = $db->prepare("UPDATE services_tables set titre = ?, descr = ?, photo = ? where id= ?");
            $statement->execute(array($titre,$desc,$photo,$id));
            Database::disconnect();
            header("Location: all_services.php");
        }
    }

    function checkInput($data) 
    {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    } 


		$imageError = $felicitations = "";
 ?>
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
        <li class="breadcrumb-item active">Modifier le service</li>
      </ol>
		<form method="post" enctype="multipart/form-data">
            <div class="msg_good">
                
            </div>
		<div class="box_general padding_bottom">
			<div class="header_box version_2">
				<h2><i class="fa fa-file"></i>Modifiez les informations basiques</h2>
			</div>
			<div class="row">
				<div class="image_pp">
					
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label>Titre du service</label>
						<input type="text" class="form-control" name="titre" placeholder="Titre ..." required="" value="<?php echo $item['titre'];?>">
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
				<h2><i class="fa fa-file-text"></i>Modifiez la description</h2>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="form-group">
						<label>nouvelle description du service</label>
						<textarea rows="5" class="form-control" style="height:100px;" name="desc" placeholder="Description" required="">
							<?php echo $item['descr'];?>
						</textarea>
					</div>
				</div>
			</div>			
		<!-- /row-->
		</div>
			<button type="submit" class="btn btn-large btn-success btn_1 medium">Modifier le service</button>
		</form>
	  </div>
      <div class="msg_erreur">
            
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
