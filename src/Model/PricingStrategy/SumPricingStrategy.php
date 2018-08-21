<?php

namespace App\Model\PricingStrategy;

class SumPricingStrategy implements PricingStrategyInterface
{
    public function calculatePrice($pricePerProduct, $quantity)
    {
        return $pricePerProduct * $quantity;
    }
}