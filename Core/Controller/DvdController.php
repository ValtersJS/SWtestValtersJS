<?php

namespace Core\Controller;

use Core\Repository\ItemRepository;
use ListPage\Items\Dvd;

include "../../AutoLoader.php";
// include_once "C:/xampp/htdocs/swtest_v1/Core/Repository/ItemRepository.php";
// include_once "FrontController.php";
// include_once "InterfaceController.php";
// include_once "C:/xampp/htdocs/swtest_v1/ListPage/Items/Dvd.php";

class DvdController extends FrontController implements InterfaceController 
{
  function __construct()
  {
    parent::__construct();

    if (!empty($_POST)) {
      $this->save();
    }
  }

  public function save()
  {
    $obj = new Dvd($this->product->{'type'}, $this->product->{'sku'}, $this->product->{'name'}, $this->product->{'price'}, $this->product->{'size'});
    ItemRepository::setRow($obj);
  }
}

$instance = new DvdController();
