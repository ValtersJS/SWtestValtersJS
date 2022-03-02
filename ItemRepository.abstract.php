<?php
include_once "Item.php";
include_once "Repository.php";

abstract class ItemRepository implements Repository
{
  public function __construct() {
    $this->dbServername = "localhost";
    $this->dbUsername = "root";
    $this->dbPassword = "";
    $this->dbName = "swtestdb";
    // $charset = "utf8mb4";
  }

  public abstract function connect();

  public static abstract function getAll();

  public static abstract function deleteById($delValues);
  
  protected static abstract function setRow($item);
}


