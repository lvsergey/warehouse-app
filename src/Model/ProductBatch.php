<?php

namespace App\Model;

use App\Model\PricingStrategy\PricingStrategyInterface;

class ProductBatch
{
    /**
     * @var Product
     */
    private $product;

    /**
     * @var int
     */
    private $quantity;

    /**
     * @var PricingStrategyInterface
     */
    private $pricingStrategy;

    public function __construct(Product $product, $quantity, PricingStrategyInterface $pricingStrategy)
    {
        $this->product = $product;
        $this->quantity = $quantity;
        $this->pricingStrategy = $pricingStrategy;
    }

    public function append(self $batch)
    {
        if ($this->getIdentity() !== $batch->getIdentity()) {
            throw new \InvalidArgumentException('Cannot merge batches with different identity');
        }
        return new self($this->product, $this->quantity + $batch->quantity, $this->pricingStrategy);
    }

    public function getPrice()
    {
        return $this->pricingStrategy->calculatePrice(
            $this->product->getPrice(),
            $this->quantity
        );
    }

    public function getIdentity()
    {
        return serialize([$this->product->getName(), $this->pricingStrategy]);
    }
}