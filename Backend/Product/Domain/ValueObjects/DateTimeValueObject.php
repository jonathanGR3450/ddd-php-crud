<?php

declare(strict_types=1);

namespace Backend\Product\Domain\ValueObjects;

require_once('Backend/Product/Domain/ValueObjects/DateTimeInterface.php');

use DateTimeImmutable;
use DateTimeZone;

class DateTimeValueObject extends DateTimeImmutable implements DateTimeInterface
{

    public function value(): string
    {
        return $this->setTimezone(new DateTimeZone(static::DATETIME_ZONE))->format(static::DATETIME_FORMAT);
    }

    public function fromPrimitives(string $datetime): self
    {
        return new self($datetime);
    }

    public function now(): self
    {
        return new self('now');
    }
}