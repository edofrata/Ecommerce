<?php

include('../php/common.php');

$replace_user = function ($method, $ajax, $data) {

    if (isset($_SESSION['customer'])) {


        $collection = collect_find('Users');

        $id = $_SESSION['customer']->_ID;

        //Criteria for finding document to replace
        $id_user= [ "_id" => new MongoDB\BSON\ObjectID($id)];


        //Data to replace
        $customerData = [
            "full_name" => ((array) $data)['new_name'],
            "email" => ((array) $data)['new_email'],
            "birthday" => ((array) $data)['new_dob'],
            "address" => ((array) $data)['new_street'],
            "postcode" => ((array) $data)['new_postcode'],
            "phone" => ((array) $data)['new_phone'],
            "password" => ((array) $data)['new_password']
        ];

        //Replace customer data for this ID
        $updateRes = $collection->replaceOne($id_user, $customerData);

        //Echo result back to user
        if ($updateRes->getModifiedCount() == 1) {
            return header("Location: ../php/account.php");
        } else {

            return false;
        }
    }
};

ajax('void Page', $replace_user);
