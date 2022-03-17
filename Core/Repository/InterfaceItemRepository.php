<?php
namespace Core\Repository;

interface InterfaceItemRepository
{
  function connect();
  static function getAll();
  static function deleteById($id);
  static function setRow($item);
}


