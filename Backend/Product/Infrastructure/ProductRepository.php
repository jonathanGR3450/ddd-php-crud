<?php

declare(strict_types=1);

namespace Backend\Product\Infrastructure;

require_once('Backend/Product/Domain/ProductRepositoryInterface.php');
require_once('Backend/Product/Infrastructure/DB/Connection.php');
require_once('Backend/Product/Domain/Aggregate/Product.php');


use Backend\Product\Domain\Aggregate\Product;
use Backend\Product\Domain\ProductRepositoryInterface;
use Backend\Product\Domain\ValueObjects\DateTimeValueObject;
use Backend\Product\Domain\ValueObjects\Id;
use Backend\Product\Domain\ValueObjects\IdValueObject;
use Backend\Product\Domain\ValueObjects\Name;
use Backend\Product\Domain\ValueObjects\Price;
use Backend\Product\Infrastructure\DB\Connection;
use PDO;

class ProductRepository implements ProductRepositoryInterface
{

    private $table;
    public $pdo;

    public function __construct() {
        $connection = new Connection();
        $this->table = "products";
        $this->pdo = $connection->conexion();
    }

    public function create(Product $product): void
    {
        $date = new DateTimeValueObject();

        $name = $product->name()->value();
        $price = $product->price()->value();
        $created_at = $date->now()->value();

        $query = $this->pdo->prepare("INSERT INTO products (name, price, created_at) VALUES (?, ?, ?);");
        $resultado = $query->execute([$name, $price, $created_at]); # Pasar en el mismo orden de los ?
    }

    public function update(Product $product): void
    {
        // $productModel = ModelsUser::find($product->id()->value());

        // $productModel->id = $product->id()->value();
        // $productModel->name = $product->name()->value();
        // $productModel->price = $product->price()->value();
        // $productModel->updated_at = DateTimeValueObject::now()->value();

        // $productModel->save();
    }

    public function index(): array
    {
        $query = $this->pdo->query("select * from {$this->table}");
        $products = $query->fetchAll(PDO::FETCH_OBJ);
        return array_map(
            static fn (object $product) => self::map($product),
            $products
        );
    }


    // public function searchById(Id $id): ?Product
    // {
    //     $productModel = ModelsUser::find($id->value());

    //     return $productModel != null ? self::map($productModel) : null;
    // }

    // public function delete(Product $product): void
    // {
    //     $productModel = ModelsUser::find($user->id()->value());

    //     $productModel->delete();
    // }

    public static function map($product): Product
    {
        $date = new DateTimeValueObject();
        return Product::create(
            new Id($product->id),
            new Name($product->name),
            new Price($product->price),
            $date->fromPrimitives($product->created_at),
            !empty($product->updated_at) ? $date->fromPrimitives($product->updated_at) : null,
        );
    }
}
