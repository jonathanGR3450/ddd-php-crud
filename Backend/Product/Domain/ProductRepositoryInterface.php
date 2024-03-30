<?php

declare(strict_types=1);

namespace Backend\Product\Domain;

use Backend\Product\Domain\Aggregate\Product;
use Backend\Product\Domain\ValueObjects\Id;

interface ProductRepositoryInterface
{
    // public function create(Product $product): void;

    // public function update(Product $product): void;

    public function index(): array;

    // public function searchById(Id $id): ?Product;

    // public function delete(Product $product): void;
}