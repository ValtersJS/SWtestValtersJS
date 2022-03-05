<?php
namespace App\Core;
// include_once 'C:\xampp\htdocs\swtest_v1\Funcs.php';

interface InterfaceItemRepository
{
  function connect();
  static function getAll();
  static function deleteById($id);
  static function setRow($item);
}


