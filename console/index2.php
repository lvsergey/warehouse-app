<?php

require_once '../vendor/autoload.php';

$product = new \App\Model\Product('pen', 10);

$store = new \App\Model\Warehouse('kompros-1');
$store->add(
    new \App\Model\ProductBatch(
        $product,
        5,
        new \App\Model\PricingStrategy\SumPricingStrategy()
    )
);
$store->add(
    new \App\Model\ProductBatch(
        $product,
        10,
        new \App\Model\PricingStrategy\DiscountPricingStrategy(50)
    )
);

echo $store->getProductsPrice();