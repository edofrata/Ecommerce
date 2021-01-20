<?php

//Ouputs the header for the page and opening body tag
function outputHeader($title)
{
    echo '<!DOCTYPE html>';
    echo '<html>';
    echo '<head>';
    echo '<title>' . $title . '</title>';
    echo '<!-- Link to external style sheet -->';
    echo '<link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">';
    echo ' <link href="../css/FancyShop.css" rel="stylesheet">';
    echo '</head>';
    echo '<body>';
}

/* Ouputs the banner and the navigation bar
    The selected class is applied to the page that matches the page name variable */
function outputBannerNavigation($pageName)
{
    //Output banner and first part of navigation

    echo '<nav class="navbar navbar-expand-lg navbar-light fixed-top " style="background-color:#000627;>';
    echo '<div class="container">';
    echo '<a href="index.php" class="navbar-brand"><img class="logo_style" src="../assets/logo-white.png" alt="Logo image"></a></div>';
    //   hamburger menu for smaller screens
    echo '<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                                             aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
            <div class="collapse navbar-collapse space" id="navbarText">
            <ul class="nav nav-pills text-center ">';


    //Array of pages to link to
    $linkNames = array("Home", "Products", "Contact", "Basket");
    $linkAddresses = array("index.php", "products.php", "contact.php", "basket.php");


    //Output navigation
    for ($x = 0; $x < count($linkNames); $x++) {

        // if the page is products, create a menu dropdown
        if ($linkNames[$x] == $pageName && $linkNames[$x] == "Products" || $linkNames[$x] == "Products") {
            echo '<li class="nav-item dropdown">';
            if ($linkNames[$x] == $pageName)
                echo '<a class="nav-link dropdown-toggle active" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">' . $linkNames[$x] . '</a>';
            else
                echo '<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">' . $linkNames[$x] . '</a>';
            echo '<div class="dropdown-menu"> 
                    <a class="dropdown-item" href="' . $linkAddresses[$x] . '">All Products</a>
                  <div class="dropdown-divider"></div>                     
                        <a class="dropdown-item" href="#">Consoles</a>
                        <a class="dropdown-item" href="#">Games</a>
                  </div>';
            echo '</li>';
        }
        // it creates the "active" page
        else if ($linkNames[$x] == $pageName) {
            echo '<li class="nav-item">';
            echo '<a ';
            echo 'class="nav-link active" href="' . $linkAddresses[$x] . '">' . $linkNames[$x] . '</a> ';
            echo '</li>';
            // dropdown create the rest of the menu
        } else {
            echo '<li class="nav-item">';
            echo '<a ';
            echo 'class="nav-link" href="' . $linkAddresses[$x] . '">' . $linkNames[$x] . '</a>';
            echo '</li>';
        }
    }
    echo '</ul>';
    // search bar implementation
    echo ' <form class="form-inline my-2 my-lg-0 ml-auto">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>';

    echo '</div>';
    echo '</div>';
    echo '</div>';
    echo '</nav>';
}

//Outputs closing body tag and closing HTML tag
function outputFooter()
{
echo'
<footer class="bg-light text-center text-lg-start" >
  <!-- Grid container -->
  <div class="container p-4">
    <!--Grid row-->
    <div class="row">
      <!--Grid column-->
      <div class="col-lg-6 col-md-12 mb-4 mb-md-0">
        <h5 class="text-uppercase">FancyShop</h5>
        <p>
         FancyShop is a gameshop, created for coursework2, where will sell, games for next gen consoles
         such as: PS5, Xbox series X, PS4 and Xbox one.
         Many games available for the consoles available.
        </p>
      </div>
      <!--Grid column-->

      <!--Grid column-->
      <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
        <h5 class="text-uppercase">Products</h5>

        <ul class="list-unstyled mb-0">
          <li>
            <a href="#!" class="text-dark">Consoles available</a>
          </li>
          <li>
            <a href="#!" class="text-dark">Games available</a>
          </li>
        </ul>
      </div>
      <!--Grid column-->

      <!--Grid column-->
      <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
        <h5 class="text-uppercase mb-0">Contact</h5>

        <ul class="list-unstyled">
          <li>
            <a href="#!" class="text-dark">Contact</a>
          </li>
          <li>
            <a href="#!" class="text-dark">About</a>
          </li>

        </ul>
      </div>
      <!--Grid column-->
    </div>
    <!--Grid row-->
  </div>
  <!-- Grid container -->

  <!-- Copyright -->
  <div class="text-center p-3 text-white" style="background-color:#000627;">
    © 2021 Copyright:
    <a class="text-white" href="#">FancyShop Copyright</a>
  </div>
  <!-- Copyright -->
</footer>';

    echo '  <script src="../vendor/jquery/jquery.min.js"></script>
            <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js">
            </script>';
    echo '</body>';
    echo '</html>';
}

function cards($Product)
{
$url_images = array("../assets/game_console/playstation4.jpg", "../assets/game_console/playstation5.png", "../assets/game_console/xbox_serie_x.jpg", "../assets/game_console/xbox_serie_x.jpg");
    echo'
    <div class="col-lg-6 mb-4">
    <div class="card h-100"> 
      <h4 class="card-header bg-dark text-white" style="text-align: center">' . $Product . '</h4>
   
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
      <div class="carousel-inner" role="listbox">
       ';
for($x = 0; $x < count($url_images); $x++){
    if($x == 0)
    echo'
        <div class="carousel-item demo active">
            <img class="d-flex img-fluid " style="max-width: 550px;" src="' . $url_images[$x] . '">
        </div>';
        else
    echo'
        <div class="carousel-item demo">
            <img class="d-flex img-fluid" style="max-width: 550px;" src="' . $url_images[$x] . '">
        </div>';
}
  echo' 
      </div>
    </div>
      <div class="card-body" style="background-color: #e3f2fd;">
      
        <p class="card-text" style= "text-align: center">Have a look and pick the console you think it is for you, from <br><strong> PS5, Xbox series X, PS4 and Xbox one</strong></p>
      </div>
      <div class="card-footer bg-dark">
        <a href="#" class="btn btn-primary center">See all</a>
      </div>
    </div>
  </div> ';
}

function cards2($Product)
{
$url_images = array("../assets/game_images/god_of.png", "../assets/game_images/cod_image.jpg", "../assets/game_images/the_last.jpg", "../assets/game_images/forza_horizon.jpeg");
    echo'
    <div class="col-lg-6 mb-4">
    <div class="card h-100"> 
      <h4 class="card-header bg-dark text-white" style="text-align: center">' . $Product . '</h4>
   
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
      <div class="carousel-inner" role="listbox">
       ';
for($x = 0; $x < count($url_images); $x++){
    if($x == 0)
    echo'
        <div class="carousel-item demo active">
            <img class="d-flex img-fluid " style="max-width: 550px;" src="' . $url_images[$x] . '">
        </div>';
        else
    echo'
        <div class="carousel-item demo">
            <img class="d-flex img-fluid" style="max-width: 550px;" src="' . $url_images[$x] . '">
        </div>';
}
  echo' 
      </div>
    </div>
      <div class="card-body " style="background-color: #e3f2fd;">
      
        <p class="card-text" style= "text-align: center">Choose between a variety of games, of all kinds, for all the <strong>CONSOLES!</strong></p>
      </div>
      <div class="card-footer bg-dark">
        <a href="#" class="btn btn-primary center">See all</a>
      </div>
    </div>
  </div> ';
}

function intro_product($product_name, $image_path)
{

    echo ' <div class="col-lg-4 col-sm-6 portfolio-item">
                <div class="card h-100">
                <a href="#"><img class="card-img-top" src="' . $image_path . '" alt=""></a>
                <div class="card-body">
                    <h4 class="card-title">
                    <a href="#">' . $product_name . '</a>
                    </h4>
                    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam aspernatur eum quasi sapiente nesciunt? Voluptatibus sit, repellat sequi itaque deserunt, dolores in, nesciunt, illum tempora ex quae? Nihil, dolorem!</p>
                </div>
                </div>
           </div>';
}
