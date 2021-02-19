<?php
include('common.php');

// setting up the information needed for creating the page of the individual product
$item_data;


// if the get is empty and inside there is not 'id' it won't enter 
if (isset($_GET['id'])) {
  // retrieving the ID
  $id = $_GET['id'];

  //------ retrieving the products ------------
  $collection = collect_find('Products');

  $findCriteria = ['_id' => new MongoDB\BSON\ObjectID($id)];


  $result = $collection->findOne($findCriteria);


  // if statement about the result if is not undefined
  if ($result) {

    $item_data = $result;
    // else it will redirect me to the index page
  } else {

    header("Location: index.php");
  }

  // if the first is not true it will redirect me to the index page
} else {

  header("Location: index.php");
}


outputHeader("FancyShop");
outputBannerNavigation("Products");
?>

<?php


// if the category is equal to Console it will show a certain page 
if ($item_data->Category === 'Console') {
  $id = ((array)$item_data->_id)['oid'];
  echo ' <!-- Page Content -->
  <div class="container">

    <!-- Portfolio Item Row -->
    <div class="row my-4">

      <div class="col-md-8">
        <img class="img-fluid" style="max-width:500px;" src=' . $item_data->img_url . ' alt="">
      </div>

      <div class="col-md-4">
        <h3 class="my-3"><strong>' . $item_data->name . '</strong></h3>
        <p>' . $item_data->description . '</p>
        <h3 class="my-3">Specifications:</h3>
        <ul>
          <li><strong> CPU: </strong> ' .  $item_data->CPU . '	</li>
          <li><strong> GPU: </strong>	' . $item_data->GPU . ' </li>
          <li><strong> Memory: </strong> ' . $item_data->internal_storage . ' </li>
          <li><strong> Networking: </strong>	' . $item_data->external_storage . ' </li>
          <li><strong> Price: </strong>	£ ' .  $item_data->price . ' </li>
        </ul>
        <button type="button" onclick="add_basket(this)" name="' . $id . '" class="btn btn-success center">Add to basket</button>
      </div>
    
    </div>
    <!-- Related Projects Row -->
    <h3 class="my-4">Related Products</h3>

    <div class="row">';


  // ---------- diplaying only the console and retriving the information needed from the databse -----------
  $collection = collect_find('Products');

  $products = $collection->find();

  $i = 0;
  foreach ($products as $item) {

    $id  = ((array) $item['_id'])['oid'];
    $item = (array) $item;
    if ($item['Category'] == "Console" && $i < 4) {
      reccomendation($item['img_url'], $id);
      $i++;
    }
  }

  echo ' 
   <!-- /.row -->
    </div>
  </div>';
} else {
  // else if means that is a game and it shows a different page
  $id = ((array)$item_data->_id)['oid'];
  echo ' <!-- Page Content -->
  <div class="container">

    <!-- Portfolio Item Row -->
    <div class="row my-4">

      <div class="col-md-8">
        <img class="img-fluid" style="max-width:500px;" src=' . $item_data->img_url . ' alt="">
      </div>

      <div class="col-md-4">
        <h3 class="my-3"><strong>' . $item_data->name . '</strong></h3>
        <h3 class="my-3">Price:</h3>
        <ul>
        
          <li><strong> Price: </strong>	£ ' .  $item_data->price . ' </li>
        </ul>
        <button type="button" onclick="add_basket(this)" name="' . $id . '" id="prodButt" class="btn btn-success center">Add to basket</button>
      </div>

    </div>
    <!-- Related Projects Row -->
    <h3 class="my-4">Related Products</h3>

    <div class="row">';


  // ---------- diplaying only the console and retriving the information needed from the databse -----------
  $collection = collect_find('Products');

  $products = $collection->find();

  $i = 0;
  foreach ($products as $item) {

    $id  = ((array) $item['_id'])['oid'];
    $item = (array) $item;
    if ($item['Category'] == "Game" && $i < 4) {
      reccomendation($item['img_url'], $id);
      $i++;
    }
  }

  echo ' 
   <!-- /.row -->
    </div>
  </div>';
}
?>


<?php
scripts();
outputFooter();
?>