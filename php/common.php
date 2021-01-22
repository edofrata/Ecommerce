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
  echo '<nav class="navbar navbar-expand-lg navbar-light fixed-top " style="background-color:#1D2934;>';

  echo '<div class="container">';
  echo '<a href="index.php" class="navbar-brand"><img class="logo_style" src="../assets/logo-white.png" alt="Logo image"></a></div>';
  //   hamburger menu for smaller screens
  echo '<button class="navbar-toggler navbar-toggler-right custom-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                                             aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon "></span>
          </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="nav nav-pills nav-fill">';


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
                        <a class="dropdown-item" href="consoles.php">Consoles</a>
                        <a class="dropdown-item" href="games.php">Games</a>
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
  echo '<li class="nav-item">';
  echo '<a ';
  echo 'class="nav-link" href="' . $linkAddresses[$x] . '">' . $linkNames[$x] . '</a>';
  echo '</li>';
  echo '</ul>';

  echo '</div>';
  echo '  <div class="text-right">
    <a href="#myModal" onaction class="trigger-btn" data-toggle="modal"><img class="user_login" src="../assets/user.png" alt="Logo image"></a>
    </div>';
  // search bar implementation
  echo ' <form class="form-inline my-2 my-lg-0 ml-auto">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>';

  echo '</div>';
  echo '</div>';
  echo '</div>';
  echo '</nav>';
  echo '     <!--------------- Sign IN------------------------->
            <div id="myModal" class="modal fade">
                <div class="modal-dialog modal-login">
                    <div class="modal-content">
                     <div class="modal-header">
                        <div class="avatar">
                            <img src="../assets/log_in.png" alt="Avatar">
                        </div>				
                        <h4 class="modal-title">Member Login</h4>	
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                     </div>
                    <div class="modal-body">
                     <form action="/examples/actions/confirmation.php" method="post">
                      <div class="form-group">
                        <input type="text" class="form-control" name="username" placeholder="Username" required="required">		
                      </div>
                        <div class="form-group">
                            <input type="password" class="form-control" name="password" placeholder="Password" required="required">	
                        </div>        
                          <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-lg btn-block login-btn"><a href="cms.php">Login</button>
                          </div>
                     </form>
                    </div>
                    <div class="modal-footer">
                     <a href="#myModal2" class="trigger-btn" data-toggle="modal" style="color: #1D2934;">New User?</a>
                   </div>
                </div>
             </div>
        </div>  ';
  echo '<!-------------------------End Sign In------------------------>';
  echo '<!-------------------------Start Registration ---------------->';
  echo '<!-- Modal HTML -->
          <div id="myModal2" class="modal fade">
            <div class="modal-dialog contact-modal">
              <div class="modal-content">
                <div class="modal-header">				
              <h4 class="modal-title">Sign Up to FancyShop</h4>
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
          <div class="modal-body">
                <form action="/examples/actions/confirmation.php" method="post">
                    <div class="form-group">
                        <input type="text" class="form-control" id="inputName" placeholder="Full Name" required>
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control" id="inputEmail" placeholder="Email" required>
                    </div>
                    <div class="form-group">
                       <input type="text" class="form-control" id="inputAddress" placeholder="Address" required>
                    </div>
                      <div class="form-group">
                  <input type="text" class="form-control" id="inputPostcode" placeholder="Postcode" required>
                    </div>
                      <div class="form-group">
                  <input type="text" class="form-control" id="inputPhone" placeholder="Phone" required>
                    </div>
                    <div class="form-group">
                    <input type="password" class="form-control" id="inputPassword" placeholder="Password" required>
                      </div>
                    
                    <input type="submit" class="btn btn-primary center" value="Send">
                    <input type="button" class="btn btn-link center" data-dismiss="modal" value="Cancel">
                </form>
			</div>
		</div>
	</div>
</div>';
}


// url for console pictures
$url_consoles = array(
  "../assets/game_console/playstation4.jpg", "../assets/game_console/playstation5.png",
  "../assets/game_console/xbox_serie_x.jpg", "../assets/game_console/xbox_serie_x.jpg"
);

// urls for game pictures
$url_games = array(
  "../assets/game_images/god_of.png", "../assets/game_images/cod_image.jpg",
  "../assets/game_images/the_last.jpg", "../assets/game_images/forza_horizon.jpeg"
);
// homepage cards showing consoles
function cards($Product, array $products)
{

  echo '
    <div class="col-lg-6 mb-4">
    <div class="card h-100"> 
      <h4 class="card-header bg-dark text-white" style="text-align: center">' . $Product . '</h4>
   
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
      <div class="carousel-inner" role="listbox">
       ';
  for ($x = 0; $x < count($products); $x++) {
    if ($x == 0)
      echo '
        <div class="carousel-item demo active">
            <img class="d-flex img-fluid " style="max-width: 550px;" src="' . $products[$x] . '">
        </div>';
    else
      echo '
        <div class="carousel-item demo">
            <img class="d-flex img-fluid" style="max-width: 550px;" src="' . $products[$x] . '">
        </div>';
  }
  echo ' 
      </div>
    </div>
      <div class="card-body" style="background-color: #e3f2fd;">
      
        <p class="card-text" style= "text-align: center">Have a look and pick the console you think it is for you, from <br><strong> PS5, Xbox series X, PS4 and Xbox one</strong></p>
      </div>
      <div class="card-footer bg-dark">
        <a href="products.php" class="btn btn-primary center">See all</a>
      </div>
    </div>
  </div> ';
}

function intro_product($product_name, $image_path)
{

  echo ' <div class="col-lg-4 col-sm-6 portfolio-item">
                <div class="card h-100">
                <a href="item.php"><img class="card-img-top" src="' . $image_path . '" alt=""></a>
                <div class="card-body">
                    <h4 class="card-title">
                    <a href="item.php">' . $product_name . '</a>
                    </h4>
                </div>
                </div>
           </div>';
}


function item_show($name, $price, $product_image)
{

  echo '
        <div class="col-lg-4 col-md-6 mb-4">
          <div class="card h-100">
                <a href="#"><img class="card-img-top" src="' . $product_image . '" alt=""></a>
                    <div class="card-body">
                        <h4 class="card-title">
                        <a href="item.php">' . $name . '</a>
                        </h4>
                        <h5>' . $price . '</h5>
                    </div>
            <div class="card-footer">
            <form action="basket.php">
                <button type="submit"  class="btn btn-success mx-auto ">Add Basket</button>
           </form>
                </div>
          </div>
        </div>';
}

// csm user order done
function csm_user($date, $name, $price){

 echo'  <tr>
            <td>
              <p href="#">Order</p>
            </td>
            <td>
              <p>'. $date . '</p>
            </td>
            <td class="member">
              <figure><img src="../assets/log_in.png" /></figure>
              <div class="member-info">
                <p>'. $name . '</p>
                <p>FancyShop Member</p>
              </div>
            </td>
            <td>
              <p>'. $price . '</p>
              <p class="text-success">Paid</p>
            </td>
            <td class="status">
              <span class="status-text status-orange">In progress</span>
            </td>
          </tr>';


}


//Outputs closing body tag and closing HTML tag
function outputFooter()
{
  echo '
    <footer class="text-white text-center text-lg-start" style="background-color:#22303E;">
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
          <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
            <h5 class="text-uppercase">Products</h5>
    
            <ul class="list-unstyled my-2">
              <li>
                <a href="#!" class="text-white">Consoles available</a>
              </li>
              <li>
                <a href="#!" class="text-white">Games available</a>
              </li>
            </ul>
          </div>
          <!--Grid column-->
          <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
            <h5 class="text-uppercase mb-0">Contact</h5>
    
            <ul class="list-unstyled my-2">
              <li>
                <a href="contact.php" class="text-white">Contact</a>
              </li>
              <li>
                <a href="cms.php" class="text-white">CMS</a>
              </li>

            </ul>
          </div>
          <!--Grid column-->
        </div>
        <!--Grid row-->
      </div>
      <!-- Grid container -->
    
      <!-- Copyright -->
      <div class="text-center p-3 text-white" style="background-color:#1D2934;">
        © 2021 Copyright:
        <a class="text-white" href="#">FancyShop Copyright</a>
      </div>
      <!-- Copyright -->
    </footer>';

  echo '  <script src="../vendor/jquery/jquery.min.js"></script>
            <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js">
            </script>       
            <script src="../js/basket.js">
            </script>';
  echo '</body>';
  echo '</html>';
}
