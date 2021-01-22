<?php
include('common.php');
outputHeader("FancyShop");
outputBannerNavigation("Home");
?>
<!------------------------------- CMS LAYOUT SIDEBAR-------------------------------------->
<div class="cms_body">
<div class="container-fluid">
  <div class="row">
    <nav class="col-md-2 d-none d-md-block sidebar">
      <div class="sidebar-sticky">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link " href="cms.php">
              <i class="zmdi zmdi-widgets"></i>
              Dashboard 
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="cms_products.php">
              <i class="zmdi zmdi-shopping-cart"></i>
              Products <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <i class="zmdi zmdi-accounts"></i>
              Members
            </a>
          </li>
        </ul>

        <h6 class="sidebar-heading d-flex justify-content-between align-items-center pl-3 mt-4 mb-1 text-muted">
          <span>Saved reports</span>
          <a class="d-flex align-items-center text-muted" href="#">
            <i class="zmdi zmdi-plus-circle-o"></i>
          </a>
        </h6>
        <ul class="nav flex-column mb-2">
          <li class="nav-item">
            <a class="nav-link" href="#">
              <i class="zmdi zmdi-file-text"></i>
              Current month
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <i class="zmdi zmdi-file-text"></i>
              Last quarter
            </a>
          </li>
        </ul>
      </div>
    </nav>

    <!------------------------------------ CARDS LAYOUT--------------------------------->
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 my-3">
      <div class="card-list">
        <div class="row">
          <div class="col-12 col-md-6 col-lg-4 col-xl-3 mb-4">
            <div class="card_cms blue">
              <div class="title">all products</div>
              <div class="value">5</div>
              <div class="stat"><b>13</b>% increase</div>
            </div>
          </div>
          <div class="col-12 col-md-6 col-lg-4 col-xl-3 mb-4">
            <div class="card_cms green">
              <div class="title">members</div>
              <div class="value">3</div>
              <div class="stat"><b>4</b>% increase</div>
            </div>
          </div>
          <div class="col-12 col-md-6 col-lg-4 col-xl-3 mb-4">
            <div class="card_cms orange">
              <div class="title">total budget</div>
              <div class="value">£30,000</div>
              <div class="stat"><b>3% decrease</b></div>
            </div>
          </div>
          <div class="col-12 col-md-6 col-lg-4 col-xl-3 mb-4">
            <div class="card_cms red">
              <div class="title">new customers</div>
              <div class="value">3</div>
              <div class="stat"><b>13</b>% decrease</div>
            </div>
          </div>
        </div>
      </div>

      <!------------------------------ TABLE LAYOUT----------------------->
      <div class="projects mb-4">
        <div class="projects-inner">
          <header class="projects-header">
            <div class="title">Products</div>
            <div class="count">| 5 products</div>
            <button type="button" class="btn btn-info">Add Product</button>
            <button type="button" class="btn btn-danger">Delete Product</button>
            <i class="zmdi zmdi-download"></i>
          </header>
          <table class="projects-table">
            <thead>
              <tr>
                <th>Attribute</th>
                <th>Date</th>
                <th>Name</th>
                <th>Price</th>
                <th>Stock</th>
              </tr>
            </thead>

<!-------------- USER PROMPT FROM PHP --------------------------->
<?php 

csm_user("15th Jan 2021", "Playstation 4 Pro", "£299");
csm_user("15th Jan 2021", "Playstation 5", "£499");
csm_user("15th Jan 2021", "Xbox One", "£459");
csm_user("15th Jan 2021", "Xbox Series X", "£299");
csm_user("15th Jan 2021", "Matt Watson", "£299");
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
outputFooter();
?>
