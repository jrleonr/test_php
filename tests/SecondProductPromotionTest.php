<?php

use App\Promotion\Promotions;
use App\Promotion\SecondProductPromotion;
use App\Product;

class SecondProductPromotionTest extends PHPUnit_Framework_TestCase
{
    /** @test */
    public function change_price_of_promotion_product()
    {
        $products = [
            new Product('001','Lavender heart', 9.25),
            new Product('001','Lavender heart', 9.25),
            new Product('002','Personalised cufflinks', 45.00),
            new Product('003','Kids T-shirt', 19.95)
        ];

        $promotion = new SecondProductPromotion('001', 8.50);

        $promotion->updatePrice($products);

        $this->assertEquals(8.50, $products[0]->getPrice());
        $this->assertEquals(8.50, $products[1]->getPrice());
        $this->assertEquals(45.00, $products[2]->getPrice());
        $this->assertEquals(19.95, $products[3]->getPrice());
    }

    /** @test */
    public function change_price_of_promotion_product_different_order()
    {
        $products = [
            new Product('001','Lavender heart', 9.25),
            new Product('002','Personalised cufflinks', 45.00),
            new Product('003','Kids T-shirt', 19.95),
            new Product('001','Lavender heart', 9.25)
        ];

        $promotion = new SecondProductPromotion('001', 8.50);

        $promotion->updatePrice($products);

        $this->assertEquals(8.50, $products[0]->getPrice());
        $this->assertEquals(45.00, $products[1]->getPrice());
        $this->assertEquals(19.95, $products[2]->getPrice());
        $this->assertEquals(8.50, $products[3]->getPrice());
    }

    /** @test */
    public function keeps_price_just_one_produt_promotion()
    {
        $products = [
            new Product('001','Lavender heart', 9.25),
            new Product('002','Personalised cufflinks', 45.00),
            new Product('002','Personalised cufflinks', 45.00),
            new Product('003','Kids T-shirt', 19.95)
        ];

        $promotion = new SecondProductPromotion('001', 8.50);

        $promotion->updatePrice($products);

        $this->assertEquals(9.25, $products[0]->getPrice());
        $this->assertEquals(45.00, $products[1]->getPrice());
        $this->assertEquals(45.00, $products[2]->getPrice());
        $this->assertEquals(19.95, $products[3]->getPrice());
    }


    
}
