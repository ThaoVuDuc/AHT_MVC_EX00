<?php
//create_product.php
require_once "bootstrap.php";

$newProductName = $argv[1];

$product = new Product();
$product->setName($newProductName);

$entityManager->persist($product);
$entityManager->flush();

echo "created Product with ID ". $product->getId() . "\n";
