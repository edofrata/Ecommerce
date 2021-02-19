<?php

include('../php/common.php');

$the_page = function () {

   outputHeader("FancyShop");
   outputBannerNavigation("Account");

   scripts();
   outputFooter();
};

// declaring the function which determines if the calls has been made by AJAX or nor
$find_user = function ($method, $ajax, $data) {

   //Include libraries
   $collection = collect_find('Users');

   // it means that AJAX is true and has received the 'ajax_fetch' word
   if ($ajax) {

      //Create a PHP array with our search criteria
      $findCriteria = [
        
         array_keys($data)[0] => array_values($data)[0]
      
      ];

      //Find all of the customers that match  this criteria
      $cursor = $collection->findOne($findCriteria);
      //checks if in the post the request has been made by an admin
      if ($_POST['email'] === 'admin') {
         return 'admin';
      } else {
         // if not returns the user requests
         return json_encode($cursor, JSON_PRETTY_PRINT);
      }
   } else if (isset($_POST['phone']) && !$ajax) {

      $findCriteria = ["email" => $_POST['email']];
      //Find all of the customers that match  this criteria
      $result = $collection->findOne($findCriteria);
      //checks if in the post the request has been made by an admin
      if ($_POST['email'] === 'admin') {
         return header("Location: ../php/cms.php");
      } else {
         return json_encode($result, JSON_PRETTY_PRINT);
      }
   } else if (!$ajax) {

      $findCriteria = ["email" => $_POST['email']];
      //Find all of the customers that match  this criteria
      $result = $collection->findOne($findCriteria);

      if ($_POST['email'] === 'admin') {

         $_SESSION['admin'] = (object) ['email' => $_POST['email'], '_ID' => 'admin_id'];
         return header("Location: ../php/cms.php");
      } else {
         $id = ((array) $result->_id)['oid'];
         $_SESSION['customer'] = (object) ['email' => $_POST['email'], '_ID' => $id];
         return header("Location: ../php/index.php");
            }
   }
};

ajax($the_page, $find_user);
