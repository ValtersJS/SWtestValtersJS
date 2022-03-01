<?php
include_once 'C:\xampp\htdocs\swtest_v1\Item.php';

class Book extends Item {
  protected $weight;

  public function save($sku, $name, $price, $weight) 
  {
    $this->setSku($sku);
    $this->setName($name);
    $this->setPrice($price);
    $this->setAttribute($weight);
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