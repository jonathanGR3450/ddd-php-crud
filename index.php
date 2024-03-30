<?php

require_once('Backend/Product/UserInterface/Controller/IndexController.php');
require_once('Backend/Product/Infrastructure/ProductRepository.php');

use Backend\Product\Infrastructure\ProductRepository;
use Backend\Product\UserInterface\Controller\IndexController;

class index{

  private $index;
  public function __construct() {
    $this->index = new IndexController(new ProductRepository());
    $this->index->__invoke();
  }
}

new index();

