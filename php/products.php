<?php
include('common.php');

// function that prints out all the products and uses the function which is in 'common.php'
function cards_print($products)
{

  if (!$products) {
    $collection = collect_find('Products');
    $products = $collection->find();
  }

  foreach ($products as $item) {

    $id  = ((array) $item['_id'])['oid'];
    $item = (array) $item;
    item_show($item['name'], $item['price'], $item['img_url'], $id);
  }
}

// main page
function page($data)
{

  echo '       
        <!---------------- Page Content ----------------------------->
        <div class="container">

          <div class="row">


            <div class="col-lg-12">

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
              <div class="container">
                <div class="d-flex justify-content-end pb-3">
                  <div class="form-inline">
                    <label class="text-muted mr-3" for="order-sort">Sort Products</label>
                    <select class="form-control" id="order_sort" onfocusout="sorting_products(this)">
                      <option>All</option>
                      <option>A-Z</option>
                      <option>High-Low</option>
                    </select>
                  </div>
                </div>
                <h1 class="my-4" style="text-align: center">All Products</h1>

                <div class="row" id="cards_box">';

  // printing all the products in the database 
  cards_print($data);


  echo '
        </div>
      </div>


    </div>


  </div> 

</div> ';
}
// main which called from the ajax function made with PHP
function main_page($data)
{
  // header
  outputHeader("FancyShop");
  outputBannerNavigation("Products");
  // body
  page($data);
  // footer
  scripts();
  outputFooter();
};

$main = function () {


  main_page("");
};



// -----------------------SEARCHING BAR----------------------------
$find_products = function ($method, $ajax, $data) {

  //Include libraries
  $collection = collect_find('Products');

  $find_item = [
// making mongoDB case insensitive and finds all the words no matter capitals or half word
    "name" => new \MongoDB\BSON\Regex(preg_quote($data['name']), "i")

  ];

  $cursor = $collection->find($find_item);


  main_page($cursor->toArray());

};

ajax($main, $find_products);
