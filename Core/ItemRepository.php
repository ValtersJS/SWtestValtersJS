<?php

namespace App\Core;

use App\Core\AbstractItemRepository;
use PDO;
use PDOException;
use App\ListPage\Items\{Item, Dvd, Book, Furniture};

include_once "AbstractItemRepository.php";
include_once "C:/xampp/htdocs/swtest_v1/ListPage/Items/Item.php";
include_once "C:/xampp/htdocs/swtest_v1/ListPage/Items/Dvd.php";
include_once "C:/xampp/htdocs/swtest_v1/ListPage/Items/Book.php";
include_once "C:/xampp/htdocs/swtest_v1/ListPage/Items/Furniture.php";


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

    $sql = "SELECT * FROM newitems";
    $result = $request->connect()->query($sql);
    $arr = array();
    while ($row = $result->fetch()) {
      switch ($row['Type']) {
        case 1:
          $obj = new Dvd();
          $attrTag = "Size: ";
          break;
        case 2:
          $obj = new Book();
          $attrTag = "Weight: ";
          break;
        case 3:
          $obj = new Furniture();
          $attrTag = "Dimensions: ";
          break;
      }

      $obj->setId($row['ID']);
      $obj->setSKU($row['Sku']);
      $obj->setName($row['Name']);
      $obj->setPrice($row['Price']);
      $obj->setAttribute($row['Attribute']);
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
