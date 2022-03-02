<?php
include_once 'C:\xampp\htdocs\swtest_v1\Item.php';

class Dvd extends Item {
  protected $size;

  public function save($type, $sku, $name, $price, $size) 
  {
    $this->setType($type);
    $this->setSku($sku);
    $this->setName($name);
    $this->setPrice($price);
    $this->setAttribute($size);
    return $this;
  }
}