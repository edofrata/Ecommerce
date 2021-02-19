<?php
include('common.php');
outputHeader("FancyShop");
outputBannerNavigation("Home");
?>
<!-------------------------END PHP--------------------------------------->
<header>
  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">

    <div class="carousel-inner" role="listbox">
      <!-- Slide One - Set the background image for this slide in the line below -->
      <div class="carousel-item active" style="background-image: url('../assets/game_images/spiderman.png')">
        <div class="carousel-caption d-none d-md-block">
        </div>
      </div>
      <!-- Slide Two - Set the background image for this slide in the line below -->
      <div class="carousel-item" style="background-image: url('../assets/game_images/fifa21.jpg')">
        <div class="carousel-caption d-none d-md-block">
        </div>
      </div>
      <!-- Slide Three - Set the background image for this slide in the line below -->
      <div class="carousel-item" style="background-image: url('../assets/game_images/watch_dogs.jpg')">
        <div class="carousel-caption d-none d-md-block">
        </div>
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
</header>


<!-- Page Content -->
<div class="container">

  <!-- <h1 class="my-4" style="text-align: center">Welcome to</h1> -->
  <img class=" logo_style_index center" style="text-align: centre" src="../assets/logo.png" alt="Logo image">

  <!-- Marketing Icons Section -->
  <div class="row">

    <?php
    cards("Consoles", $url_consoles);

    cards("Games", $url_games);
    ?>

    <!-- Portfolio Section -->
    <div>
      <h2 style="text-align: center">Products</h2>

      <div class="row">

<!-- function that prints out the cards of the first six products -->
        <?php

        $collection = collect_find('Products');

        $products = $collection->find();
        // incrementing the iterator so I can show only the firtst 6 products
        $i = 0;
        // iterating through the products
        foreach($products as $item){

          $id  = ((array) $item['_id'])['oid'];
          $item = (array) $item;
          if($item['Category'] == "Game" && $i < 6){
            intro_product($item['name'], $item['img_url'], $id);
            $i++;
            }

        }

        ?>

<!--------------------------------END-------------------------------->

      </div>
    </div>
  </div>
  <!-- /.row -->
</div>
<!-- /.container -->

<!-- Footer -->
<?php
scripts();
outputFooter();
?>