<?php
// include_once 'C:\xampp\htdocs\swtest_v1\Funcs.php';

interface Repository
{
  function connect();
  function getAll();
  function deleteById($id);
  function create($value);
}


