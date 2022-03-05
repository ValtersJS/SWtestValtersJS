<?php

namespace App\Core;

use App\Core\InterfaceItemRepository;

include_once "InterfaceItemRepository.php";

abstract class AbstractItemRepository implements InterfaceItemRepository
{
  public function __construct()
  {
    $this->dbServername = "localhost";
    $this->dbUsername = "root";
    $this->dbPassword = "";
    $this->dbName = "swtestdb";
    // $charset = "utf8mb4";
  }

  public abstract function connect();

  public static abstract function getAll();

  public static abstract function deleteById($delValues);

  public static abstract function setRow($item);
}
