<?php
include('common.php');
outputHeader("FancyShop");
outputBannerNavigation("Products");
?>



<!--------------------------- GAME PAGE LAYOUT---------------------------------->
<div class="col-lg-12">

<div class="container">
    <h1 class="my-4" style="text-align: center">Consoles</h1>
    <div class="row">
 <!---------------------- ITEM PROMPED FROM PHP --------------------->
        <?php

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