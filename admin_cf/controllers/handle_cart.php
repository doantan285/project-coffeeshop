<?php
session_start();
require '../../constant.php';

require dir_admin . '/config/database.php';
require dir_admin . '/models/cart.php';

if (isset($_POST['add_to_cart'])) {
    $productName = $_POST['product_name'];
    $price = $_POST['product_price'];
    $categoryID = $_POST['category_id'];
    $product_img = $_POST['product_img'];
    
    Cart::addToCart($productName, $product_img, $price, $categoryID);
}

if (isset($_POST['remove_item'])) {
    $productName = $_POST['product_name'];
    Cart::removeFromCart($productName);

    header('Location:http://localhost/coffee_shop/index.php?page=cart');
}

if (isset($_POST['remove_cart_item'])) {
    $productName = $_POST['product_name'];
    $categoryID = $_POST['category_id'];
    Cart::removeFromCart($productName);

    if ($categoryID == 1) {
        header('Location:http://localhost/coffee_shop/#coffee');
    }
    elseif ($categoryID == 2) {
        header('Location:http://localhost/coffee_shop/#cake');
    }
    
}