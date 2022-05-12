<?PHP

include "../../controller/produitC.php";
include "../../controller/categorie_c.php";


$produitC = new produitC();
$listeProduit = $produitC->afficherProduit();
$categorieC = new categorieC();
$listeCategorie = $categorieC->afficherCategorie();
$categorieC = new categorieC();
// $localC = new localC();
// $listeLocal = $localC->afficherLocal();
if (isset($_POST['search']))
    {
        $listeProduit=$produitC->afficherresid($_POST['search']); 

    }
    //code pagination

$con = mysqli_connect('localhost','root','','integrationfinale');
if(!$con)
{
    echo ' Please Check Your Connection ';
}

if(isset($_GET['page']))
{
    $page = $_GET['page'];
}
else
{
    $page = 1;
}

$num_per_page = 03;
$start_from = ($page-1)*02;

$query = "select * from produit limit $start_from,$num_per_page";
$result = mysqli_query($con,$query);





?>
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
                        <a class="navbar-brand" href="index.html"> <img src="img/logo.png" alt="logo"> </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="menu_icon"><i class="fas fa-bars"></i></span>
                        </button>

                        <div class="collapse navbar-collapse main-menu-item" id="navbarSupportedContent">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link" href="index.html">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="about.html">about</a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="blog.html" id="navbarDropdown_1"
                                        role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        product
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown_1">
                                        <a class="dropdown-item" href="store.php"> product list</a>
                                        <a class="dropdown-item" href="">product details</a>
                                        
                                    </div>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="blog.html" id="navbarDropdown_3"
                                        role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        pages
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown_2">
                                        <a class="dropdown-item" href="login.html"> 
                                            login
                                            
                                        </a>
                                        <a class="dropdown-item" href="checkout.html">product checkout</a>
                                        <a class="dropdown-item" href="cart.html">shopping cart</a>
                                        <a class="dropdown-item" href="confirmation.html">confirmation</a>
                                        <a class="dropdown-item" href="elements.html">elements</a>
                                    </div>
                                </li>
                                
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="blog.html" id="navbarDropdown_2"
                                        role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        blog
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown_2">
                                        <a class="dropdown-item" href="blog.html"> blog</a>
                                        <a class="dropdown-item" href="single-blog.html">Single blog</a>
                                    </div>
                                </li>
                                
                                <li class="nav-item">
                                    <a class="nav-link" href="contact.html">Contact</a>
                                </li>
                            </ul>
                        </div>
                        <div class="hearer_icon d-flex align-items-center">
                            <a id="search_1" href="javascript:void(0)"><i class="ti-search"></i></a>
                            <a href="cart.html">
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
                        <h2>product list</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb part end-->
    
    <!-- product list part start-->
    <section class="product_list section_padding">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="product_sidebar">
                        <div class="single_sedebar">
                            
                            <form action="#" class="input-group mb-3">
                                <input type="text" name="search" placeholder="Search keyword" id="searchbar"  placeholder="Search data" autocomplete="off">
                                <i class="ti-search"></i>
                                
                            </form>
                        </div>
                        <div class="py-3">
					<h5 class="font-weight-bold">Categories</h5>
					<ul class="list-group">
					 	<?php foreach ($listeCategorie as $categorieC) : ?>
							<li class="list-group-item list-group-item-action d-flex justify-content-between align-items-center category"> <?php echo $categorieC['nomCategorie']; ?>
								<span class="badge badge-primary badge-pill">328</span>
							</li>
						<?php endforeach; ?>
					</ul>
				</div>
                        <div class="single_sedebar">
                            <div class="select_option">
                                <div class="select_option_list"  id="sort">Trier <i class="right fas fa-caret-down"></i> </div>
                                <div class="select_option_dropdown" id="sort">
                                      <option selected="selected">Prix décroissant</option>
                        <option>Prix croissant</option>
                        <option>Titre A->Z</option>
                        <option>Titre Z->A</option>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="py-3">
					<h5 class="font-weight-bold">Rating</h5>
					<form class="rating">
						<div class="form-inline d-flex align-items-center py-2"> <label class="tick"><span class="fas fa-star"></span> <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span class="fas fa-star"></span> <input type="checkbox"> <span class="check"></span> </label> </div>
						<div class="form-inline d-flex align-items-center py-2"> <label class="tick"> <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span class="far fa-star px-1 text-muted"></span> <input type="checkbox"> <span class="check"></span> </label> </div>
						<div class="form-inline d-flex align-items-center py-2"> <label class="tick"><span class="fas fa-star"></span> <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span class="far fa-star px-1 text-muted"></span> <span class="far fa-star px-1 text-muted"></span> <input type="checkbox"> <span class="check"></span> </label> </div>
						<div class="form-inline d-flex align-items-center py-2"> <label class="tick"><span class="fas fa-star"></span> <span class="fas fa-star"></span> <span class="far fa-star px-1 text-muted"></span> <span class="far fa-star px-1 text-muted"></span> <span class="far fa-star px-1 text-muted"></span> <input type="checkbox"> <span class="check"></span> </label> </div>
						<div class="form-inline d-flex align-items-center py-2"> <label class="tick"> <span class="fas fa-star"></span> <span class="far fa-star px-1 text-muted"></span> <span class="far fa-star px-1 text-muted"></span> <span class="far fa-star px-1 text-muted"></span> <span class="far fa-star px-1 text-muted"></span> <input type="checkbox"> <span class="check"></span> </label> </div>
					</form>
				     </div>
                     	
                </div>
                
                <section id="products">
				<div class="container py-3">
					<div class="row"> 





					
                    
					<?php
					  $con2 = mysqli_connect("localhost","root","","gestionoffre");

					 
											

					 while($produit=mysqli_fetch_assoc($result))  {
						 
						
                    
                        ?>
						 
						 
                   
						<div class="col-lg-4 col-md-6 col-sm-10 offset-md-0 offset-sm-1 product " id="products-container" >
						
							<div class="card"><a href="productDt.phpp?<?php echo $produit['id'] ?>"data_role="popup" id="img" data-toggle="popover"  data-content="Some content inside the popover" data-position="window" >
                                    <img src="img/product/<?php echo $produit['img'] ?>" alt="#" class="img_thumbnail" width="200" >

									   </a>
									   <div class="card-body ">
								
									<h6 class="font-weight-bold pt-1 product-title"  ><?php echo $produit['libelle'] ?></h6>
									<div class="container">
                                    <a href="productDT.php?id=<?php echo $produit['id'] ?>"data_role="popup" id="img" data-toggle="popover" title="<?php echo $produit['description'] ?>" data-content="Some content inside the popover" data-position="window" >
									
									more   </a></div>
                                    <div class="d-flex align-items-center product-id"> <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span class="far fa-star"></span> </div>
									<div class="d-flex align-items-center justify-content-between pt-3">
										<div class="d-flex flex-column">
										<div class="product-category"><?php $produit['categorie'] ?></div>
											<div class="h6 font-weight-bold product-price "><?php echo $produit['prix'] ?></div>
										</div>
										<div class="btn btn-primary" style="background-color: #2A2A2A">Buy now</div>
									</div>
								</div>
							</div>
						</div>
					
						<?php
					 }
                                        
                                            ?>
    </section>
            </div>
        </div>
        <?php 
        
		$pr_query = "select * from produit ";
		$pr_result = mysqli_query($con,$pr_query);
		$total_record = mysqli_num_rows($pr_result );
		
		$total_page = ceil($total_record/$num_per_page);

		if($page>1)
		{
			echo "<a href='store.php?page=".($page-1)."' class='btn btn-danger'  >Previous</a>";
		}

		
		for($i=1;$i<$total_page;$i++)
		{
			echo "<a href='store.php?page=".$i."' class='btn btn-primary'  >$i</a>";
		}

		if($i>$page)
		{
			echo "<a href='store.php?page=".($page+1)."' class='btn btn-danger'>Next</a>";
		}

?>

    <!-- product list part end-->
    
    <!-- client review part here -->
    <section class="client_review">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="client_review_slider owl-carousel">
                        <div class="single_client_review">
                            <div class="client_img">
                                <img src="img/client.png" alt="#">
                            </div>
                            <p>"Working in conjunction with humanitarian aid agencies, we have supported programmes to help alleviate human suffering.</p>
                            <h5>- Micky Mouse</h5>
                        </div>
                        <div class="single_client_review">
                            <div class="client_img">
                                <img src="img/client_1.png" alt="#">
                            </div>
                            <p>"Working in conjunction with humanitarian aid agencies, we have supported programmes to help alleviate human suffering.</p>
                            <h5>- Micky Mouse</h5>
                        </div>
                        <div class="single_client_review">
                            <div class="client_img">
                                <img src="img/client_2.png" alt="#">
                            </div>
                            <p>"Working in conjunction with humanitarian aid agencies, we have supported programmes to help alleviate human suffering.</p>
                            <h5>- Micky Mouse</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- client review part end -->

    <!-- feature part here -->
    <section class="feature_part section_padding">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-lg-6">
                    <div class="feature_part_tittle">
                        <h3>Credibly innovate granular
                        internal or organic sources
                        whereas standards.</h3>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="feature_part_content">
                        <p>Seamlessly empower fully researched growth strategies and interoperable internal or “organic” sources. Credibly innovate granular internal or “organic” sources whereas high standards in web-readiness.</p>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-3 col-sm-6">
                    <div class="single_feature_part">
                        <img src="img/icon/feature_icon_1.svg" alt="#">
                        <h4>Credit Card Support</h4>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="single_feature_part">
                        <img src="img/icon/feature_icon_2.svg" alt="#">
                        <h4>Online Order</h4>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="single_feature_part">
                        <img src="img/icon/feature_icon_3.svg" alt="#">
                        <h4>Free Delivery</h4>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="single_feature_part">
                        <img src="img/icon/feature_icon_4.svg" alt="#">
                        <h4>Product with Gift</h4>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- feature part end -->

    <!-- subscribe part here -->
    <section class="subscribe_part section_padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="subscribe_part_content">
                        <h2>Get promotions & updates!</h2>
                        <p>Seamlessly empower fully researched growth strategies and interoperable internal or “organic” sources credibly innovate granular internal .</p>
                        <div class="subscribe_form">
                            <input type="email" placeholder="Enter your mail">
                            <a href="#" class="btn_1">Subscribe</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- subscribe part end -->

    <!--::footer_part start::-->
    <footer class="footer_part">
            <div class="footer_iner">
                <div class="container">
                    <div class="row justify-content-between align-items-center">
                        <div class="col-lg-8">
                            <div class="footer_menu">
                                <div class="footer_logo">
                                    <a href="index.html"><img src="img/logo.png" alt="#"></a>
                                </div>
                                <div class="footer_menu_item">
                                    <a href="index.html">Home</a>
                                    <a href="about.html">About</a>
                                    <a href="product_list.html">Products</a>
                                    <a href="#">Pages</a>
                                    <a href="blog.html">Blog</a>
                                    <a href="contact.html">Contact</a>
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
    <script>

$('#searchbar').keyup(function () {
    let products = $('.product'); 
    let keyword = $(this).val().toLowerCase(); 
    if (keyword == "") 
        products.show();
    else { 
        products.each(function () {
            let title = $(this).find('.product-title').text().toLowerCase();
            let id = $(this).find('.product-id').text().toLowerCase();

            (title.indexOf(keyword) >= 0 ) ? $(this).show() : $(this).hide();
        });
    }
});

//tri
$(document).ready(function() {
            var mylist = $('#products-container');

            var listitems = mylist.children('div').get();

            listitems.sort(function(a, b) {
                let price_a = $(a).find('.product-price').text();
                let price_b = $(b).find('.product-price').text();
                return parseInt(price_a) - parseInt(price_b);
            });

            // console.log(listitems);
            listitems.forEach(element => {
                mylist.append(element);
            });
        });


        $('#sort').change(function() {
            let products_content = $('#products-container');
            let products = $('.product');
            let sort = $(this).val();

            if (sort == "Prix décroissant") {
                products.sort(function(a, b) {
                    let price_a = $(a).find('.product-price').text();
                    let price_b = $(b).find('.product-price').text();
                    return parseInt(price_b) - parseInt(price_a);
                })
                products.appendTo(products_content);
            } else if (sort == "Prix croissant") {
                products.sort(function(a, b) {
                    let price_a = $(a).find('.product-price').text();
                    let price_b = $(b).find('.product-price').text();
                    return parseInt(price_a) - parseInt(price_b);
                })
                products.appendTo(products_content);

            } else if (sort == "Titre A->Z") {
                products.sort(function(a, b) {
                    let title_a = $(a).find('.product-title').text();
                    let title_b = $(b).find('.product-title').text();
                    return title_a.localeCompare(title_b);
                })
                products.appendTo(products_content);
            } else if (sort == "Titre Z->A") {
                products.sort(function(a, b) {
                    let title_a = $(a).find('.product-title').text();
                    let title_b = $(b).find('.product-title').text();
                    return title_b.localeCompare(title_a);
                })
                products.appendTo(products_content);
            }

        });

</script>
</body>

</html>