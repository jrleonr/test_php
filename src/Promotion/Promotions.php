<?php

namespace App\Promotion;

use App\Promotion\ProductPromotionInterface;

class Promotions
{
    protected $discount;
    protected $spentMore;
    protected $promotionProducts = [];

    /**
     * Set promotion for the total checkout
     * @param int $discount
     * @param int $spentMore 
     */
    public function setPromotionTotal($discount = null, $spentMore = null)
    {
        $this->discount = $discount;
        $this->spentMore = $spentMore;

        return $this;
    }

    /**
     * Get the price after applied the discount
     * @param  float $total 
     * @return float
     */
    public function getPromotionTotal($total)
    {
        if ($this->discount && $total > $this->spentMore) {
            return  $total - ($total * $this->discount) / 100;
        }
        
        return $total;
    }

    /**
     * Add instance of product promotions to the list
     * @param ProductPromotionInterface $productPromotion 
     */
    public function addProductPromotion(ProductPromotionInterface $productPromotion)
    {
        array_push($this->promotionProducts, $productPromotion);

        return $this;
    }

    /**
     * Calculates the new price of each product
     * @param  array $products 
     * @return array
     */
    public function calculateProductPrices($products)
    {
        foreach ($this->promotionProducts as $promotionProduct) {
            $promotionProduct->updatePrice($products);
        }

        return $products;
    }
}
