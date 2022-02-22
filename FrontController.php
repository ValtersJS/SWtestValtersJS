<?php
require_once 'C:\xampp\htdocs\swtest_v1\Funcs.php';

switch(isset($_POST))
{
    case isset($_POST['delValues']):
      $delValues = $_POST['delValues'];
      Funcs::deleteItems($delValues);
    break;

    case isset($_POST['attributes']):
      $product = $_POST['attributes'];
      ItemRepository::setRow($product);
    break;
    
    case isset($_POST['C']):
      //do something
    break;
}
