<?php

namespace App\Promotion;

interface ProductPromotionInterface
{
    /**
     * Create a new promotion product
     * @param  string $code         Code of product
     * @param  float $pricePerUnit Discount price of the product
     */
    public function __construct($code, $pricePerUnit);

    /**
     * Update the prices of products same code
     * on the list.
     * @param  Array $products List of products
     * @return Array
     */
    public function updatePrice($products);
}
