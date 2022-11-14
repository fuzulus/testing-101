<?php

declare(strict_types=1);

namespace App\Domain\Pokemon\VO;

use Assert\Assertion;

final class PokemonName
{
    public function __construct(private readonly string $name)
    {
        Assertion::notBlank($name);
    }

    public function __toString(): string
    {
        return $this->name;
    }
}
