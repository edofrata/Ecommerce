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

    echo '<nav class="navbar navbar-expand-lg navbar-light fixed-top bg-dark " style="background-color: #e3f2fd;>';
    echo '<div class="container">';
    echo '<a href="index.php" class="navbar-brand"><img class="logo_style" src="../assets/logo.png" alt="Logo image"></a></div>';
    //   hamburger menu for smaller screens
    echo '<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                                             aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="nav nav-pills nav-fill">';


    //Array of pages to link to
    $linkNames = array("Home", "Products", "Contact", "Basket");
    $linkAddresses = array("index.php", "products.php", "contact.php", "basket.php");


    //Output navigation
    for ($x = 0; $x < count($linkNames); $x++) {

// if the page is products, create a menu dropdown
        if($linkNames[$x] == $pageName && $linkNames[$x] == "Products" || $linkNames[$x] == "Products"){
            echo '<li class="nav-item dropdown">';
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
// dropdown 
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
    echo '  <footer class="py-4 navbar-light bg-dark " style="background-color: #e3f2fd;>
                    <div class="container">
                        <p class="m-0 text-center text-black">FancyShop Copyright</p>
  
                    </div>
            </footer>';

    echo '  <script src="../vendor/jquery/jquery.min.js"></script>
            <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js">
            </script>';
    echo '</body>';
    echo '</html>';
}
