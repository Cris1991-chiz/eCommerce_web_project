<?php

// require MySQL Connection
require ('database/DBController.php');

// require MySQL Connection
require ('database/Product.php');

// require MySQL Connection
require ('database/Cart.php');

require ('database/User.php');

require ('database/Search.php');

$database = new DBController();

$db = $database->connect();

$product = new Product($db);

//print_r($product->getData()); Use to debug

$shuffle_Product = $product->getData();

$Cart = new Cart($db);

/*$arr = array(
    "userid" => 1,
    "item_id" => 7
);
$Cart->insertIntoCart($arr); //Use to debug*/

//print_r($Cart->getCartId($product->getData('market.cart')));

$Users = new User($db);

$errors = array();

$Search = new Search($db);
//print_r($Search->searchProducts());
//echo "<prev>" .print_r($Search->searchProducts('market.product')). "</prev>";