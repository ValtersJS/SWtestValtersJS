<?php
require_once 'C:\xampp\htdocs\swtest_v1\Funcs.php';

class TableGen extends Funcs
{
  public static function genTable()
  {
    $items = parent::getItems();

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
}
