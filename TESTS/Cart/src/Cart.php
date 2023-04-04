<?php

class Cart
{

    protected $storage;
    protected float $tva;

    public function __construct($storage, float $tva = .2)
    {
        $this->storage = $storage;
        $this->tva = $tva;
    }

    public function buy(Product $product, $quantity)
    {
        $total =  round($product->getPrice() * $quantity * (1 + $this->tva), 2);

        if (array_key_exists($product->getName(), $this->storage)) {
            $this->storage[$product->getName()] += $total;

            return;
        }

        $this->storage[$product->getName()] = $total;
    }

    public function total(): float
    {

        return array_sum($this->storage);
    }

    public function restore(Product $product): void
    {
        if (array_key_exists($product->getName(), $this->storage))
            unset($this->storage[$product->getName()]);
    }

    public function delete():void{

        $this->storage = [];
    }
}
