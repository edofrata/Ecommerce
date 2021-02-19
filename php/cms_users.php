<?php
include('common.php');
outputHeader("FancyShop");
outputBannerNavigation("C.M.S");

// function that displays the information on the table and creates the rows with the information requested
function products_table()
{

  $collection = collect_find('Products');

  $products = $collection->find();

  foreach ($products as $item) {

    $id  = ((array) $item['_id'])['oid'];
    $item = (array) $item;
    cms_user($item['name'], $item['price'], $item['stock'], $id);
  }
}
// gets the count of the products for the cms cards
function count_products($collection)
{

  $collection_prod = collect_find($collection);

  $cursor = $collection_prod->find()->toArray();

  return count($cursor);
}
// percentage formula for the cms cards 
function percentage($collection)
{

  $number = 10;
  $new_number = count_products($collection);

  $new_value = $new_number - $number;

  $percentage = abs(($new_value / $number) * 100);


  if ($new_number < $number) {

    return $percentage . '% decrease';
  } else if ($new_number == $number) {

    return $percentage . '%';
  } else {

    return $percentage . '% increase';
  }
}

echo '
<!------------------------------- CMS LAYOUT SIDEBAR-------------------------------------->
<div class="cms_body">
<div class="container-fluid">
  <div class="row">
    <nav class="col-md-2 d-none d-md-block sidebar">
      <div class="sidebar-sticky">
        <ul class="nav flex-column">
          <li class="nav-item">
          <a class="nav-link " href="cms_products.php">
          <i class="zmdi zmdi-shopping-cart"></i>
          Products 
        </a>
          </li>
          <li class="nav-item">
             <a class="nav-link" href="cms.php">
              <i class="zmdi zmdi-widgets"></i>
             Orders 
            </a>
          </li>
          <li class="nav-item">
          <a class="nav-link active" href="cms_users.php">
           <i class="zmdi zmdi-widgets"></i>
         Users <span class="sr-only">(current)</span>
         </a>
       </li>
        </ul>
      </div>
    </nav>

    <!------------------------------------ CARDS LAYOUT--------------------------------->
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 my-3">
      <div class="card-list">
        <div class="row justify-content-center">
          <div class="col-12 col-md-6 col-lg-4 col-xl-3 mb-4">
            <div class="card_cms blue">
              <div class="title">all products</div>
              <div class="value">' . count_products('Products') . '</div>
              <div class="stat">' . percentage('Products') . '</div>
            </div>
          </div>
          <div class="col-12 col-md-6 col-lg-4 col-xl-3 mb-4">
            <div class="card_cms green">
              <div class="title">members</div>
              <div class="value">' . count_products('Users') . '</div>
              <div class="stat">' . percentage('Users') . '</div>
            </div>
          </div>
          <div class="col-12 col-md-6 col-lg-4 col-xl-3 mb-4">
            <div class="card_cms red">
              <div class="title">Orders</div>
              <div class="value">' . count_products('Orders') . '</div>
              <div class="stat"><b>' . percentage('Orders') . '</div>
            </div>
          </div>
        </div>
      </div>

      <!------------------------------ TABLE LAYOUT----------------------->
      <div class="projects mb-4">
        <div class="projects-inner">
          <header class="projects-header">
            <div class="title">Products</div>

            <i class="zmdi zmdi-download"></i>
          </header>
          <table class="projects-table">
            <thead>
              <tr>
                <th>ID</th>
                <th>Full Name</th>
                <th>Email</th>
                <th>Postcode</th>
              </tr>
            </thead>


<!-------------- USER PROMPT FROM PHP --------------------------->';




// php which will display the orders in the cms table
$collection = collect_find('Users');

$products = $collection->find();

foreach ($products as $item) {

  $id  = ((array) $item['_id'])['oid'];
  $item = (array) $item;
  cms_members($id, $item['full_name'], $item['email'], $item['postcode']);
}

?>

</table>
</div>
</div>
</div>
</main>
</div>
</div>

</div>
<?php
scripts();
outputFooter();
?>