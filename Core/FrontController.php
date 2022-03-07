<?php

namespace App\Core;

use App\Core\ItemRepository;
use App\ListPage\Items\{Item, Dvd, Book, Furniture};

include_once "ItemRepository.php";
include_once "C:/xampp/htdocs/swtest_v1/ListPage/Items/Item.php";
include_once "C:/xampp/htdocs/swtest_v1/ListPage/Items/Dvd.php";
include_once "C:/xampp/htdocs/swtest_v1/ListPage/Items/Book.php";
include_once "C:/xampp/htdocs/swtest_v1/ListPage/Items/Furniture.php";

switch (isset($_POST)) {
  case isset($_POST['product']):
    $productJSON = ($_POST['product']);
    $product = json_decode($productJSON);
    switch ($product->{'type'}) {
      case 1:
        $obj = new Dvd();
        $item = $obj->save($product->{'type'}, $product->{'sku'}, $product->{'name'}, $product->{'price'}, $product->{'size'});
        ItemRepository::setRow($item);
        break;
      case 2:
        $obj = new Book();
        $item = $obj->save($product->{'type'}, $product->{'sku'}, $product->{'name'}, $product->{'price'}, $product->{'weight'});
        ItemRepository::setRow($item);
        break;
      case 3:
        $obj = new Furniture();
        $item = $obj->save(
          $product->{'type'},
          $product->{'sku'},
          $product->{'name'},
          $product->{'price'},
          $product->{'height'},
          $product->{'width'},
          $product->{'length'}
        );
        ItemRepository::setRow($item);
        break;
    }
    break;

  case isset($_POST['delValues']):
    $delValues = $_POST['delValues'];
    ItemRepository::deleteById($delValues);
    break;
}
