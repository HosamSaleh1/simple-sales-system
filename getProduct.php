<?php

include_once 'app/database/models/Product.php';

if ($_GET) {
    $id = intval($_GET['id']);
    $productObject = new Product;

    $productData = $productObject->productDetails($id)->fetch_object();
    echo json_encode($productData);
} else {
    header('location: index.php');
}