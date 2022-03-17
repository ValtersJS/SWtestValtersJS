<?php

namespace ListPage\Items;

class Item
{
  protected $id;
  protected $type;
  protected $sku;
  protected $name;
  protected $price;
  protected $attribute;

  function __construct($type, $sku, $name, $price, $attribute)
  {
    $this->setType($type);
    $this->setSku($sku);
    $this->setName($name);
    $this->setPrice($price);
    $this->setAttribute($attribute);
  }

  public function getId()
  {
    return $this->id;
  }

  public function setId($id)
  {
    $this->id = $id;

    return $this;
  }

  public function getType()
  {
    return $this->type;
  }

  public function setType($type)
  {
    $this->type = $type;
  }

  public function getSku()
  {
    return $this->sku;
  }

  public function setSku($sku)
  {
    $this->sku = $sku;

    return $this;
  }

  public function getName()
  {
    return $this->name;
  }

  public function setName($name)
  {
    $this->name = $name;

    return $this;
  }

  public function getPrice()
  {
    return $this->price;
  }

  public function setPrice($price)
  {
    $this->price = $price;

    return $this;
  }

  public function getAttribute()
  {
    return $this->attribute;
  }

  public function setAttribute($attribute)
  {
    $this->attribute = $attribute;
  }
}
