<?php
include('common.php');
outputHeader("FancyShop");
outputBannerNavigation("Basket");
?>
  <!-- Page Content -->
  <div class="container">

    <!-- Portfolio Item Row -->
    <div class="row my-4">

      <div class="col-md-8">
        <img class="img-fluid" style="max-width:700px;" src="../assets/game_console/playstation5.jpeg" alt="">
      </div>

      <div class="col-md-4">
        <h3 class="my-3"><strong>Playstation 5</strong></h3>
        <p>The new generation is here, play the latest games at the best ps nevers seen before in a Playstation 5, where you will enjoy every aspect of the new console.</p>
        <h3 class="my-3">Specifications:</h3>
        <ul>
          <li><strong> CPU: </strong>	x86-64-AMD Ryzen Zen 8 Cores / 16 Threads at 3.5GHz (variable frequency)</li>
          <li><strong> GPU: </strong>	Ray Tracing Acceleration, Up to 2.23 GHz (10.3 TFLOPS)</li>
          <li><strong> Memory: </strong>16GB GDDR6/256-bit</li>
          <li><strong> Networking: </strong>	Ethernet (10BASE-T, 100BASE-TX, 1000BASE-T)<br> IEEE 802.11 a/b/g/n/ac/ax<br> Bluetooth 5.1</li>
        </ul>
        <button type="button" class="btn btn-success center">Add to basket</button>
      </div>
    
    </div>
    <!-- /.row -->

    <!-- Related Projects Row -->
    <h3 class="my-4">Related Projects</h3>

    <div class="row">

      <div class="col-md-3 col-sm-6 mb-4">
        <a href="#">
          <img class="img-fluid" style="max-width:200px;" src="../assets/game_cover/fifa21_game.jpg" alt="">
        </a>
      </div>

      <div class="col-md-3 col-sm-6 mb-4">
        <a href="#">
          <img class="img-fluid" style="max-width:200px;" src="../assets/game_cover/spiderman_ps5.jpg" alt="">
        </a>
      </div>

      <div class="col-md-3 col-sm-6 mb-4">
        <a href="#">
          <img class="img-fluid" style="max-width:200px;" src="../assets/game_cover/watch_dogsps4.jpg" alt="">
        </a>
      </div>

      <div class="col-md-3 col-sm-6 mb-4">
        <a href="#">
          <img class="img-fluid" style="max-width:200px;" src="../assets/game_cover/god_of_war.jpg" alt="">
        </a>
      </div>

    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->

  <?php
scripts();
outputFooter();
?>