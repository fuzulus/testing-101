<?php

declare(strict_types=1);

namespace App\Infrastructure\Driven\Request\Pokedex;

use Undabot\SymfonyJsonApi\Http\Model\Request\GetResourceRequest;

final class GetPokedexEntryRequest
{
    public const INCLUDE_POKEMON = 'pokemon';

    public function __construct(private readonly GetResourceRequest $request)
    {
        $request->allowIncluded([
            self::INCLUDE_POKEMON,
        ]);
        $request->allowFields([]);
    }

    public function includesPokemon(): bool
    {
        return $this->request->isIncluded(self::INCLUDE_POKEMON);
    }
}
