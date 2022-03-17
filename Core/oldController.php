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
        $item = new Dvd($product->{'type'}, $product->{'sku'}, $product->{'name'}, $product->{'price'}, $product->{'size'});
        ItemRepository::setRow($item);
        break;
      case 2:
        $item = new Book($product->{'type'}, $product->{'sku'}, $product->{'name'}, $product->{'price'}, $product->{'weight'});
        ItemRepository::setRow($item);
        break;
      case 3:
        $item = new Furniture($product->{'type'},
          $product->{'sku'},
          $product->{'name'},
          $product->{'price'},
          $product->{'dimensions'}
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
