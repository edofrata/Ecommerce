<?php
session_start();

//Ouputs the header for the page and opening body tag
function outputHeader($title)
{
  echo '<!DOCTYPE html>';
  echo '<html>';
  echo '<head>';
  echo '<title>' . $title . '</title>';
  echo '<!-- Link to external style sheet -->';
  echo '<link href="../vendor__/bootstrap/css/bootstrap.min.css" rel="stylesheet">';
  echo ' <link href="../css/FancyShop.css" rel="stylesheet">';

  echo '<script src="https://unpkg.com/axios/dist/axios.min.js"></script>';

  echo '</head>';

  echo '<body>';
}

/* ------------------------Ouputs the banner and the navigation bar---------------------------
    The selected class is applied to the page that matches the page name variable */
function outputBannerNavigation($pageName)
{

  //Output banner and first part of navigation
  echo '<nav class="navbar navbar-expand-lg navbar-light fixed-top " style="background-color:#1D2934;>';

  echo '<div class="container">';
  echo '<a href="index.php" class="navbar-brand"><img class="logo_style" src="../assets/logo-white.png" alt="Logo image"></a></div>';
  //   --------------------------hamburger menu for smaller screens----------------
  echo '<button class="navbar-toggler navbar-toggler-right custom-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                                             aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon "></span>
          </button>
            <div class="navbar2 navbar-collapse justify-content-left" id="navbarResponsive">
            <ul class="nav nav-pills  ">';


  //---------------Array of pages to link to------------------------
  $linkNames = array("Home", "Products", "Basket");
  $linkAddresses = array("index.php", "products.php", "basket.php");

  //Output navigation
  for ($x = 0; $x < count($linkNames); $x++) {

    //--------------------- if the page is products, create a menu dropdown-----------------------
    if ($linkNames[$x] == $pageName && $linkNames[$x] == "Products" || $linkNames[$x] == "Products") {
      echo '<li class="nav-item dropdown">';
      if ($linkNames[$x] == $pageName) {
        echo '<a class="nav-link dropdown-toggle active" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">' . $linkNames[$x] . '</a>';
      } else {
        echo '<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">' . $linkNames[$x] . '</a>';
      }
      echo '<div class="dropdown-menu"> 
              <a class="dropdown-item" href="' . $linkAddresses[$x] . '">All Products</a>
            <div class="dropdown-divider"></div>                     
                <a class="dropdown-item" href="consoles.php">Consoles</a>
                <a class="dropdown-item" href="games.php">Games</a>
            </div>';
      echo '</li>';
    }
    // -----------------it creates the "active" page------------------
    else if ($linkNames[$x] == $pageName) {
      echo '<li class="nav-item">';
      echo '<a ';
      echo 'class="nav-link active" href="' . $linkAddresses[$x] . '">' . $linkNames[$x] . '</a> ';
      echo '</li>';
      // ----------------------dropdown create the rest of the menu--------------
    } else {
      echo '<li class="nav-item">';
      echo '<a ';
      echo 'class="nav-link" href="' . $linkAddresses[$x] . '">' . $linkNames[$x] . '</a>';
      echo '</li>';
    }
  }

  echo '</ul>';
  echo '</div>';

  // recognise if it is a guest, customer or an admin
  if (isset($_SESSION['customer'])) {
    $logged_text = "Hello <br> " . value_needed('full_name') . "!";
    $logged_drop = '<div class="btn-group"> 
                        <button type="button" class="test btn btn-dark dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> 
                          <span class="sr-only">Toggle Dropdown</span>
                        </button><div class="dropdown-menu">
                          <a class="dropdown-item" href="account.php">Account</a>
                          <a class="dropdown-item" href="my_orders.php">My Orders</a>
                        <div class="dropdown-divider"></div>
                          <a class="dropdown-item" onclick="sign_out()">Sign Out</a> 
                      </div>
                  </div>';
  } else if (isset($_SESSION['admin'])) {

    $logged_text = "Hello <br> admin!";
    $logged_drop = "<div class='btn-group'>
                        <button type='button' class='test btn btn-dark dropdown-toggle dropdown-toggle-split' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'> 
                          <span class='sr-only'>Toggle Dropdown</span>
                        </button>
                      <div class='dropdown-menu'>
                         <a class='dropdown-item' href='cms.php'>C.M.S</a>
                      <div class='dropdown-divider'></div>
                         <a class='dropdown-item' onclick='sign_out()'>Sign Out</a> 
                      </div>
                   </div>";
  } else {
    $logged_text = "Hello <br> Visitor!";
    $logged_drop =  '<a href="#myModal" class="trigger-btn" data-toggle="modal"><img  src="../assets/user.png" alt="Logo image"></a>';
  }


  // ---------------code depending from the outcome of the cookies above --------------------
  echo '<div class="user" style="color:white"> 
        <p class="text-center" id="check_login"> ' . $logged_text . ' </p>
        </div>';


  echo ' <div id="user_mode" class="user_login">
          ' . $logged_drop . '
         </div>';
  // search bar implementation
  echo ' <form class="form-inline my-2 my-lg-0 ml-auto"  action="products.php" method="post" >
                <input class="form-control mr-sm-2" name="name" type="search" placeholder="Search" id="search_item" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0"  type="submit">Search</button>
            </form>';

  echo '</div>';
  echo '</div>';
  echo '</div>';
  echo '</nav>';
  echo '<!--------------- Sign IN------------------------->
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
                   <form action="../php_server/find_customer.php" onsubmit="return false" method="post"> 
                      <div class="form-group">
                        <input type="text" id="login_email" name="email" class="form-control" name="username" placeholder="Email" required="required">		
                      </div>
                        <div class="form-group">
                            <input type="password" id="login_password" class="form-control" name="password" placeholder="Password" required="required">	
                        </div>        
                        <p id="login_failure"> </p>
                          <div class="form-group">
                            <button onclick ="login_real(this)" class="btn btn-primary btn-lg btn-block login-btn">Login</button>
                          </div>
                    </form>
                    </div>
                    <div class="modal-footer">
                     <a href="#myModal2" class="trigger-btn" data-toggle="modal" style="color: #1D2934;">New User?</a>
                   </div>
                </div>
             </div>
          </div> ';
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
          <!--- onsubmit="return ajax_axios(this)" onsubmit="../php_server/add_name.php" onsubmit="return validation(this)"-->
            <form action="../php_server/add_name.php" onsubmit="return false" name="form" id="form" method="POST">
                    <div class="form-group">
                        <input type="text" class="form-control" name="name" id="inputName" placeholder="Full Name" onkeyup="check_name(this)" required>
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control" onfocusout="validation(this)" name="email" id="inputEmail" placeholder="Email" onkeyup="check_email(this)" required>
                    </div>
                    <div class="form-group">
                        <input type="date" class="form-control" onfocusout="update(this)" name="birthday" id="inputBirth" placeholder="Birthday" required>
                    </div>
                    <div class="form-group">
                       <input type="text" class="form-control" name="address" id="inputAddress" placeholder="Address" onkeyup="check_address(this)" required>
                    </div>
                      <div class="form-group">
                  <input type="text" class="form-control" name="postcode"  id="inputPostcode" placeholder="Postcode" onkeyup="check_postcode(this)" required>
                    </div>
                      <div class="form-group">
                  <input type="tel" class="form-control" name="phone" id="inputPhone" placeholder="Phone" onkeyup="check_phone(this)" required>
                    </div>
                    <div class="form-group">
                    <input type="password" class="form-control" onfocusout="validation(this)" name="password" id="inputPassword" placeholder="Password" required>
                      </div>
                    
                    <button onclick="validation(this)" class="btn btn-primary center">Register</button>
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
    if ($x == 0) {
      echo '
        <div class="carousel-item demo active">
            <img class="d-flex img-fluid " style="max-width: 550px;" src="' . $products[$x] . '">
        </div>';
    } else {
      echo '
        <div class="carousel-item demo">
            <img class="d-flex img-fluid" style="max-width: 550px;" src="' . $products[$x] . '">
        </div>';
    }
  }
  echo ' 
      </div>
    </div>
      <div class="card-body" style="background-color: #e3f2fd;">
      
        <p class="card-text" style= "text-align: center">Have a look and pick the ' . $Product . ' you think is for you, from <br><strong> PS5, Xbox series X, PS4 and Xbox one</strong></p>
      </div>
      <div class="card-footer bg-dark">
        <a href="products.php" class="btn btn-primary center">See all</a>
      </div>
    </div>
  </div> ';
}

//-------------------product at the home page --------------------------
function intro_product($product_name, $image_path, $id)
{
  $url = "item.php?id=$id";

  echo ' <div class="col-lg-4 col-sm-6 portfolio-item">
                <div class="card h-100">
                <a href="' . $url . '"><img class="card-img-top" src="' . $image_path . '" alt=""></a>
                <div class="card-body">
                    <h4 class="card-title">
                    <a href="' . $url . '">' . $product_name . '</a>
                    </h4>
                </div>
                </div>
           </div>';
}

// ------------------------product in products page------------------------------
function item_show($name, $price, $product_image, $id)
{

  $url = "item.php?id=$id";
  echo '
        <div class="col-lg-4 col-md-6 mb-4 product-body" a-z="' . $name . '" high-low="' . $price . '">
          <div class="card h-100">
                <a href="' . $url . '"><img class="card-img-top" src="' . $product_image . '" alt=""></a>
                    <div class="card-body">
                        <h4 class="card-title">
                        <a href="' . $url . '" class="product_name" >' . $name . '</a>
                        </h4>
                        <h5 class="product_price" > £' . $price . '</h5>
                    </div>
            <div class="card-footer">
        
                <button type="button" onclick="add_basket(this)"  name="' . $id . '" class="btn btn-success mx-auto ">Add Basket</button>

                </div>
          </div>
        </div>';
}

// -------------------------csm user order done-----------------------
function cms_user($name, $price, $stock, $id)
{

  echo '  <tr>
            <td>
              <p href="#">' . $id . '</p>
            </td>
            <td class="member">
              <div class="member-info">
                <p>' . $name . '</p>
              </div>
            </td>
            <td>
              <p>£' . $price . '</p>
            </td>
            <td class="status">
              <span class="status-text status-green">' . $stock . '</span>
            </td>
          </tr>';
}

// -------------------------csm user order done-----------------------
function cms_members($id, $full_name, $email, $postcode )
{

  echo '  <tr>
            <td>
              <p href="#">' . $id . '</p>
            </td>
            <td class="member">
              <div class="member-info">
                <p>' . $full_name . '</p>
              </div>
            </td>
            <td>
              <p>' . $email . '</p>
            </td>
            <td>
              <p>' . $postcode . '</p>
            </td>
          </tr>';
}
// -------------------------csm user order done-----------------------
function cms_orders( $id, $customer_id, $address, $order_cost)
{

  echo '  <tr>
            <td>
              <p href="#">' . $id . '</p>
            </td>
            <td class="member">
              <div class="member-info">
                <p>' . $customer_id . '</p>
              </div>
            </td>
            <td>
              <p>' . $address . '</p>
            </td>
            <td class="status">
              <span >£' . $order_cost . '</span>
            </td>
            <td class="status">
            <span class="status-text status-orange">In progress</span>
          </td>
          </tr>';
}
function user_orders($id, $date, $order_cost)
{

  echo ' <tr>
          <td><a class="navi-link" href="#order-details" data-toggle="modal">'.$id.'</a></td>
          <td>'.$date.'</td>
          <td><span class="badge badge-info m-0">In Progress</span></td>
          <td><span>£'.$order_cost.'</span></td>
        </tr>';
}
function reccomendation($img_url, $id)
{
  $url = "item.php?id=$id";
  echo '
          <div class="col-md-3 col-sm-6 mb-4">
        <a href="' . $url . '">
          <img class="img-fluid" style="max-width:200px;" src="' . $img_url . '" alt="">
        </a>
      </div>';
}


// ---------------------AJAX PHP --------------------------------
function ajax($page, $action)
{
  switch (true) {
      // in case it is a POST request
    case $_SERVER['REQUEST_METHOD'] == 'POST':
      // it is not an ajax call
      $ajax = false;
      // if post it enters in this statement
      if (isset($_POST['ajax_fetch'])) {
        $_POST = (array) json_decode($_POST['ajax_fetch'], false); //decodes from json to object text

        $ajax = true; //it is an ajax call then switches to true

      }

      echo $action("post", $ajax, $_POST);

      $_POST = null;

      break;

      // case the method is "GET" 
    case isset($_GET['ajax_fetch']):
      //declaring the data variable
      $data = $_GET['ajax_fetch'];
      //array that takes the data
      $data_array = (array)json_decode($data, false);

      // calling the action called from the server
      echo $action("get", true, $data_array);
      $_GET  = null;
      break;

    default:

      $_POST = null;
      $page();
      break;
  }
}

//find the right collection
function collect_find($collection)
{
  //Include libraries
  require __DIR__ . '/../vendor/autoload.php';

  //Create instance of MongoDB client
  $mongoClient = (new MongoDB\Client("mongodb://localhost:27017"));
  //Select a database
  $db = $mongoClient->FancyShop;
  //Select a collection 
  $collection = $db->$collection;

  return $collection;
}


//Use this function to get the value needed which can be whatever you need from the database of the customer logged
function value_needed($value)
{
  if (isset($_SESSION['customer'])) {

    $id = $_SESSION['customer']->_ID;

    $collection = collect_find('Users');

    $findCriteria = ['_id' => new MongoDB\BSON\ObjectID($id)];

    //Find the customers that match  this criteria
    $userData = $collection->findOne($findCriteria);

    return $userData->$value;
  } else {

    return false;
  }
}
//-------------------- JS scripts -------------------------------------------------
function scripts()
{
  echo '  <script src="../vendor__/jquery/jquery.min.js"></script>
          <script src="../vendor__/bootstrap/js/bootstrap.bundle.min.js"></script>       
          <script src="../js/cart.js"></script>
          <script src="../js/register.js"></script>
          <script src="../js/login_recognition.js"></script>
          <script src="../js/account_settings.js"></script>
          <script src="../js/sorting.js"></script>
          <script src="../js/ajax.js"></script>';
}


//----------------------Outputs closing body tag and closing HTML tag---------------------
function outputFooter()
{
  echo '
    <footer class="text-white text-center text-lg-start footer_class" style="background-color:#22303E;">
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
            <a href="products.php" class="text-white">All available</a>
          </li>
              <li>
                <a href="consoles.php" class="text-white">Consoles available</a>
              </li>
              <li>
                <a href="games.php" class="text-white">Games available</a>
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


  echo '</body>';
  echo '</html>';
}
