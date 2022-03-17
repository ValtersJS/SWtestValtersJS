<?php

namespace Core\Controller;

use Core\Repository\ItemRepository;

abstract class AbstractController {
  function __construct()
  {
    if (isset($_POST['product'])) {
      $productJSON = ($_POST['product']);
      $this->product = json_decode($productJSON);
      $this->getObj();

    }else if (isset($_POST['delValues'])) {
      $this->delValues = $_POST['delValues'];
      ItemRepository::deleteById($this->delValues);
    }
  }

  abstract protected function getObj();
  abstract protected function makeDvd();
  abstract protected function makeBook();
  abstract protected function makeFurniture();

}