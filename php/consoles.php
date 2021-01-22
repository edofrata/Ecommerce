<?php
include('common.php');
outputHeader("FancyShop");
outputBannerNavigation("Products");
?>
<!-- Page Content for consoles -->
<div class="container">

    <div class="row">

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