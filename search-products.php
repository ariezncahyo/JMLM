<?php
include 'v-templates/header.php';
$product_name = $_POST['product_name'];
$pro_details = $manageContent->searchProductLikely($product_name, $baseUrl);
?>
