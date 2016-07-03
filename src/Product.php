<?php

namespace App;

/**
 * Product class
 */
class Product
{

    protected $code;
    protected $name;
    protected $price;

    public function __construct($code, $name, $price)
    {
        $this->code = $code;
        $this->name = $name;
        $this->price = $price;
    }

    public function getCode()
    {
        return $this->code;
    }
    public function getName()
    {
        return $this->name;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function setPrice($price)
    {
        $this->price = $price;
    }
}
