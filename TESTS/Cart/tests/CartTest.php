<?php

declare(strict_types=1); // propre a PHP pour qu'il mette le fichier en mode strict au niveau des erreurs

use PHPUnit\Framework\TestCase;

// class de tests de la classe métier Cart
class CartTest extends TestCase
{
    private $cart;

    public function setUp(): void
    {
        $this->cart = new Cart([]);
    }

    public function testStorageTva(): void
    {
        $this->cart->buy(10, 2);
        $this->cart->buy(12, 1);
        $this->cart->buy(15.5, 7);

        /**
         * 10*2*1.2 + 12*1.2 + 15.5*7*1.2
         * (10*2 + 12 + 15.5*7 ) * 1.2
         */

        $this->assertEquals((10*2 + 12 + 15.5*7 ) * 1.2, $this->cart->total());
    }
}
