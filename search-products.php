<?php
include 'v-templates/header.php';
$product_name = $_POST['product_name'];
$pro_details = $manageContent->getProductDetailsInDescriptionPage($product_name, $baseUrl);
if(!$pro_details[0][''])
header('Location:'.$baseUrl.'product_description/'.$product_name);
?>
