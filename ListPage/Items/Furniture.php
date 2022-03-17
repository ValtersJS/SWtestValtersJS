<?php

namespace ListPage\Items;

class Furniture extends Item
{
  protected $dimensions;
  
  function __construct($type, $sku, $name, $price, $dimensions)
  {
    $this->setType($type);
    $this->setSku($sku);
    $this->setName($name);
    $this->setPrice($price);
    $this->setAttribute($dimensions);
  }
}
