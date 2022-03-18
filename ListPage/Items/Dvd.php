<?php

namespace ListPage\Items;

class Dvd extends Item
{
  protected $size;

  function __construct($type, $sku, $name, $price, $size)
  {
    $this->setType($type);
    $this->setSku($sku);
    $this->setName($name);
    $this->setPrice($price);
    $this->setAttribute($size);
  }
}
