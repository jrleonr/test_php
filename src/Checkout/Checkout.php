<?php

namespace App\Checkout;

/**
 * Implements Checkout Interface
 */
class Checkout implements CheckoutInterface
{
    /**
     * Promotions instance
     * @var  \App\Promotion\Promotions
     */
    protected $promotionalRules;

    /**
     * Products
     * @var array
     */
    protected $products;

    /**
     * Create a new Checkout store.
     * @param \App\Promotion\Promotions $promotionalRules
     */
    public function __construct($promotionalRules)
    {
        setlocale(LC_MONETARY, 'en_GB.UTF-8');
        $this->promotionalRules = $promotionalRules;
    }

    /**
     * Save product instance into products array
     * @param  \App\Product $item 
     */
    public function scan($item)
    {
        $this->products[] = $item;
    }

    /**
     * Calc the total price of the checkout
     * @return string 
     */
    public function total()
    {
        $total = 0;

        $this->promotionalRules->calculateProductPrices($this->products);

        foreach ($this->products as $product) {
            $total += $product->getPrice();
        }

        return money_format('%.2n', $this->promotionalRules->getPromotionTotal($total));
    }

    /**
     * Get number of products 
     * @return int
     */
    public function getNumberOfProducts()
    {
        return count($this->products);
    }

    /**
     * Return Promotions object
     * return \App\Promotion\Promotions
     */
    public function Promotions()
    {
        return $this->promotionalRules;
    }
}
