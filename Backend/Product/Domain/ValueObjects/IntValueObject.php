<?php

declare(strict_types=1);

namespace Backend\Product\Domain\ValueObjects;

class IntValueObject
{

    protected int $value;

    public function __construct(int $value) {
        $this->value = $value;
    }

    public function value(): int
    {
        return $this->value;
    }

    public function __toString(): string
    {
        return (string) $this->value();
    }

    public function fromString(int $value): self
    {
        return new self($value);
    }

    public function isEmpty(): bool
    {
        return empty($this->value());
    }

    public function equals(IntValueObject $intValueObject): bool
    {
        return $this->value() === $intValueObject->value();
    }
}