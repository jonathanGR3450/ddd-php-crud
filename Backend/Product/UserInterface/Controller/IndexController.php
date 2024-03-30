<?php

namespace Backend\Product\UserInterface\Controller;

use Backend\Product\Infrastructure\ProductRepository;

class indexController
{
    private ProductRepository $productRepository;

    public function __construct(ProductRepository $productRepository) {
        $this->productRepository = $productRepository;
    }

    public function __invoke()
    {
        $products = $this->productRepository->index();
        require_once("Frontend/Product/index.php");
    }
}