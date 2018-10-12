<header id="ed_header_wrapper">
    <div class="ed_header_top">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12">
			<p>Bienvenue <?php echo $_SESSION['nom']; ?></p>
			<div class="ed_info_wrapper">
				<a href="logout.php" id="login_button">Deconnexion</a>
			</div>
		  </div>
		</div>
	  </div>
	</div>
	<div class="ed_header_bottom">
      <div class="container">
        <div class="row">
          <div class="col-lg-2 col-md-2 col-sm-2">
            <div class="educo_logo"> <a href="index.php"><img src="images/header/Logo.png" alt="logo" /></a> </div>
          </div>
          <div class="col-lg-8 col-md-8 col-sm-8">
			<div class="edoco_menu_toggle navbar-toggle" data-toggle="collapse" data-target="#ed_menu">Menu <i class="fa fa-bars"></i>
			</div>
          <div class="edoco_menu">
            <ul class="collapse navbar-collapse" id="ed_menu">
              <li><a href="dashboard.php">Accueil</a>
				
			  </li>
			  <li><a href="blog_med.php">A propos</a></li>
              <li><a href="contact.php">Contacts</a></li>
            </ul>
          </div>
          </div>
		   <div class="col-lg-2 col-md-2 col-sm-2">
            <div class="educo_call"><i class="fa fa-phone"></i><a href="#">+225 09483463</a></div>
          </div>
        </div>
      </div>
    </div>	
  </header>