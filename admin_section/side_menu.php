 <!-- Navigation-->
 <nav class="navbar navbar-expand-lg navbar-dark bg-default fixed-top" id="mainNav">
    <a class="navbar-brand" href="index.php"><img src="img/logo.png" data-retina="true" alt="" width="163" height="36"></a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Tableau de bord">
          <a class="nav-link" href="index.php">
            <i class="fa fa-fw fa-dashboard"></i>
            <span class="nav-link-text">Tableau de bord</span>
          </a>
        </li>
		<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Mailing">
          <a class="nav-link" href="messages.php">
            <i class="fa fa-fw fa-envelope-open"></i>
            <span class="nav-link-text">Mailing</span>
          </a>
        </li>
		<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Services demandés">
          <a class="nav-link" href="courses.php">
            <i class="fa fa-fw fa-archive"></i>
            <span class="nav-link-text">Services demandés</span>
          </a>
        </li>
		<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Tous les services">
          <a class="nav-link" href="tables.php">
            <i class="fa fa-fw fa-star"></i>
            <span class="nav-link-text">Tous les services</span>
          </a>
        </li>
		<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Statistiques">
          <a class="nav-link" href="charts.php">
            <i class="fa fa-fw fa-heart"></i>
            <span class="nav-link-text">Statistiques</span>
          </a>
        </li>
		<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Ajouter service">
          <a class="nav-link" href="add-listing.php">
            <i class="fa fa-fw fa-plus-circle"></i>
            <span class="nav-link-text">Ajouter service</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Gestion d'admin">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseProfile" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-wrench"></i>
            <span class="nav-link-text">Gestion d'admin</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseProfile">
            <!-- <li>
              <a href="teacher-profile.php">Ajouter un admin</a>
            </li> -->
            <li>
              <a href="bookmarks.php">Voir les admins</a>
            </li>
            <li>
              <a href="all_services.php">Services disponibles</a>
            </li>
            
          </ul>
        </li>

      </ul>
      <ul class="navbar-nav sidenav-toggler">
        <li class="nav-item">
          <a class="nav-link text-center" id="sidenavToggler">
            <i class="fa fa-fw fa-angle-left"></i>
          </a>
        </li>
      </ul>

      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <form class="form-inline my-2 my-lg-0 mr-lg-2">
            <div class="input-group">
              <input class="form-control search-top" type="text" placeholder="Recherchez ici ...">
              <span class="input-group-btn">
                <button class="btn btn-primary" type="button">
                  <i class="fa fa-search"></i>
                </button>
              </span>
            </div>
          </form>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
            <i class="fa fa-fw fa-sign-out"></i>Deconnecter</a>
        </li>
      </ul>
    </div>
  </nav>
  <!-- /Navigation-->