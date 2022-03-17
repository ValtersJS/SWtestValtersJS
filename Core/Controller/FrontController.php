<?php

namespace Core\Controller;

use Core\Repository\ItemRepository;

include "../../AutoLoader.php";

// include_once "C:/xampp/htdocs/swtest_v1/Core/Repository/ItemRepository.php";
// include_once "C:/xampp/htdocs/swtest_v1/ListPage/Items/Item.php";
// include_once "C:/xampp/htdocs/swtest_v1/ListPage/Items/Dvd.php";
// include_once "C:/xampp/htdocs/swtest_v1/ListPage/Items/Book.php";
// include_once "C:/xampp/htdocs/swtest_v1/ListPage/Items/Furniture.php";

class FrontController 
{
  protected $product;
  protected $delValues;

  function __construct()
  {
    if (isset($_POST['product'])) {
      $productJSON = ($_POST['product']);
      $this->product = json_decode($productJSON);

    }else if (isset($_POST['delValues'])) {
      $this->delValues = $_POST['delValues'];
      ItemRepository::deleteById($this->delValues);
    }
  }
}

$instance = new FrontController();
