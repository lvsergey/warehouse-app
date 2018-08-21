<?php

namespace App\Model\PricingStrategy;

interface PricingStrategyInterface
{
    public function calculatePrice($pricePerProduct, $quantity);
}