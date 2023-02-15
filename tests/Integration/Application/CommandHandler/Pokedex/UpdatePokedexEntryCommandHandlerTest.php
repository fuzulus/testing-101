<?php

declare(strict_types=1);

namespace App\Tests\Integration\Application\CommandHandler\Pokedex;

use App\Application\Command\Pokedex\UpdatePokedexEntryCommand;
use App\Application\CommandHandler\Pokedex\UpdatePokedexEntryCommandHandler;
use App\Application\Repository\Pokedex\PokedexEntryReadRepository;
use App\Domain\Pokedex\Exception\PokedexEntryNumberTakenException;
use App\Domain\Pokedex\PokedexEntryId;
use App\Domain\Pokedex\VO\PokedexEntryNumber;
use App\Infrastructure\Driven\Persistence\Doctrine\Fixtures\PokedexEntryFixture;
use App\Tests\Integration\IntegrationTestCase;

/**
 * @coversDefaultClass \App\Application\CommandHandler\Pokedex\UpdatePokedexEntryCommandHandler
 *
 * @small
 */
final class UpdatePokedexEntryCommandHandlerTest extends IntegrationTestCase
{
    private static PokedexEntryReadRepository $pokedexEntryReadRepository;

    private static UpdatePokedexEntryCommandHandler $commandHandler;

    public static function setUpBeforeClass(): void
    {
        parent::setUpBeforeClass();

        /** @var PokedexEntryReadRepository $pokedexEntryReadRepository */
        $pokedexEntryReadRepository = self::getContainer()->get(PokedexEntryReadRepository::class);
        self::$pokedexEntryReadRepository = $pokedexEntryReadRepository;

        /** @var UpdatePokedexEntryCommandHandler $commandHandler */
        $commandHandler = self::getContainer()->get(UpdatePokedexEntryCommandHandler::class);
        self::$commandHandler = $commandHandler;
    }

    public function testCommandWillUpdatePokedexEntry(): void
    {
        $command = new UpdatePokedexEntryCommand(
            PokedexEntryId::fromString(PokedexEntryFixture::IDS[0]),
            new PokedexEntryNumber('#003'),
        );

        self::$commandHandler->__invoke($command);

        $pokedexEntry = self::$pokedexEntryReadRepository->get($command->id);

        static::assertSame((string) $command->id, (string) $pokedexEntry->id());
        static::assertSame((string) $command->number, (string) $pokedexEntry->number());
    }

    public function testCommandWillThrowExceptionIfPokedexEntryNumberIsTaken(): void
    {
        $command = new UpdatePokedexEntryCommand(
            PokedexEntryId::fromString(PokedexEntryFixture::IDS[0]),
            new PokedexEntryNumber('#002'),
        );

        $this->expectException(PokedexEntryNumberTakenException::class);
        self::$commandHandler->__invoke($command);
    }
}
