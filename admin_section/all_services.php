<?php include "head.php"; ?>
<?php require "database.php";  ?>
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
        <li class="breadcrumb-item active">Services disponibles</li>
      </ol>
		<div class="box_general">
			<div class="header_box">
				<h2 class="d-inline-block">Listes des services disponibles sur le site</h2>
			</div>
			<div class="list_general">
				<ul>
				<?php

						$bdd = Database::connect() ;
						
						$reponse = $bdd->query('SELECT * FROM services_tables');
						while ($donnees = $reponse->fetch()) {
                  
        ?>
					<li>
						<figure><img src="../inter/image/<?= $donnees["photo"] ?>" alt="img"></figure>
						
						<h4>
							<?php echo $donnees['titre']; ?>
						</h4>
						<p>
							<?php echo $donnees['descr'] ?>
						</p>
                <p>
                  <button type="submit" class="btn_1 gray"><i class="fa fa-fw fa-eye"></i>Modifier</button>
                </p>
                <ul class="buttons">
                    <li>
                      <button type="submit" class="btn_1 gray delete wishlist_close"><i class="fa fa-fw fa-times-circle-o"></i> Supprimer</button>
                    </li>
                </ul>
            
						
						
					</li>
				<?php 
				}
					Database::disconnect();
				?>
				</ul>
			</div>
		</div>
		<!-- /box_general-->
		<nav aria-label="...">
			<ul class="pagination pagination-sm add_bottom_30">
				<li class="page-item disabled">
					<a class="page-link" href="#" tabindex="-1">Previous</a>
				</li>
				<li class="page-item"><a class="page-link" href="#">1</a></li>
				<li class="page-item"><a class="page-link" href="#">2</a></li>
				<li class="page-item"><a class="page-link" href="#">3</a></li>
				<li class="page-item">
					<a class="page-link" href="#">Next</a>
				</li>
			</ul>
		</nav>
		<!-- /pagination-->
	  </div>
	  <!-- /container-fluid-->
   	</div>
    <!-- /container-wrapper-->
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
	
</body>
</html>
