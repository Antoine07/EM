<?php

declare(strict_types=1); // propre a PHP pour qu'il mette le fichier en mode strict au niveau des erreurs

use PHPUnit\Framework\TestCase;

// class de tests de la classe métier Cart
class CartTest extends TestCase
{
    private $cart;

    public function setUp(): void
    {
        $this->cart = new Cart();
    }

    public function testStorageTva(): void
    {


    }
}
