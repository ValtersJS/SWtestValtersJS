<?php

namespace ListPage\ListPageLogic;

use Core\Repository\ItemRepository;

include "AutoLoader.php";

// include_once "Core\Repository\ItemRepository.php";

class TableGen
{
  public static function genTable()
  {
    $items = ItemRepository::getAll();

    echo "<table class='itemTable' id='table'>";
    $i = 0;

    foreach ($items as $obj => $objProps) {
      $itemID = $objProps->getId();
      echo "<td class='itemBox'>
           <input type='checkbox'
           class='delete-checkbox'
           value='$itemID'
           autocomplete='off'><br/>"
        . $objProps->getSKU() . "<br/>"
        . $objProps->getName() . "<br/>"
        . $objProps->getPrice() . "<br/>"
        . $objProps->getAttribute() . "<br/>";
      $i++;

      if ($i >= 4) {
        echo "</tr>";
        echo "<tr>";
        $i = 0;
      }
    }
    echo "</table>";
  }

  public static function genTablee()
  {
    $items = ItemRepository::getAll();

    echo "<table class='itemTable' id='table'>";
    $i = 0;

    foreach ($items as $obj => $objProps) {
      $itemID = $objProps->getId();
      echo "fail";
      $i++;

      if ($i >= 4) {
        echo "</tr>";
        echo "<tr>";
        $i = 0;
      }
    }
    echo "</table>";
  }
}
