<?php

declare(strict_types=1);

namespace Backend\Product\Domain\Aggregate;

require_once('Backend/Product/Domain/ValueObjects/DateTimeValueObject.php');
require_once('Backend/Product/Domain/ValueObjects/Id.php');
require_once('Backend/Product/Domain/ValueObjects/Name.php');
require_once('Backend/Product/Domain/ValueObjects/Price.php');
require_once('Backend/Product/Domain/ValueObjects/StringValueObject.php');

use Backend\Product\Domain\ValueObjects\DateTimeValueObject;
use Backend\Product\Domain\ValueObjects\Id;
use Backend\Product\Domain\ValueObjects\Name;
use Backend\Product\Domain\ValueObjects\Price;
use Backend\Product\Domain\ValueObjects\StringValueObject;

final class Product
{

    private ?Id $id;
    private Name $name;
    private Price $price;
    private DateTimeValueObject $created_at;
    private ?DateTimeValueObject $updated_at;

    public function __construct(
        ?Id $id,
        Name $name,
        Price $price,
        DateTimeValueObject $created_at,
        ?DateTimeValueObject $updated_at
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
        $this->created_at = $created_at;
        $this->updated_at = $updated_at;
    }

    public static function create(
        ?Id $id,
        Name $name,
        Price $price,
        DateTimeValueObject $created_at,
        ?DateTimeValueObject $updated_at = null
    ): self {
        return new self(
            $id,
            $name,
            $price,
            $created_at,
            $updated_at
        );
    }

    public function id(): Id
    {
        return $this->id;
    }


    public function name(): Name
    {
        return $this->name;
    }

    public function price(): Price
    {
        return $this->price;
    }



    public function createdAt(): DateTimeValueObject
    {
        return $this->created_at;
    }

    public function updatedAt(): ?DateTimeValueObject
    {
        return $this->updated_at;
    }

    public function updateName(string $name): void
    {
        $this->name = new StringValueObject($name);
    }

    public function updatePrice(int $price): self
    {
        $this->price = new Price($price);
        return $this;
    }


    public function asArray(): array
    {
        return [
            'id' => $this->id()->value() ?? null,
            'name' => $this->name()->value(),
            'price' => $this->price()->value(),
            'created_at' => $this->createdAt()->value(),
            'updated_at' => $this->updatedAt()->value() ?? null
        ];
    }
}
