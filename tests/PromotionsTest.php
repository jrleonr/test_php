<?php

use App\Promotion\Promotions;

class PromotionsTest extends PHPUnit_Framework_TestCase
{

    /** @test */
    function total_price_with_discount_and_minimum()
    {
        $promotions = new Promotions;
        $promotions->setPromotionTotal(10,60);

        $this->assertEquals(180, $promotions->getPromotionTotal(200));
        $this->assertEquals(50, $promotions->getPromotionTotal(50));

    }

    /** @test */
    function total_price_without_discount()
    {
        $promotions = new Promotions;

        $this->assertEquals(200, $promotions->getPromotionTotal(200));
    }

    /** @test */
    function total_price_with_discount_and_not_minimun()
    {
        $promotions = new Promotions;
        $promotions->setPromotionTotal(10);


        $this->assertEquals(18, $promotions->getPromotionTotal(20));
    }

    /** @test */
    function total_price_without_discount_and_minimun()
    {
        $promotions = new Promotions;
        $promotions->setPromotionTotal(null,10);

        $this->assertEquals(5, $promotions->getPromotionTotal(5));
        $this->assertEquals(20, $promotions->getPromotionTotal(20));
    }
}
