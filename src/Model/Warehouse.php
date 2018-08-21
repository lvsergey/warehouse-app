<?php

namespace App\Model;

class Warehouse
{
    /**
     * @var ProductBatch[]
     */
    private $batches;

    /**
     * @var string
     */
    private $address;

    public function __construct($address)
    {
        $this->address = $address;
        $this->batches = [];
    }

    public function add(ProductBatch $newBatch)
    {
        $identity = $newBatch->getIdentity();
        if (isset($this->batches[$identity])) {
            $this->batches[$identity] = $this->batches[$identity]->append($newBatch);
        } else {
            $this->batches[$identity] = $newBatch;
        }
    }

    public function getProductsPrice()
    {
        $result = 0;
        foreach ($this->batches as $batch) {
            $result += $batch->getPrice();
        }

        return $result;
    }
}