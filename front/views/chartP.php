<?php
$con = mysqli_connect("localhost", "root", "", "crud");
?>
<html>

<head>
  <title>Promotion | Statistique</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Promotion | Glam Store</title>
  <link rel="icon" href="">
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

  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">
    google.charts.load('current', {
      'packages': ['corechart']
    });

    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ['Nom', 'Remise'],
        <?php
        $sql = "SELECT Nom, Remise FROM promotion";
        $fire = mysqli_query($con, $sql);
        while ($result = mysqli_fetch_assoc($fire)) {
          echo "['" . $result['Nom'] . "'," . $result['Remise'] . "],";
        }
        ?>
      ]);
      var options = {
        title: 'Pourcentage de remise par produit',
        is3D: true
      };
      var chart = new google.visualization.PieChart(document.getElementById('piechart'));
      chart.draw(data, options);
    }
  </script>
</head>

<body>
  <header class="main_menu home_menu">
    <div class="container">
      <div class="row align-items-center justify-content-center">
        <div class="col-lg-12">
          <nav class="navbar navbar-expand-lg navbar-light">
            <a class="navbar-brand" href="index.html"> <img src="img/99.png" alt="logo"> </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="menu_icon"><i class="fas fa-bars"></i></span>
            </button>

            <div class="collapse navbar-collapse main-menu-item" id="navbarSupportedContent">
              <ul class="navbar-nav">
                <li class="nav-item">
                  <a class="nav-link" href="index.html">Acceuil</a>
                </li>

                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="blog.html" id="navbarDropdown_1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Produits
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown_1">
                    <a class="dropdown-item" href="product_list.html"> product list</a>
                    <a class="dropdown-item" href="single-product.html">product details</a>

                  </div>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="blog.html" id="navbarDropdown_3" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    à propos
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
                  <a class="nav-link dropdown-toggle" href="blog.html" id="navbarDropdown_2" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
      </div>
    </div>
  </header>
  <style>
    body {
      background-color: white;
    }
  </style>
  <center>
    <div id="piechart" style="width: 1000px; height: 460px;"></div>
  </center>
</body>

</html>