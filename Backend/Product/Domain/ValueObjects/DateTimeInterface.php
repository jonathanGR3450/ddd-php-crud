<?php

declare(strict_types=1);

namespace Backend\Product\Domain\ValueObjects;

interface DateTimeInterface
{
    public const DATETIME_FORMAT = 'Y-m-d H:i:s.u e';
    public const DATETIME_ZONE = 'UTC';

    public function value(): string;

    public function fromPrimitives(string $datetime): self;

}