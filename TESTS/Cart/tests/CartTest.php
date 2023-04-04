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

    /**
     * @dataProvider addProducts
     */
    public function testStorageTva(string $name, float $price, int $quantity, float $expected): void
    {
        // $this->cart->buy(10, 2);
        // $this->cart->buy(12, 1);
        // $this->cart->buy(15.5, 7);

        // /**
        //  * 10*2*1.2 + 12*1.2 + 15.5*7*1.2
        //  * (10*2 + 12 + 15.5*7 ) * 1.2
        //  */

        // $this->assertEquals((10*2 + 12 + 15.5*7 ) * 1.2, $this->cart->total());

        $product = new Product(name: $name, price : $price);
        $this->cart->buy($product, $quantity);

        $this->assertEquals($this->cart->total(), round( $expected, 2 ));
    }


    public function testTotalStorage():void{
        $this->cart->buy( new Product(name : "banana", price: 10), 2);
        $this->cart->buy( new Product(name : "apple", price: 12), 1);
        $this->cart->buy( new Product(name : "kiwi", price: 15.5), 7);

        $total = round( (10*2 + 12 + 15.5*7 ) * 1.2, 2 ) ;

        $this->assertEquals($this->cart->total(), $total);

    }

    public function testRestore():void{
        $banana =  new Product(name : "banana", price: 10) ;
        $this->cart->buy( $banana, 2);
        $this->assertEquals($this->cart->total(), round( 2*10*1.2, 2 ));

        $this->cart->restore($banana);
        $this->assertEquals($this->cart->total(), 0);

    }

    public function testBuySameProduct():void{
        $banana =  new Product(name : "banana", price: 10) ;
        $this->cart->buy( $banana, 2);
        $this->cart->buy( $banana, 2);
        $this->cart->buy( $banana, 2);

        $this->assertEquals($this->cart->total(), round( 6*10*1.2, 2 ));
    }

    public function testDelete():void{
        $this->cart->buy( new Product(name : "banana", price: 10), 2);
        $this->cart->buy( new Product(name : "apple", price: 12), 1);
        $this->cart->buy( new Product(name : "kiwi", price: 15.5), 7);

        $total = round( (10*2 + 12 + 15.5*7 ) * 1.2, 2 ) ;

        $this->assertEquals($this->cart->total(), $total);

        $this->cart->delete();

        $this->assertEquals($this->cart->total(), 0);

    }

    public static function addProducts(): array
    {
        return [
            ["banana", 10, 2, 10*2*1.2],
            ["apple", 12, 1, 12*1.2],
            ["kiwi", 15.5, 7, 15.5*7*1.2],
        ];
    }

}
