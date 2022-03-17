<?php

namespace Core\Controller;

use Core\Repository\ItemRepository;
use ListPage\Items\{Dvd, Book, Furniture};

include "../../AutoLoader.php";

class FrontController extends AbstractController
{
  protected $product;
  protected $delValues;

  function __construct()
  {
    parent::__construct();
  }

  protected function getObj() {
    $array = array(
      1 => 'makeDvd',
      2 => 'makeBook',
      3 => 'makeFurniture'
    );
    return call_user_func(array($this, $array[$this->product->{'type'}]));
  }

  protected function makeDvd() {
    $obj = new Dvd($this->product->{'type'}, $this->product->{'sku'}, $this->product->{'name'}, $this->product->{'price'}, $this->product->{'size'});
    ItemRepository::setRow($obj);
  }

  protected function makeBook() {
    $obj = new Book($this->product->{'type'}, $this->product->{'sku'}, $this->product->{'name'}, $this->product->{'price'}, $this->product->{'weight'});
    ItemRepository::setRow($obj);
  }

  protected function makeFurniture() {
    $obj = new Furniture($this->product->{'type'}, $this->product->{'sku'}, $this->product->{'name'}, $this->product->{'price'}, $this->product->{'dimensions'});
    ItemRepository::setRow($obj);
  }
}

$instance = new FrontController();
  
