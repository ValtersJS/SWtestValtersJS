<?php
include_once 'C:\xampp\htdocs\swtest_v1\Item.php';

class Furniture extends Item {
  protected $width;
  protected $height;
  protected $length;

  public function save($sku, $name, $price, $width, $height, $length, $type) 
  {
    $this->setSku($sku);
    $this->setName($name);
    $this->setPrice($price);
    $this->setAttribute($width + "x" + $height + "x" + $length);
  }
  
  // protected function listItems() 
  // {

  // }

  // protected function deleteItems()
  // {

  // }

  // protected function saveItems()
  // {

  // }
}