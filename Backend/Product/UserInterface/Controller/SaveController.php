<?php

namespace Backend\Product\UserInterface\Controller;

use Backend\Product\Domain\Aggregate\Product;
use Backend\Product\Domain\ValueObjects\DateTimeValueObject;
use Backend\Product\Domain\ValueObjects\Name;
use Backend\Product\Domain\ValueObjects\Price;
use Backend\Product\Infrastructure\ProductRepository;

class SaveController
{
    private ProductRepository $productRepository;

    public function __construct(ProductRepository $productRepository) {
        $this->productRepository = $productRepository;
    }

    public function __invoke()
    {
        $date = new DateTimeValueObject();
        $product =  Product::create(
            null,
            new Name($_POST['name']),
            new Price($_POST['price']),
            $date->now(),
        );

        $this->productRepository->create($product);
        require_once("Frontend/Product/index.php");
    }
}

$save = new SaveController(new ProductRepository());
$save->__invoke();