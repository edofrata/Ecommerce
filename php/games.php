<?php
include('common.php');
outputHeader("FancyShop");
outputBannerNavigation("Products");
?>



<!--------------------------- GAME PAGE LAYOUT---------------------------------->
<div class="col-lg-12">

    <div class="container">
        <h1 class="my-4" style="text-align: center">Games</h1>
        <div class="row">
            <!---------------------- ITEM PROMPED FROM PHP --------------------->
            <?php
// ---------- diplaying only the games and retriving the information needed from the databse -----------
            $collection = collect_find('Products');

            $products = $collection->find();

            foreach ($products as $item) {

                $id  = ((array) $item['_id'])['oid'];
                $item = (array) $item;
                if($item['Category'] == "Game"){
                    item_show($item['name'], $item['price'], $item['img_url'], $id);
                    }
            }
            ?>
        </div>
    </div>


</div>

<?php
scripts();
outputFooter();
?>