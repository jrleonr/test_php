<?php

use App\Checkout\Checkout;
use App\Product;
use App\Promotion\Promotions;
use App\Promotion\SecondProductPromotion;

class CheckoutTest extends PHPUnit_Framework_TestCase
{
    /** @test */
    public function can_get_total_number_of_products()
    {
        $product1 = new Product('001','Lavender heart', 9.25);
        $product2 = new Product('002','Personalised cufflinks', 45.00);
        $product3 = new Product('003','Kids T-shirt', 19.95);

        $co = new Checkout(new Promotions);
        $co->scan($product1);
        $co->scan($product2);
        $co->scan($product3);


        $this->assertEquals(3, $co->getNumberOfProducts());

    }


    /** @test */
    public function total_cost_of_all_its_products_without_promotions()
    {
        $product1 = new Product('001','Lavender heart', 9.25);
        $product2 = new Product('002','Personalised cufflinks', 45.00);
        $product3 = new Product('003','Kids T-shirt', 19.95);

        $co = new Checkout(new Promotions);
        $co->scan($product1);
        $co->scan($product2);
        $co->scan($product3);


        $this->assertEquals('£74.20', $co->total());
    }


    /** @test */
    public function check_total_cost_of_co_with_promotion()
    {
        $product1 = new Product('001','Lavender heart', 9.25);
        $product2 = new Product('002','Personalised cufflinks', 45.00);
        $product3 = new Product('003','Kids T-shirt', 19.95);

        $promotions = new Promotions;
        $promotions->setPromotionTotal(10,60);

        $co = new Checkout($promotions);

        $co->scan($product1);
        $co->scan($product2);
        $co->scan($product3);

        $this->assertEquals('£66.78', $co->total());
    }

    /** @test */
    public function check_cost_of_co_with_product_promotion()
    {
        $product1 = new Product('001','Lavender heart', 9.25);
        $product2 = new Product('003','Kids T-shirt', 19.95);
        $product3 = new Product('001','Lavender heart', 9.25);

        $promotions = new Promotions;
        $promotions->setPromotionTotal(10,60);

        $promotions->addProductPromotion(new SecondProductPromotion('001', 8.50));

        $co = new Checkout($promotions);

        $co->scan($product1);
        $co->scan($product2);
        $co->scan($product3);

        $this->assertEquals('£36.95', $co->total());
    }

    /** @test */
    public function check_cost_of_co_with_product_promotion_and_total()
    {
        $product1 = new Product('001','Lavender heart', 9.25);
        $product2 = new Product('003','Kids T-shirt', 19.95);
        $product3 = new Product('001','Lavender heart', 9.25);
        $product4 = new Product('003','Lavender heart', 19.95);
        $product5 = new Product('003','Lavender heart', 19.95);

        $promotions = new Promotions;
        $promotions->setPromotionTotal(10,60);

        $promotions->addProductPromotion(new SecondProductPromotion('001', 8.50));

        $co = new Checkout($promotions);

        $co->scan($product1);
        $co->scan($product2);
        $co->scan($product3);
        $co->scan($product4);
        $co->scan($product5);

        $this->assertEquals('£69.17', $co->total());
    }

    /** @test */
    public function check_cost_of_co_with_product_promotion_and_no_promotion_total()
    {
        $product1 = new Product('001','Lavender heart', 9.25);
        $product2 = new Product('003','Kids T-shirt', 19.95);
        $product3 = new Product('001','Lavender heart', 9.25);
        $product4 = new Product('003','Lavender heart', 19.95);
        $product5 = new Product('003','Lavender heart', 19.95);

        $promotions = new Promotions;
        $promotions->addProductPromotion(new SecondProductPromotion('001', 8.50));

        $co = new Checkout($promotions);

        $co->scan($product1);
        $co->scan($product2);
        $co->scan($product3);
        $co->scan($product4);
        $co->scan($product5);

        $this->assertEquals('£76.85', $co->total());
    }
}
