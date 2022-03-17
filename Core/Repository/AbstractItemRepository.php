<?php

namespace Core\Repository;

use Core\Repository\InterfaceItemRepository;

// include "C:/xampp/htdocs/swtest_v1/AutoLoader.php";

// include_once "InterfaceItemRepository.php";

abstract class AbstractItemRepository implements InterfaceItemRepository
{
  public function __construct()
  {
    $this->dbServername = "localhost";
    $this->dbUsername = "root";
    $this->dbPassword = "";
    $this->dbName = "swtestdb";
  }

  public abstract function connect();

  public static abstract function getAll();

  public static abstract function deleteById($delValues);

  public static abstract function setRow($item);
}
