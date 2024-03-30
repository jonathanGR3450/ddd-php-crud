<?php

declare(strict_types=1);

namespace Backend\Product\Domain\ValueObjects;

class StringValueObject
{

    protected string $value;

    public function __construct(string $value) {
        $this->value = $value;
    }

    public function value(): string
    {
        return $this->value;
    }

    public function __toString(): string
    {
        return $this->value();
    }

    public function fromString(string $value): self
    {
        return new self($value);
    }

    public function isEmpty(): bool
    {
        return empty($this->value());
    }

    public function equals(StringValueObject $stringValueObject): bool
    {
        return $this->value() === $stringValueObject->value();
    }
}