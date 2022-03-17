<?php

namespace Core\Controller;

use Core\Repository\ItemRepository;
use ListPage\Items\Book;

include "../../AutoLoader.php";
// include_once "C:/xampp/htdocs/swtest_v1/Core/Repository/ItemRepository.php";
// include_once "FrontController.php";
// include_once "InterfaceController.php";
// include_once "C:/xampp/htdocs/swtest_v1/ListPage/Items/Book.php";

class BookController extends FrontController implements InterfaceController
{
  function __construct()
  {
    parent::__construct();

    if (!empty($_POST)) {
      $this->save();
    }
  }

  public function save()
  {
    $obj = new Book($this->product->{'type'}, $this->product->{'sku'}, $this->product->{'name'}, $this->product->{'price'}, $this->product->{'weight'});
    ItemRepository::setRow($obj);
  }
}

$instance = new BookController();
