<?php

require 'vendor/autoload.php';

use App\Product;
use App\Promotion\Promotions;
use App\Checkout\CheckoutFactory;
use App\Promotion\SecondProductPromotion;

/*
Basket: 001,002,003
Total price expected: £66.78
*/

$product1 = new Product('001','Lavender heart', 9.25);
$product2 = new Product('002','Personalised cufflinks', 45.00);
$product3 = new Product('003','Kids T-shirt', 19.95);

//usage example
$co = CheckoutFactory::create();
$co->scan($product1);
$co->scan($product2);
$co->scan($product3);
$price = $co->total();

var_dump($price);

/*
Basket: 001,002,001,003
Total price expected: £73.76
*/
$product1 = new Product('001','Lavender heart', 9.25);
$product2 = new Product('002','Personalised cufflinks', 45.00);
$product3 = new Product('001','Lavender heart', 9.25);
$product4 = new Product('003','Kids T-shirt', 19.95);


//usage example
$co = CheckoutFactory::create();
$co->scan($product1);
$co->scan($product2);
$co->scan($product3);
$co->scan($product4);
$price = $co->total();

var_dump($price);

/*
Basket: 001,003,001
Total price expected: £36.95
*/

$product1 = new Product('001','Lavender heart', 9.25);
$product2 = new Product('003','Kids T-shirt', 19.95);
$product3 = new Product('001','Lavender heart', 9.25);


//usage example
$co = CheckoutFactory::create();
$co->scan($product1);
$co->scan($product2);
$co->scan($product3);
$price = $co->total();

var_dump($price);
