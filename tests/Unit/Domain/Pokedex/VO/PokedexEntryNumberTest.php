<?php

declare(strict_types=1);

namespace App\Tests\Unit\Domain\Pokedex\VO;

use App\Domain\Pokedex\Exception\PokedexEntryNumberInvalidFormatException;
use App\Domain\Pokedex\VO\PokedexEntryNumber;
use PHPUnit\Framework\TestCase;

final class PokedexEntryNumberTest extends TestCase
{
    public function testObjectWillBeCreatedWithValidPokedexEntryNumber(): void
    {
        $value = '#001';

        $pokedexEntryNumber = new PokedexEntryNumber($value);

        self::assertSame($value, (string) $pokedexEntryNumber);
    }

    public function testObjectWillThrowExceptionForInvalidFormat(): void
    {
        $this->expectException(PokedexEntryNumberInvalidFormatException::class);
        new PokedexEntryNumber('001');
    }
}
