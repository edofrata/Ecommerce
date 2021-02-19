<?php

include("../php/common.php");

// this function will respond dependending the data received from the ajax 
$add_basket = function ($method, $ajax, $data) {


    // if the session is filled with the 'customer' key it will be fine if not it will return 'null'
    if (!isset($_SESSION['customer'])) {

        return 'null';
    } else {
        // it enters here if a user is logged
        $collection = collect_find('Carts');
        $user_id = $_SESSION['customer']->_ID;
        $findCriteria = ['customer_id' => $user_id];
        // depending from the method it will enter one of the statement
        if ($method == 'get') {

            if ($data[0] == 1) {
                $cart = array();
                // looking for criterias
                $result = (array) $collection->findOne($findCriteria);

                $products = (array) $result['products'];
                $coll_products = collect_find('Products');
                // this will get the product and quantity
                foreach ($products as $item => $quantity) {

                    $product_id = ['_id' => new MongoDB\BSON\ObjectID($item)];
                    $product_data = (array) $coll_products->findOne($product_id);

                    array_push($cart, $product_data);
                };

                return json_encode($cart);
            } else if ($data[0] == "id") {

                return $user_id;
            }
            // if the method is equal to post it means that the user is adding something to the basket
        } else if ($method == 'post') {


            if (isset($data['id'])) {

                $product_id = $data['id'];
                // searching the id
                $search_criteria = ['customer_id' => $user_id];

                // retrieving the data from the user cart
                $old_cart = ((array) $collection->findOne($search_criteria));
                $old_cart = isset($old_cart['products']) ? $old_cart['products'] : $old_cart;

                // if the user has not already a basket it will enter here
                if (!$old_cart) {

                    $create_cart = [
                        'customer_id' => $user_id,
                        'products' => $product_id
                    ];
                    $collection->insertOne($create_cart);
                }
                if (!isset($old_cart[$product_id])) {
                    $old_cart[$product_id] = 1;
                }
                $new_cart = ["products" => (object) $old_cart];
                $update_result = collect_find("Carts")->updateOne($search_criteria, ['$set' => $new_cart]);

                if ($update_result->getMatchedCount()) {
                    return $update_result->getModifiedCount() ? "Successfully Added" : 2;
                } else {

                    return 0;
                }
            }
        } else {

            return "ciao";
        }
    }
};





$page = function () {
    return "";
};
ajax($page, $add_basket);
