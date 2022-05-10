<?PHP
include "../core/livreurC.php";
include "../entities/livreur.php";
	
$error = "";



$livreur = null;


$livreurC = new livreurC();





if (
	isset($_POST['idL']) 
	&& isset($_POST['login']) 
	&& isset($_POST['nom']) 
	&& isset($_POST['prenom'])
	 && isset($_POST['dispo'])
	 && isset($_POST['secteur'])
	 && isset($_POST['tel'])
	 && isset($_POST['date_naiss'])
	 && isset($_POST['mail'])
	 && isset($_POST['adresse'])
	 && isset($_POST['mdp'])
	 && isset($_POST['num_permis'])
){
	if (
		!empty($_POST['idL']) &&
		!empty($_POST['login']) &&
		!empty($_POST['nom']) &&
		!empty($_POST['prenom']) &&
		!empty($_POST['dispo']) &&
		!empty($_POST['secteur']) &&
		!empty($_POST['tel']) &&
		!empty($_POST['date_naiss']) &&
		!empty($_POST['mail']) &&
		!empty($_POST['adresse']) &&
		!empty($_POST['mdp']) &&
		!empty($_POST['num_permis'])
	) {
		$livreur = new livreur(
			$_POST['idL'],
			$_POST['login'], 
			$_POST['nom'],
			$_POST['prenom'],
			$_POST['dispo'],
			$_POST['secteur'],
			$_POST['tel'],
			$_POST['date_naiss'],
			$_POST['mail'],
			$_POST['adresse'],
			$_POST['mdp'],
			$_POST['img']
		);
		
		$livreurC->modifierlivreur($livreur, $_GET['idL']);
		header('Location:Afficherlivreur.php');
	}
	else
		$error = "Missing information";
}
	
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Breeze Admin</title>
    <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css" />
    <link rel="stylesheet" href="assets/vendors/flag-icon-css/css/flag-icon.min.css" />
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css" />
    <link rel="stylesheet" href="assets/vendors/font-awesome/css/font-awesome.min.css" />
    <link rel="stylesheet" href="assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css" />
    <link rel="stylesheet" href="assets/css/style.css" />
    <link rel="shortcut icon" href="assets/images/favicon.png" />
  </head>
  <body>
    <div class="container-scroller">
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <div class="text-center sidebar-brand-wrapper d-flex align-items-center">
          <a class="sidebar-brand brand-logo" href="index.html"><img src="assets/images/glammm.png" alt="logo" /></a>
          <a class="sidebar-brand brand-logo-mini pl-4 pt-3" href="index.html"><img src="assets/images/glammm.png" alt="logo"/></a>
        </div>
        <tr></tr>
        <ul class="nav">
          <li class="nav-item nav-profile">
          
          </li>
        </li>
        <br>
        <br>
        <br>


          <li class="nav-item">
            <a class="nav-link" href="acceuil.html">
              <i class="mdi mdi-home menu-icon"></i>
              <span class="menu-title">Acceuil</span>
            </a>
          </li>
           <li class="nav-item">
            <a class="nav-link" href="gestion des clients.html">
              <i class="mdi mdi-account-multiple
 menu-icon"></i>
              <span class="menu-title">Gestion des clients</span>
            </a>
          </li>
            <li class="nav-item">
            <a class="nav-link" href="afficherproduit.php">
              <i class="mdi mdi-shopping
 menu-icon"></i>
              <span class="menu-title">Gestion des produits</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="gestion des commandes.html">
              <i class="mdi mdi-tag-outline
 menu-icon"></i>
              <span class="menu-title">Gestion des commandes</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="gestion des livraisons.html">
              <i class="mdi mdi-truck-delivery menu-icon"></i>
              <span class="menu-title">Gestion des livraisons</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="gestion des evenements.html">
              <i class="mdi mdi-calendar-text
 menu-icon"></i>
              <span class="menu-title">Gestion des promortions</span>
            </a>
          </li>
           <li class="nav-item">
            <a class="nav-link" href="gestion des reclamations.html">
              <i class="mdi mdi-thumb-down
 menu-icon"></i>
              <span class="menu-title">Gestion des réclamations</span>
            </a>
          </li>
        
          <li class="nav-item sidebar-actions">
            <div class="nav-link">
              <div class="mt-4">
                <div class="border-none">
                  <p class="text-black">Notification</p>
                </div>
                <ul class="mt-4 pl-0">
                  <li>Sign Out</li>
                </ul>
              </div>
            </div>
          </li>
        </ul>
      </nav>
      <div class="container-fluid page-body-wrapper">
        <div id="theme-settings" class="settings-panel">
          <i class="settings-close mdi mdi-close"></i>
          <p class="settings-heading">SIDEBAR SKINS</p>
          <div class="sidebar-bg-options selected" id="sidebar-default-theme">
            <div class="img-ss rounded-circle bg-light border mr-3"></div> Default
          </div>
          <div class="sidebar-bg-options" id="sidebar-dark-theme">
            <div class="img-ss rounded-circle bg-dark border mr-3"></div> Dark
          </div>
          <p class="settings-heading mt-2">HEADER SKINS</p>
          <div class="color-tiles mx-0 px-4">
            <div class="tiles light"></div>
            <div class="tiles dark"></div>
          </div>
        </div>
        <nav class="navbar col-lg-12 col-12 p-lg-0 fixed-top d-flex flex-row">
          <div class="navbar-menu-wrapper d-flex align-items-stretch justify-content-between">
            <a class="navbar-brand brand-logo-mini align-self-center d-lg-none" href="index.html"><img src="assets/images/logo-mini.svg" alt="logo" /></a>
            <button class="navbar-toggler navbar-toggler align-self-center mr-2" type="button" data-toggle="minimize">
              <i class="mdi mdi-menu"></i>
            </button>
            <ul class="navbar-nav">
              <li class="nav-item dropdown">
                <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown">
                  <i class="mdi mdi-bell-outline"></i>
                  <span class="count count-varient1">7</span>
                </a>
                <div class="dropdown-menu navbar-dropdown navbar-dropdown-large preview-list" aria-labelledby="notificationDropdown">
                  <h6 class="p-3 mb-0">Notifications</h6>
                  <a class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                      <img src="assets/images/faces/face4.jpg" alt="" class="profile-pic" />
                    </div>
                    <div class="preview-item-content">
                      <p class="mb-0"> Dany Miles <span class="text-small text-muted">commented on your photo</span>
                      </p>
                    </div>
                  </a>
                  <a class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                      <img src="assets/images/faces/face3.jpg" alt="" class="profile-pic" />
                    </div>
                    <div class="preview-item-content">
                      <p class="mb-0"> James <span class="text-small text-muted">posted a photo on your wall</span>
                      </p>
                    </div>
                  </a>
                  <a class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                      <img src="assets/images/faces/face2.jpg" alt="" class="profile-pic" />
                    </div>
                    <div class="preview-item-content">
                      <p class="mb-0"> Alex <span class="text-small text-muted">just mentioned you in his post</span>
                      </p>
                    </div>
                  </a>
                  <div class="dropdown-divider"></div>
                  <p class="p-3 mb-0">View all activities</p>
                </div>
              </li>
              <li class="nav-item dropdown d-none d-sm-flex">
                <a class="nav-link count-indicator dropdown-toggle" id="messageDropdown" href="#" data-toggle="dropdown">
                  <i class="mdi mdi-email-outline"></i>
                  <span class="count count-varient2">5</span>
                </a>
                <div class="dropdown-menu navbar-dropdown navbar-dropdown-large preview-list" aria-labelledby="messageDropdown">
                  <h6 class="p-3 mb-0">Messages</h6>
                  <a class="dropdown-item preview-item">
                    <div class="preview-item-content flex-grow">
                      <span class="badge badge-pill badge-success">Request</span>
                      <p class="text-small text-muted ellipsis mb-0"> Suport needed for user123 </p>
                    </div>
                    <p class="text-small text-muted align-self-start"> 4:10 PM </p>
                  </a>
                  <a class="dropdown-item preview-item">
                    <div class="preview-item-content flex-grow">
                      <span class="badge badge-pill badge-warning">Invoices</span>
                      <p class="text-small text-muted ellipsis mb-0"> Invoice for order is mailed </p>
                    </div>
                    <p class="text-small text-muted align-self-start"> 4:10 PM </p>
                  </a>
                  <a class="dropdown-item preview-item">
                    <div class="preview-item-content flex-grow">
                      <span class="badge badge-pill badge-danger">Projects</span>
                      <p class="text-small text-muted ellipsis mb-0"> New project will start tomorrow </p>
                    </div>
                    <p class="text-small text-muted align-self-start"> 4:10 PM </p>
                  </a>
                  <h6 class="p-3 mb-0">See all activity</h6>
                </div>
              </li>
              <li class="nav-item nav-search border-0 ml-1 ml-md-3 ml-lg-5 d-none d-md-flex">
                <form class="nav-link form-inline mt-2 mt-md-0">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search" />
                    <div class="input-group-append">
                      <span class="input-group-text">
                        <i class="mdi mdi-magnify"></i>
                      </span>
                    </div>
                  </div>
                </form>
              </li>
            </ul>
            <ul class="navbar-nav navbar-nav-right ml-lg-auto">
              <li class="nav-item dropdown d-none d-xl-flex border-0">
                <a class="nav-link dropdown-toggle" id="languageDropdown" href="#" data-toggle="dropdown">
                  <i class="mdi mdi-earth"></i> English </a>
                <div class="dropdown-menu navbar-dropdown" aria-labelledby="languageDropdown">
                  <a class="dropdown-item" href="#"> French </a>
                  <a class="dropdown-item" href="#"> Spain </a>
                  <a class="dropdown-item" href="#"> Latin </a>
                  <a class="dropdown-item" href="#"> Japanese </a>
                </div>
              </li>
              <li class="nav-item nav-profile dropdown border-0">
                <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-toggle="dropdown">
                  <span class="profile-name">Glam Store</span>
                </a>
                <div class="dropdown-menu navbar-dropdown w-100" aria-labelledby="profileDropdown">
                  <a class="dropdown-item" href="#">
                    <i class="mdi mdi-cached mr-2 text-success"></i> Activity Log </a>
                  <a class="dropdown-item" href="#">
                    <i class="mdi mdi-logout mr-2 text-primary"></i> Signout </a>
                </div>
              </li>
            </ul>
            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
              <span class="mdi mdi-menu"></span>
            </button>
          </div>
        </nav>
        <div class="main-panel">
          <div class="content-wrapper pb-0">
            <div class="page-header flex-wrap">
              <h3 class="mb-0"> Gestion des produits <span class="pl-0 h6 pl-sm-2 text-muted d-inline-block"></span>
              </h3>
              <div class="d-flex">
                <button type="button" class="btn btn-sm bg-white btn-icon-text border">
                  <i class="mdi mdi-email btn-icon-prepend"></i> Email </button>
                <button type="button" class="btn btn-sm bg-white btn-icon-text border ml-3">
                  <i class="mdi mdi-printer btn-icon-prepend"></i> Print </button>
                <button type="button" class="btn btn-sm ml-3 btn-success"> Add User </button>
              </div>
            </div>
            <div class="content-wrapper">
           
            <div class="row">
          
              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped">
                        <thead>
                          <tr>

                          </tr>
                        </thead>
                        <tbody>
                        <form action="" method="POST">
						<div>
        <label for="login">Login:</label>
        <input type="text" id="login" name="login">
    </div>

    <div>
        <label for="cin">CIN :</label>
        <input type="text" id="cin" name="cin">
    </div>

	<div>
        <label for="nom">Nom :</label>
        <input type="text" id="nom" name="nom">
    </div>

	<div>
        <label for="prenom">Prenom :</label>
        <input type="text" id="prenom" name="prenom">
    </div>

	<div>
        <label for="dispo">Disponibilité :</label>
        <input type="text" id="dispo" name="dispo">
    </div>

	<div>
        <label for="secteur">Secteur :</label>
        <input type="text" id="secteur" name="secteur">
    </div>

	<div>
        <label for="tel">Tel :</label>
        <input type="text" id="tel" name="tel">
    </div>

	<div>
        <label for="date_naiss">Date de naissance :</label>
        <input type="date" id="prenom" name="prenom">
    </div>

	<div>
        <label for="prenom">Mail :</label>
        <input type="text" id="prenom" name="prenom">
    </div>

	<div>
        <label for="adresse">Adresse :</label>
        <input type="text" id="adresse" name="adresse">
    </div>

	<div>
        <label for="mdp">Mot de passe:</label>
        <input type="password" id="mdp" name="mdp">
    </div>

	<div>
        <label for="num_permis">Numero permis :</label>
        <input type="text" id="num_permis" name="num_permis">
    </div>
	
                                <input type="submit" class="btn" value="Envoyer">
                                <input type="reset" class="btn" value="Annuler">
                            </form>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-12 grid-margin stretch-card">
               
              </div>
              <div class="col-lg-12 grid-margin stretch-card">
            
              </div>
              <div class="col-lg-12 stretch-card">
           
              </div>
            </div>
          </div>
          
       
          </div>
          <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
              <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © bootstrapdash.com 2020</span>
              <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> Free <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap dashboard template</a> from Bootstrapdash.com</span>
            </div>
          </footer>
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="assets/vendors/chart.js/Chart.min.js"></script>
    <script src="assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
    <script src="assets/vendors/flot/jquery.flot.js"></script>
    <script src="assets/vendors/flot/jquery.flot.resize.js"></script>
    <script src="assets/vendors/flot/jquery.flot.categories.js"></script>
    <script src="assets/vendors/flot/jquery.flot.fillbetween.js"></script>
    <script src="assets/vendors/flot/jquery.flot.stack.js"></script>
    <script src="assets/vendors/flot/jquery.flot.pie.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="assets/js/off-canvas.js"></script>
    <script src="assets/js/hoverable-collapse.js"></script>
    <script src="assets/js/misc.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="assets/js/dashboard.js"></script>
    <!-- End custom js for this page -->
  </body>
</html>