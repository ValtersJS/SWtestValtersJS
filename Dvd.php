<?php
include_once 'C:\xampp\htdocs\swtest_v1\Item.php';

class Dvd extends Item {
  protected $size;

  public function save($sku, $name, $price, $size) 
  {
    $this->setSku($sku);
    $this->setName($name);
    $this->setPrice($price);
    $this->setAttribute($size);
  }
  
  // public function getSize() {
  //   return $this->getAttribute();
  // }
  // public function setSize($size) {
  //   $this->setAttribute($size);
  // }

  // protected function listItems() 
  // {
  //   return;
  // }

  // protected function deleteItems()
  // {
  //   return;
  // }

  // protected function saveItems()
  // {
  //   return;
  // }

  // public function setAttribute($height, $width, $length)
  // {
    
  // }
}