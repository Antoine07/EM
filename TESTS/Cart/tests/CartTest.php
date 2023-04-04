<?php  declare(strict_types=1); // propre a PHP pour qu'il mette le fichier en mode strict au niveau des erreurs
 
use PHPUnit\Framework\TestCase;

// class de tests de la classe métier Cart
class CartTest extends TestCase{

    public function testMethodBuy():void{

        $cart = new Cart;

        $this->assertEquals($cart->buy(1,1), "test buy method");
    }

}