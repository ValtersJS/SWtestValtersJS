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
    case isset($_POST['product']):
      $productJSON = ($_POST['product']);
      $product = json_decode($productJSON);
      switch($product->{'type'}) {
        case 1:
          $obj = new Dvd();
          $item = $obj->save($product->{'type'}, $product->{'sku'}, $product->{'name'}, $product->{'price'}, $product->{'size'});
          ItemRepo::setRow($item);
          break;
        case 2: 
          $obj = new Book();
          $item = $obj->save($product->{'type'}, $product->{'sku'}, $product->{'name'}, $product->{'price'}, $product->{'weight'});
          ItemRepo::setRow($item);
          break;
        case 3:
          $obj = new Furniture();
          $item = $obj->save($product->{'type'}, $product->{'sku'}, $product->{'name'}, $product->{'price'},
          $product->{'height'},
          $product->{'width'},
          $product->{'length'});
          ItemRepo::setRow($item);
          break;
      }
    break;
    
    case isset($_POST['delValues']):
      $delValues = $_POST['delValues'];
      ItemRepo::deleteById($delValues);
    break;
}
