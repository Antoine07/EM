<?php

class Cart{

    protected $storage ;
    protected float $tva ;

    public function __construct($storage, float $tva = .2)
    {
        $this->storage = $storage;
        $this->tva = $tva;
    }

    public function buy($price, $quantity){
       
        $this->storage[] = $price * $quantity * (1 + $this->tva);
    }

    public function total():float{

        return array_sum($this->storage);
    }
}