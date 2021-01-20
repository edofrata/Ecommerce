<?php

//Ouputs the header for the page and opening body tag
function outputHeader($title)
{
    echo '<!DOCTYPE html>';
    echo '<html>';
    echo '<head>';
    echo '<title>' . $title . '</title>';
    echo '<!-- Link to external style sheet -->';
    echo '<link rel="stylesheet" type="text/css" href="styles.css">';
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

    echo '<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark fixed-top">';
    echo '<div class="container">';
    echo '<a href="index.php" class="navbar-brand"><img class="logo_style" src="../assets/logo.png" alt="Logo image"></a></div>';
    echo '<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                                             aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">';

    //Array of pages to link to
    $linkNames = array("Home", "Product", "Contact", "Basket");
    $linkAddresses = array("index.php", "products.php", "contact.php", "basket.php");

    //Output navigation
    for ($x = 0; $x < count($linkNames); $x++) {
        echo '<a ';
        if ($linkNames[$x] == $pageName) {
            echo 'class="selected" ';
        }
        echo 'href="' . $linkAddresses[$x] . '">' . $linkNames[$x] . '</a>';
    }

    echo '</div>';
    echo '</div>';
    echo '</div>';
    echo '</nav>';
}

//Outputs closing body tag and closing HTML tag
function outputFooter()
{
    echo '  <footer class="py-5 bg-dark">
                    <div class="container">
                        <p class="m-0 text-center text-white">FancyShop Copyright</p>
                        <p class="m-0 text-center text-white"> 
                    </div>
            </footer>';

    echo '  <script src="../vendor/jquery/jquery.min.js"></script>
            <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js">
            </script>';
    echo '</body>';
    echo '</html>';
}
