<?php

declare(strict_types=1);

namespace Backend\Product\Domain\ValueObjects;

require_once('Backend/Product/Domain/ValueObjects/IdInterface.php');

use Backend\Product\Domain\Exception\DomainException;

class IdValueObject implements IdInterface
{
    private int $value;

    public function __construct(int $value)
    {
        $this->guard($value);
        $this->value = $value;
    }

    public function __toString(): string
    {
        return (string )$this->value;
    }

    public function guard(int $value)
    {
        if (false === is_int($value)) {
            throw new DomainException(sprintf('Value <%s> is not a valid ID', $value));
        }
    }

    public function value(): int
    {
        return $this->value;
    }

    public function fromPrimitives(int $value): self
    {
        return new self($value);
    }


    public function equals(IdInterface $IdInterface): bool
    {
        return $this->value() === $IdInterface->value();
    }
}
