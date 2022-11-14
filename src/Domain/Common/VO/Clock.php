<?php

declare(strict_types=1);

namespace App\Domain\Common\VO;

use Assert\Assertion;

final class Clock
{
    public function __construct(private readonly int $timestamp)
    {
        Assertion::maxLength((string) $this->timestamp, 10);
    }

    public function asInteger(): int
    {
        return $this->timestamp;
    }
}
