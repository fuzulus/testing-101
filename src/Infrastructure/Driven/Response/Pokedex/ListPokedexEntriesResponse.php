<?php

declare(strict_types=1);

namespace App\Infrastructure\Driven\Response\Pokedex;

use App\Domain\Pokedex\ViewModel\PokedexEntryListViewModel;
use App\Infrastructure\Driven\Request\Pokedex\ListPokedexEntriesRequest;
use Undabot\SymfonyJsonApi\Model\Collection\ObjectCollection;

final class ListPokedexEntriesResponse
{
    public function __construct(
        private readonly ObjectCollection $pokedexEntries,
    ) {
    }

    public function resources(): ObjectCollection
    {
        return $this->pokedexEntries;
    }
}
