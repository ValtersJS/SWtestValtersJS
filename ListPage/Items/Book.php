<?php

namespace App\ListPage\Items;

use App\ListPage\Items;

class Book extends Item
{
  protected $weight;

  public function save($type, $sku, $name, $price, $weight)
  {
    $this->setType($type);
    $this->setSku($sku);
    $this->setName($name);
    $this->setPrice($price);
    $this->setAttribute($weight);
    return $this;
  }
}
