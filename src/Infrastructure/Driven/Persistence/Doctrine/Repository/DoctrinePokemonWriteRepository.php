<?php

declare(strict_types=1);

namespace App\Infrastructure\Driven\Persistence\Doctrine\Repository;

use App\Application\Repository\Pokemon\PokemonWriteRepository;
use App\Domain\Pokedex\PokedexEntry;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use App\Domain\Pokemon\Pokemon;

/** @extends ServiceEntityRepository<PokedexEntry> */
final class DoctrinePokemonWriteRepository extends ServiceEntityRepository implements PokemonWriteRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Pokemon::class);
    }

    public function save(Pokemon $pokemon): void
    {
        $this->_em->persist($pokemon);
        $this->_em->flush();
    }
}
