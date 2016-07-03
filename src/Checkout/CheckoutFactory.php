<?php

namespace App\Checkout;

use App\Promotion\Promotions;
use App\Promotion\SecondProductPromotion;

/**
 * @inheritdoc
 */
class CheckoutFactory implements CheckoutFactoryInterface
{
    /**
     * @inheritdoc
     */
    public static function create()
    {
        return new Checkout(
            (new Promotions)
            ->setPromotionTotal(10, 60)
            ->addProductPromotion(new SecondProductPromotion('001', 8.50))
        );
    }
}
