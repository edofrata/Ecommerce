<?php
include('common.php');
outputHeader("FancyShop");
outputBannerNavigation("Products");
?>
<!-- Page Content -->
<div class="container" >

  <div class="row">

    <div class="col-lg-3">

      <h1 class="my-4">Products</h1>
      <div class="list-group">
        <a href="products.php" class="list-group-item">All Products</a>
        <a href="#" class="list-group-item">Consoles</a>
        <a href="#" class="list-group-item">Games</a>

      </div>

    </div>
    <!-- /.col-lg-3 -->

    <div class="col-lg-9">

      <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
        <div class="carousel-inner" role="listbox">
          <div class="carousel-item products active">
            <img class="d-block img-fluid" src="../assets/game_images/ps5_ad.png" alt="First slide">
          </div>
          <div class="carousel-item products ">
            <img class="d-block img-fluid" src="../assets/game_images/xboxonex_ad.jpg" alt="Second slide">
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
      <div class="container" >
        <h1 class="my-4" style="text-align: center">All Products</h1>
        <div class="row">
          <?php

          // ---------------CONSOLES-----------------------
          item_show("Playstation 5", "£499.99", "../assets/game_console/playstation5.jpeg");
          item_show("Xbox Serie X", "£449.99", "../assets/game_console/xbox_x.jpg");
          item_show("Playstation 4 Pro", "£259.99", "../assets/game_console/ps4_pro.jpeg");
          item_show("Xbox One", "£199.99", "../assets/game_console/xbox_one_buy.jpg");


          // -------------------GAMES--------------------------
          item_show("Fifa 21", "£49.99", "../assets/game_cover/fifa21_game.jpg");
          item_show("Fortnite", "£24.99", "../assets/game_cover/fortnite_game.jpg");
          item_show("Marvel’s Spider-Man: Miles Morales", "£69.99", "../assets/game_cover/spiderman_ps5.jpg");
          item_show("Forza Horizon 4", "£59.99", "../assets/game_cover/forza_horizon_xbox.jpg");
          item_show("Grand Theft AUto V", "£25.99", "../assets/game_cover/gtav.jpg");
          item_show("Watch Dogs Legion", "£34.99", "../assets/game_cover/watch_dogsps4.jpg");
          item_show("Red Dead Redemption II", "£29.99", "../assets/game_cover/red_dead.jpg");
          item_show("God Of War", "£39.99", "../assets/game_cover/god_of_war.jpg");

          ?>
        </div>
      </div>


    </div>


  </div>

</div>

<?php
outputFooter();
?>