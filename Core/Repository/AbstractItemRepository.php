<?php

namespace Core\Repository;

use Core\Repository\InterfaceItemRepository;

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
