<?php

declare(strict_types=1);

namespace App\Infrastructure\Driven\QueryHandler;

use App\Application\Query\PaginatedQuery;
use App\Application\QueryHandler\PaginatedQueryHandler;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\QueryBuilder;
use Undabot\SymfonyJsonApi\Model\Collection\ArrayCollection;
use Undabot\SymfonyJsonApi\Model\Collection\ObjectCollection;
use Undabot\SymfonyJsonApi\Service\Pagination\Paginator;

abstract class DoctrineQueryHandler implements PaginatedQueryHandler
{
    public function __construct(protected readonly EntityManagerInterface $entityManager)
    {
    }

    public function makePaginatedResultsIfNeeded(QueryBuilder $queryBuilder, PaginatedQuery $query): ObjectCollection
    {
        return (null !== $query->offset && null !== $query->size)
            ? (new Paginator())
                ->createPaginatedCollection(
                    $queryBuilder,
                    $query->offset,
                    $query->size
                )
            : new ArrayCollection($queryBuilder->getQuery()->getResult());
    }
}
