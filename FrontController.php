<?php
require_once "ItemRepo.php";
include_once "Item.php";
include_once "Dvd.php";
include_once "Book.php";
include_once "Furniture.php";
// include_once "Repository.php";
// include_once "ItemRepository.abstract.php";

switch(isset($_POST))
{
    case isset($_POST['delValues']):
      $delValues = $_POST['delValues'];
      Funcs::deleteItems($delValues);
    break;

    case isset($_POST['product']):
      $product = $_POST['product'];
      switch($product['type']) {
        case 1:
          $obj = new Dvd();
          $obj->save($product[0], $product[1], $product[2], $product[3]);
          break;
        case 2: 
          $obj = new Book();
          $obj->save($product[0], $product[1], $product[2], $product[3]);
          break;
        case 3:
          $obj = new Furniture();
          $obj->save($product[0], $product[1], $product[2], $product[3], $product[4], $product[5], $product[6]);
          break;
      }
    break;
    
    case isset($_POST['C']):
      //do something
    break;
}
