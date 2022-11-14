<?php

declare(strict_types=1);

namespace App\Application\Repository\Pokedex;

use App\Domain\Pokedex\PokedexEntry;

interface PokedexEntryWriteRepository
{
    public function save(PokedexEntry $pokedexEntry): void;
}
