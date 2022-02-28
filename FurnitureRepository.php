<?php
// include_once 'C:\xampp\htdocs\swtest_v1\Funcs.php';

class FurnitureRepository extends ItemRepository
{
  function getAll() {
    $row = $this->getRow();
    $furniture = Furniture()
    // Set properties for $dvd from $row
    return $furniture;
  }
  
  function deleteById($id);
  function create($value);
}

 