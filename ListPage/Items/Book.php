<?php

namespace ListPage\Items;

use ListPage\Items;

class Book extends Item
{
  protected $weight;
  
  function __construct($type, $sku, $name, $price, $weight)
  {
    $this->setType($type);
    $this->setSku($sku);
    $this->setName($name);
    $this->setPrice($price);
    $this->setAttribute($weight);
  }
}
