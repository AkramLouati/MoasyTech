<?php
include_once '../Model/Promotion.php';
include_once '../Controller/PromotionC.php';
include '../Controller/Produit_c.php';
include_once '../Model/Produit.php';

$error = "";

// create Promotion
$Promotion = null;
$Produit = null;
// create an instance of the controller
$Produit_c = new ProduitC();
$listec = $Produit_c->afficherProduit();
$PromotionC = new PromotionC();
if (
    isset($_POST["Id"]) &&
    isset($_POST["IMG"]) &&
    isset($_POST["Nom"]) &&
    isset($_POST["DateD"]) &&
    isset($_POST["DateF"]) &&
    isset($_POST["PrixA"]) &&
    isset($_POST["Remise"]) &&
    isset($_POST["PrixN"])
) {
    if (
        !empty($_POST["Id"]) &&
        !empty($_POST["IMG"]) &&
        !empty($_POST['Nom']) &&
        !empty($_POST["DateD"]) &&
        !empty($_POST["DateF"]) &&
        !empty($_POST["PrixA"]) &&
        !empty($_POST["Remise"]) &&
        !empty($_POST["PrixN"])
    ) {
        $Promotion = new Promotion(
            $_POST['Id'],
            $_POST['IMG'],
            $_POST['Nom'],
            $_POST['DateD'],
            $_POST['DateF'],
            $_POST['PrixA'],
            $_POST['Remise'],
            $_POST['PrixN']
        );
        $PromotionC->modifierPromotion($Promotion, $_POST["Id"]);
        header('Location:gestion des promotions.php');
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Gstore</title>
    <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css" />
    <link rel="stylesheet" href="assets/vendors/flag-icon-css/css/flag-icon.min.css" />
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css" />
    <link rel="stylesheet" href="assets/vendors/font-awesome/css/font-awesome.min.css" />
    <link rel="stylesheet" href="assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css" />
    <link rel="stylesheet" href="assets/css/style.css" />
    <!-- ICON -->
    <link rel="shortcut icon" href="" />
    <!-- ICON -->
    <script src="../Controller/scriptP.js"></script>
</head>

<body>
    <div class="container-scroller">
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
            <div class="text-center sidebar-brand-wrapper d-flex align-items-center">
                <a class="sidebar-brand brand-logo" href="acceuil.php"><img src="assets/images/glammm.png" alt="logo" /></a>
                <a class="sidebar-brand brand-logo-mini pl-4 pt-3" href="acceuil.php"><img src="assets/images/glammm.png" alt="logo" /></a>
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
                    <a class="nav-link" href="acceuil.php">
                        <i class="mdi mdi-home menu-icon"></i>
                        <span class="menu-title">Acceuil</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="gestion des clients.php">
                        <i class="mdi mdi-account-multiple
 menu-icon"></i>
                        <span class="menu-title">Gestion des clients</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="gestion des produits.php">
                        <i class="mdi mdi-shopping
 menu-icon"></i>
                        <span class="menu-title">Gestion des produits</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="gestion des commandes.php">
                        <i class="mdi mdi-tag-outline
 menu-icon"></i>
                        <span class="menu-title">Gestion des commandes</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="gestion des livraisons.php">
                        <i class="mdi mdi-truck-delivery menu-icon"></i>
                        <span class="menu-title">Gestion des livraisons</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="gestion des Promotions.php">
                        <i class="mdi mdi-calendar-text
 menu-icon"></i>
                        <span class="menu-title">Gestion des promotions</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="gestion des reclamations.php">
                        <i class="mdi mdi-thumb-down
 menu-icon"></i>
                        <span class="menu-title">Gestion des reclamations</span>
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
                    <a class="navbar-brand brand-logo-mini align-self-center d-lg-none" href="acceuil.php"><img src="assets/images/logo-mini.svg" alt="logo" /></a>
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
                        <!--TAF-->

                        <h3 class="mb-0" style="color:rgb(131, 41, 148)">Ajouter une promotion<span class="pl-0 h6 pl-sm-2 text-muted d-inline-block"></span>
                        </h3>
                        <div class="d-flex">
                            <button type="button" class="btn btn-sm bg-white btn-icon-text border">
                                <i class="mdi mdi-email btn-icon-prepend"></i> Email </button>
                            <button type="button" class="btn btn-sm bg-white btn-icon-text border ml-3">
                                <i class="mdi mdi-printer btn-icon-prepend"></i> Print </button>


                            <button type="button" class="btn btn-sm ml-3 btn-success"><a href="gestion des promotions.php">Retour Gestion Des Promotions</a></button>
                        </div>
                    </div>

                    <?php
                    if (isset($_POST['Id'])) {
                        $Promotion = $PromotionC->recupererPromotion($_POST['Id']);

                    ?>
                        <div class="content-wrapper">
                            <div class="row">
                                <div class="col-lg-12 grid-margin stretch-card">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <form action="" method="POST" onsubmit="return Validation()">
                                                    <table class="table table-striped" align="center">
                                                        <tr>
                                                            <th style="color:rgb(131, 41, 148)">ID</th>
                                                            <td><input readonly type="text" name="Id" id="Id" value="<?php echo $Promotion['Id']; ?>" maxlength="20">
                                                                <span id="IdP" class="text-danger font-weight-bold"> </span>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th style="color:rgb(131, 41, 148)">Image</th>
                                                            <td><?php echo "<img src='IMG/" . $Promotion['IMG'] . "' >"; ?></td>
                                                            <td><input type="file" name="IMG" id="IMG" accept="image/*">
                                                                <span id="IMGP" class="text-danger font-weight-bold"> </span>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th style="color:rgb(131, 41, 148)">Nom</th>
                                                            <td>
                                                                <div class="input-group mb-3">
                                                                    <select onchange="GetSelect()" class="custom-select col-xl-9 col-lg-8 col-md-8 col-sm-7" name="Nom" id="selectP">
                                                                        <option selected><?php echo $Promotion['Nom']; ?></option>
                                                                        <?php
                                                                        foreach ($listec as $Produit) {
                                                                        ?>
                                                                            <option><?php echo $Produit['libelle']; ?> <?php } ?></option>
                                                                    </select>
                                                                </div>
                                                                <div class="input-group mb-3">
                                                                    <input type="text" hidden readonly name="Nom" id="Nom" maxlength="20" value="<?php echo $Promotion['Nom']; ?>">
                                                                </div>
                                                                <span id="NomP" class="text-danger font-weight-bold"> </span>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th style="color:rgb(131, 41, 148)">Date Debut</th>
                                                            <td><input type="date" name="DateD" id="DateD" value="<?php echo $Promotion['DateD']; ?>">
                                                                <span id="DateDP" class="text-danger font-weight-bold"> </span>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th style="color:rgb(131, 41, 148)">Date Fin</th>
                                                            <td><input type="date" onclick="minDtate()" name="DateF" id="DateF" value="<?php echo $Promotion['DateF']; ?>">
                                                                <span id="DateFP" class="text-danger font-weight-bold"> </span>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th style="color:rgb(131, 41, 148)">Ancien Prix</th>
                                                            <td onchange="Equation()"><input type="number" step="any" name="PrixA" id="PrixA" value="<?php echo $Promotion['PrixA']; ?>">
                                                                <span id="PrixAP" class="text-danger font-weight-bold"> </span>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th style="color:rgb(131, 41, 148)">Remise</th>
                                                            <td onchange="Equation()"><input type="number" step="any" name="Remise" id="Remise" value="<?php echo $Promotion['Remise']; ?>">
                                                                <span id="RemiseP" class="text-danger font-weight-bold"> </span>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th style="color:rgb(131, 41, 148)">Nouveau Prix</th>
                                                            <td><input type="number" step="any" name="PrixN" id="PrixN" value="<?php echo $Promotion['PrixN']; ?>" readonly></td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <input type="submit" value="Modifier">
                                                                <input type="reset" value="Annuler">
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </form>
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
                            <footer class="footer">
                                <div class="d-sm-flex justify-content-center justify-content-sm-between">
                                    <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"></span>
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
            <script src="assets/vendors/flot/jquery.flot.Produits.js"></script>
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

        <?php
                    }
        ?>

</body>

</html>