<?php
include('common.php');
outputHeader("FancyShop");
outputBannerNavigation("Products");
?>
<!-- Page Content for consoles -->
<div class="container">

    <div class="row">

        <!-- <div class="col-lg-3">

      <h1 class="my-4">Products</h1>
      <div class="list-group">
        <a href="products.php" class="list-group-item">All Products</a>
        <a href="consoles.php" class="list-group-item">Consoles</a>
        <a href="games.php" class="list-group-item">Games</a>

      </div>

    </div> -->

        <div class="col-lg-12">

            <div class="container">
                <h1 class="my-4" style="text-align: center">Consoles</h1>
                <div class="row">
                    <?php

                    // ---------------CONSOLES-----------------------
                    item_show("Playstation 5", "£499.99", "../assets/game_console/playstation5.jpeg");
                    item_show("Xbox Serie X", "£449.99", "../assets/game_console/xbox_x.jpg");
                    item_show("Playstation 4 Pro", "£259.99", "../assets/game_console/ps4_pro.jpeg");
                    item_show("Xbox One", "£199.99", "../assets/game_console/xbox_one_buy.jpg");

                    ?>
                </div>
            </div>


        </div>


    </div>

</div>
<?php
outputFooter();
?>