<?php
include_once 'C:\xampp\htdocs\swtest_v1\Item.php';

class Furniture extends Item {
  protected $width;
  protected $height;
  protected $length;
  protected $attrTag = "Dimensions: ";

  public function save($type, $sku, $name, $price, $height, $width, $length) 
  {
    $this->setType($type);
    $this->setSku($sku);
    $this->setName($name);
    $this->setPrice($price);  
    $this->setFurnitureAttribute($this->attrTag, $width, $height, $length);
    return $this;
  }

  public function setFurnitureAttribute($attrTag, $height, $width, $length)
  {
    $x = "x";
    $this->attribute = $attrTag;
    $this->attribute = $attrTag . $height . $x . $width . $x . $length;
  }
}