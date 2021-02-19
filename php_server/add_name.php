<?php


// Include libraries
require __DIR__ . '/../vendor/autoload.php';

//Create instance of MongoDB client
$mongoClient = (new MongoDB\Client("mongodb://localhost:27017"));

//Select a database
$db = $mongoClient->FancyShop;

//Select a collection 
$collection = $db->Users;

// //Extract the data that was sent to the server
$name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
$birthday = filter_input(INPUT_POST, 'birthday', FILTER_SANITIZE_STRING);
$address =  filter_input(INPUT_POST, 'address', FILTER_SANITIZE_STRING);
$postcode =  filter_input(INPUT_POST, 'postcode', FILTER_SANITIZE_STRING);
$phone = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_STRING);
$password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

//Convert to PHP array
$dataArray = [
    "full_name" => $name,
    "email" => $email,
    "birthday" => $birthday,
    "address" => $address,
    "postcode" => $postcode,
    "phone" => $phone,
    "password" => $password
];

//Add the new User to the database
$insertResult = $collection->insertOne($dataArray);


//Echo result back to user
if ($insertResult->getInsertedCount() == 1) {
    echo '<script> 
            alert("The Registration Was successfull");
            location.replace("../php/index.php");
          </script>';
} else {
    echo '<script>
            alert("The Registration has an error");
            </script>';
}
