<?php
include_once "Item.php";
include_once "Dvd.php";
include_once "Book.php";
include_once "Furniture.php";
include_once "Repository.php";
include_once "ItemRepository.abstract.php";


class ItemRepo extends ItemRepository
{
  protected $dbServername;
  protected $dbUsername;
  protected $dbPassword;
  protected $dbName;
  protected $charset = "utf8mb4";

  public function connect() {
    // create connection w/ constructor data
    try {
      $dsn = "mysql:host=".$this->dbServername.";dbname=".$this->dbName.";charset=".$this->charset;
      $pdo = new PDO($dsn, $this->dbUsername, $this->dbPassword);
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      return $pdo;
    }catch(PDOException $e) {
      echo "Connection failed: ".$e->getMessage();
    } 
  }

  public static function getAll() {
    $request = new ItemRepo();

    $sql = "SELECT * FROM newitems";
    $result = $request->connect()->query($sql);
    $arr = array();
    while($row = $result->fetch()) {

      switch($row['Type']) {
        case 1:
          $obj = new Dvd();
          break;
        case 2: 
          $obj = new Book();
          break;
        case 3:
          $obj = new Furniture();
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
  
  public static function setRow($type, $sku, $name, $price, $attritbute) {
    // SQL send product to db
    echo "ha";
    $sql = "INSERT INTO newitems
    VALUES (NULL, )";
  }
}
