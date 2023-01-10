<?php 
// Model(model.php)を読み込む
require_once 'model2.php';

$product_data = [];
$pdo = get_connection();
$product_data = get_product_list($pdo);
$product_data = h_array($product_data);

// View(view.php)を読み込む
include_once 'view2.php';