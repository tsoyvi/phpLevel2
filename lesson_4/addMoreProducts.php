<?php
session_start();

require_once 'db.php';
require_once 'product.php';

$db = new Database();
$products = new Products($db->connect);

$_POST = json_decode(file_get_contents("php://input"), true);

$limit = 3;

if ($_POST['limit'] != 0) {
    $_SESSION['limit'] += $limit;
} else {
    $_SESSION['limit'] = 0;
}


$result = $products->requestLimitProducts($_SESSION['limit'], $limit);
$results = $products->displayProducts($result);

$json = json_encode(
    array(
        "results" => $results,
    )
);

echo $json;

