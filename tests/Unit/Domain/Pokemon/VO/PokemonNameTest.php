<?php

declare(strict_types=1);

namespace App\Tests\Unit\Domain\Pokemon\VO;

use App\Domain\Pokemon\Exception\PokemonNameCannotBeBlankException;
use App\Domain\Pokemon\VO\PokemonName;
use PHPUnit\Framework\TestCase;

/**
 * @coversDefaultClass \App\Domain\Pokemon\VO\PokemonName
 *
 * @small
 */
final class PokemonNameTest extends TestCase
{
    public function testObjectWillBeCreatedWithValidPokemonName(): void
    {
        $value = 'Charizard';

        $pokemonName = new PokemonName($value);

        self::assertSame($value, (string) $pokemonName);
    }

    public function testObjectWillThrowExceptionForBlankName(): void
    {
        $this->expectException(PokemonNameCannotBeBlankException::class);
        new PokemonName('');
    }
}
