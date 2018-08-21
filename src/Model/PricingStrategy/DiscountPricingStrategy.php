<?php

namespace App\Model\PricingStrategy;

class DiscountPricingStrategy implements PricingStrategyInterface
{
    /**
     * @var float
     */
    private $discount;

    public function __construct($discount)
    {
        $this->discount = $discount;
    }

    public function calculatePrice($pricePerProduct, $quantity)
    {
        return ($pricePerProduct * $quantity) * ($this->discount / 100);
    }
}