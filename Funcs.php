<?php
require_once 'C:\xampp\htdocs\swtest_v1\Item.php';
require_once 'C:\xampp\htdocs\swtest_v1\Dvd.php';
require_once 'C:\xampp\htdocs\swtest_v1\FetchItem.php';

class Funcs extends Item {
  private static function connect() {
    $dbServername = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbName = "swtestdb";
    $charset = "utf8mb4";

    try {
      $dsn = "mysql:host=".$dbServername.";dbname=".$dbName.";charset=".$charset;
      $pdo = new PDO($dsn, $dbUsername, $dbPassword);
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      return $pdo;
    }catch(PDOException $e) {
      echo "Connection failed: ".$e->getMessage();
    }
  }

  public static function getItems() {
    $sql = "SELECT * FROM itemss";
    $result = Funcs::connect()->query($sql);

    $arr = array();

    while($row = $result->fetch()) {
      $obj = new FetchItem();
      $obj->setId($row['ID']);
      $obj->setSKU($row['Sku']);
      $obj->setName($row['Name']);
      $obj->setPrice($row['Price']);
      $obj->setAttribute($row['Attribute']);
      
      array_push($arr, $obj);
    }
      return $arr;
  }

  public static function deleteItems($values) {
      $sql = "DELETE FROM itemss WHERE ID in ($values)";
      Funcs::connect()->query($sql);
  }

  public static function saveItems() {
    echo "fdsf";
  }
}