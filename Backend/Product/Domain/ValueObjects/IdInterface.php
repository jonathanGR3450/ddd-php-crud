<?php

declare(strict_types=1);

namespace Backend\Product\Domain\ValueObjects;

interface IdInterface
{
    public function __toString(): string;

    public function value(): int;

    public function equals(IdInterface $IdInterface): bool;

    public function fromPrimitives(int $value): self;
}