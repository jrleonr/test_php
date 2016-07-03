<?php

namespace App\Promotion;

use App\Promotion\ProductPromotionInterface;

class SecondProductPromotion implements ProductPromotionInterface
{
    protected $code;
    protected $pricePerUnit;

    /**
     * @inheritdoc
     */
    public function __construct($code, $pricePerUnit)
    {
        $this->code = $code;
        $this->pricePerUnit = $pricePerUnit;
    }

    /**
     * @inheritdoc
     */
    public function updatePrice($products)
    {
        $i = 0;
        $count = 0;

        while ($count < 2 && $i < count($products)) {
            if ($products[$i]->getCode() === $this->code) {
                $count++;
            }
            $i++;
        }

        if ($count > 1) {
            foreach ($products as $product) {
                if ($product->getCode() === $this->code) {
                    $product->setPrice($this->pricePerUnit);
                }
            }
        }

        return $products;
    }
}
