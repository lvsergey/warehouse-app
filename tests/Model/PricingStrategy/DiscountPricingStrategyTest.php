<?php

namespace App\Tests\Model\PricingStrategy;

use App\Model\PricingStrategy\DiscountPricingStrategy;
use PHPUnit\Framework\TestCase;

class DiscountPricingStrategyTest extends TestCase
{
    /**
     * @dataProvider dataCalculatePrice
     */
    public function testCalculatePrice($discount, $pricePerProduct, $quantity, $expectedPrice)
    {
        $pricingStrategy = new DiscountPricingStrategy($discount);
        $actualPrice = $pricingStrategy->calculatePrice($pricePerProduct, $quantity);
        $this->assertEquals($actualPrice, $expectedPrice);
    }

    public function dataCalculatePrice()
    {
        return [
            [50, 10, 10, 50],
            [0, 10, 10, 100],
            [100, 10, 10, 0]
        ];
    }
}

// php vendor/bin/phpunit tests/Model/PricingStrategy


