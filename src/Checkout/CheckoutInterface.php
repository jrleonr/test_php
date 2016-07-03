<?php

namespace App\Checkout;

/**
 * Checkout object responsible for the scanning of
 * items and calculation of total basket price
 */
interface CheckoutInterface
{
    /**
     * Create new checkout instance based on promotional rules
     *
     * @param object $promotionalRules
     */
    public function __construct($promotionalRules);
    /**
     * Scan new item
     *
     * @param object $item
     */
    public function scan($item);
    /**
     * Calculate total price of the basket including promotions
     * Returns price string in the £X.XX format  
     *
     * @return string 
     */
    public function total();
}
