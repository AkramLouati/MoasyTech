<?php
session_start();
?>
  <?php

  include 'C:\xampp\htdocs\user\controller\usercontroller.php';
  include 'C:\xampp\htdocs\user\model\user.php'; 
  

 // Google reCAPTCHA API keys settings 
 $secretKey  = '6Lf0R7gfAAAAAJV2bjU3mE1iOE-Qf5bPvICYybJe'; 
  
 // Email settings 

 // If the form is submitted 
 $postData = $statusMsg = ''; 
 $status = 'error'; 
 if(isset($_POST['submit']))
 { 
     $postData = $_POST; 
      
     // Validate form input fields 
     if(!empty($_POST['username']) && !empty($_POST['mdp'])){ 
          
         // Validate reCAPTCHA checkbox 
         if(isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response']))
         { 
  
             // Verify the reCAPTCHA API response 
             $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secretKey.'&response='.$_POST['g-recaptcha-response']); 
              
             // Decode JSON data of API response 
             $responseData = json_decode($verifyResponse); 
              
             // If the reCAPTCHA API response is valid 
             if($responseData->success){ 
               
                if (isset($_POST['username']) and isset($_POST['mdp'])) {

                    $user = new user();
                    $userl = $user->login($_POST['username'], $_POST['mdp']);
                
                
                
                    if ($userl != null) {
                        $_SESSION["connectedUsername"] = $_POST['username'];
                    
                
                        if ($userl->rolee == "client"){
                              header('Location:  profile.php');
                        }
                          
                        else{
                             header('Location: ../back/template/gestion_des_clients.php');
                        }
                           
                
                    } else {
                        header('Location:   index.php');
                    }
                 } else {
                    echo "verifier les champs";
                }
            
                 $status = 'success'; 
                 $statusMsg = 'Thank you! Your contact request has been submitted successfully.'; 
                 $postData = ''; 
                
             }else{ 
                 $statusMsg = 'Robot verification failed, please try again.'; 
             } 
         }else{ 
             $statusMsg = 'Please check the reCAPTCHA checkbox.'; 
         } 
     }else{ 
         $statusMsg = 'Please fill all the mandatory fields.'; 
     } 
 } 
 if (isset($_SESSION["connectedUsername"]))
 var_dump($_SESSION["connectedUsername"]);

if (isset($_SESSION["connectedUsername"]))
echo $_SESSION["connectedUsername"]; 
 ?>
  <?php

?>
<!doctype html>
<html lang="zxx">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>pillloMart</title>
    <link rel="icon" href="img/favicon.png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- animate CSS -->
    <link rel="stylesheet" href="css/animate.css">
    <!-- owl carousel CSS -->
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <!-- font awesome CSS -->
    <link rel="stylesheet" href="css/all.css">
    <!-- flaticon CSS -->
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/themify-icons.css">
    <!-- font awesome CSS -->
    <link rel="stylesheet" href="css/magnific-popup.css">
    <!-- swiper CSS -->
    <link rel="stylesheet" href="css/slick.css">
    <!-- style CSS -->
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <!--::header part start::-->
    <header class="main_menu home_menu">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-12">
                    <nav class="navbar navbar-expand-lg navbar-light">
                        <a class="navbar-brand" href="index.php"> <img src="img/99.png" alt="logo"> </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="menu_icon"><i class="fas fa-bars"></i></span>
                        </button>

                        <div class="collapse navbar-collapse main-menu-item" id="navbarSupportedContent">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                             <a class="nav-link" href="index.php">Acceuil</a>
                                </li>
                             
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="blog.php" id="navbarDropdown_1"
                                        role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Produits
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown_1">
                                        <a class="dropdown-item" href="product_list.php"> product list</a>
                                        <a class="dropdown-item" href="single-product.php">product details</a>
                                        
                                    </div>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="blog.php" id="navbarDropdown_3"
                                        role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        à propos
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown_2">
                                        
                                        <a class="dropdown-item" href="checkout.php">product checkout</a>
                                        <a class="dropdown-item" href="cart.php">shopping cart</a>
                                        <a class="dropdown-item" href="confirmation.php">confirmation</a>
                                        <a class="dropdown-item" href="elements.php">elements</a>
                                        <a class="dropdown-item" href="compte.php">new account</a>
                                    </div>
                                </li>
                                
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="blog.php" id="navbarDropdown_2"
                                        role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        blog
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown_2">
                                        <a class="dropdown-item" href="blog.php"> blog</a>
                                        <a class="dropdown-item" href="single-blog.php">Single blog</a>
                                    </div>
                                </li>
                                
                                <li class="nav-item">
                                    <a class="nav-link" href="contact.php">Contact</a>
                                </li>  <?php
                                if (isset($_SESSION["connectedUsername"])) {
                                    ?>
                                   <li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>
                                <?php
                            } else {
                                ?>
 <li class="nav-item"><a class="nav-link" href="login.php">Login</a></li>
                                <?php  } ?>
                               
                            </ul>
                        </div>
                        <div class="hearer_icon d-flex align-items-center">
                            <a id="search_1" href="javascript:void(0)"><i class="ti-search"></i></a>
                            <a href="cart.php">
                                <i class="flaticon-shopping-cart-black-shape"></i>
                            </a>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
        <div class="search_input" id="search_input_box">
            <div class="container ">
                <form class="d-flex justify-content-between search-inner">
                    <input type="text" class="form-control" id="search_input" placeholder="Search Here">
                    <button type="submit" class="btn"></button>
                    <span class="ti-close" id="close_search" title="Close Search"></span>
                </form>
            </div>
        </div>
    </header>
    <!-- Header part end-->

    <!-- breadcrumb part start-->
    <section class="breadcrumb_part">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb_iner">
                        <h2>login</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb part end-->

    <!--================login_part Area =================-->
    <section class="login_part section_padding ">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6">
                    <div class="login_part_text text-center">
                        <div class="login_part_text_iner">
                            <h2>Accédez a notre site !! </h2>
                            <p>           Si vous n'avez pas un compte     


                                                                                                   </p>
                            <a href="compte.php" class="btn_3">Créer un compte</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="login_part_form">
                        <div class="login_part_form_iner">
                            <h3>Bienvenue  ! <br>
                                Connectez-Vous!</h3>
                            <form class="row contact_form" action="" method="post" >
                                <div class="col-md-12 form-group p_star">
                                <?php if(!empty($statusMsg)){ ?>
    <p style="color:tomato;" class=" <?php echo $status; ?>"><?php echo $statusMsg; ?></p>
<?php } ?>
                                    <input type="text" class="form-control" id="username" name="username" 
                                        placeholder="Nom d'utilisateur">
                                </div>
                                <div class="col-md-12 form-group p_star">
                                    <input type="password" class="form-control" id="mdp" name="mdp" 
                                        placeholder="Mot de passe">
                                <script src='https://www.google.com/recaptcha/api.js' async defer ></script>
                                <br> 
                                <br> 
                                
                                <div class="g-recaptcha" data-sitekey="6Lf0R7gfAAAAAO1xBUlZ_7C8ZP2jty1TCFfUFNa-"></div>
                                </div>
                                
                                <div class="col-md-12 form-group">
                                  
                                    <button type="submit" value="submit"  name="submit" class="btn_3">Se connecter                                    </button>
                                    <a class="lost_pass" href="forgetmdp.php">Mot de passe oublié?</a>
                                </div>
                                </li>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================login_part end =================-->

    <!--::footer_part start::-->
    <footer class="footer_part">
        <div class="footer_iner section_bg">
            <div class="container">
                <div class="row justify-content-between align-items-center">
                    <div class="col-lg-8">
                        <div class="footer_menu">
                            <div class="footer_logo">
                                <a href="index.php"><img src="img/99.png" alt="#"></a>
                            </div>
                            <div class="footer_menu_item">
                                <a href="index.php">Home</a>
                                <a href="about.php">About</a>
                                <a href="product_list.php">Products</a>
                                <a href="#">Pages</a>
                                <a href="blog.php">Blog</a>
                                <a href="contact.php">Contact</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="social_icon">
                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                            <a href="#"><i class="fab fa-instagram"></i></a>
                            <a href="#"><i class="fab fa-google-plus-g"></i></a>
                            <a href="#"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="copyright_part">
            <div class="container">
                <div class="row ">
                    <div class="col-lg-12">
                        <div class="copyright_text">
                            <P><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="ti-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></P>
                            <div class="copyright_link">
                                <a href="#">Turms & Conditions</a>
                                <a href="#">FAQ</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!--::footer_part end::-->

    <!-- jquery plugins here-->
    <script src="js/jquery-1.12.1.min.js"></script>
    <!-- popper js -->
    <script src="js/popper.min.js"></script>
    <!-- bootstrap js -->
    <script src="js/bootstrap.min.js"></script>
    <!-- easing js -->
    <script src="js/jquery.magnific-popup.js"></script>
    <!-- swiper js -->
    <script src="js/swiper.min.js"></script>
    <!-- swiper js -->
    <script src="js/mixitup.min.js"></script>
    <!-- particles js -->
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <!-- slick js -->
    <script src="js/slick.min.js"></script>
    <script src="js/jquery.counterup.min.js"></script>
    <script src="js/waypoints.min.js"></script>
    <script src="js/contact.js"></script>
    <script src="js/jquery.ajaxchimp.min.js"></script>
    <script src="js/jquery.form.js"></script>
    <script src="js/jquery.validate.min.js"></script>
    <script src="js/mail-script.js"></script>
    <!-- custom js -->
    <script src="js/custom.js"></script>
</body>
    
</html>