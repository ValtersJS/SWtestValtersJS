<?php

namespace Core\Repository;

use Core\Repository\AbstractItemRepository;
use PDO;
use PDOException;
use ListPage\Items\Item;

// include "C:/xampp/htdocs/swtest_v1/AutoLoader.php";

// include_once "AbstractItemRepository.php";
// include_once "C:/xampp/htdocs/swtest_v1/ListPage/Items/Item.php";

class ItemRepository extends AbstractItemRepository
{
  protected $dbServername;
  protected $dbUsername;
  protected $dbPassword;
  protected $dbName;
  protected $charset = "utf8mb4";

  public function connect()
  {
    try {
      $dsn = "mysql:host=" . $this->dbServername . ";dbname=" . $this->dbName . ";charset=" . $this->charset;
      $pdo = new PDO($dsn, $this->dbUsername, $this->dbPassword);
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      return $pdo;
    } catch (PDOException $e) {
      echo "Connection failed: " . $e->getMessage();
    }
  }

  public static function getAll()
  {
    $request = new ItemRepository();

    $sql = "SELECT ID, Type, Sku, Name, Price, Attribute FROM newitems";
    $result = $request->connect()->query($sql);
    $arr = array();

    while ($row = $result->fetch()) {
      $obj = new Item($row['Type'], $row['Sku'], $row['Name'], $row['Price'], $row['Attribute']);
      $obj->setId($row['ID']);
      array_push($arr, $obj);
    }
    return $arr;
  }

  public static function setRow($item)
  {
    $request = new ItemRepository();
    $type = $item->getType();
    $sku = $item->getSku();
    $name = $item->getName();
    $price = $item->getPrice();
    $attribute = $item->getAttribute();

    $sql = "INSERT INTO newitems
    VALUES (NULL, '$type', '$sku', '$name', '$price', '$attribute'
    )";

    $request->connect()->query($sql);
  }

  public static function deleteById($delValues)
  {
    $request = new ItemRepository();
    $sql = "DELETE FROM newitems WHERE ID in ($delValues)";
    $request->connect()->query($sql);
  }
}
