<?php

declare(strict_types=1);

namespace App\Domain\Pokedex\VO;

use Assert\Assertion;

final class PokedexEntryNumber
{
    private string $number;

    public function __construct(string $number)
    {
        Assertion::notBlank($number);

        if (false === str_starts_with($number, '#')) {
            $number = '#' . $number;
        }

        $this->number = $number;
    }

    public function __toString(): string
    {
        return $this->number;
    }
}
