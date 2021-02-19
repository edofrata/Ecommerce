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
// ---------- diplaying only the console and retriving the information needed from the databse -----------
                    $collection = collect_find('Products');

                    $products = $collection->find();

                    foreach ($products as $item) {

                        $id  = ((array) $item['_id'])['oid'];
                        $item = (array) $item;
                        if ($item['Category'] == "Console") {
                            item_show($item['name'], $item['price'], $item['img_url'], $id);
                        }
                    }
                    ?>
                    
                </div>
            </div>


        </div>


    </div>

</div>
<?php
scripts();
outputFooter();
?>