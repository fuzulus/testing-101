<?php

declare(strict_types=1);

namespace App\Infrastructure\Driven\Persistence\Doctrine\DatabaseIdentifier;

use App\Domain\Common\Id;
use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\ConversionException;
use Doctrine\DBAL\Types\Type;

abstract class IdType extends Type
{
    public function getSQLDeclaration(array $column, AbstractPlatform $platform): string
    {
        return $platform->getGuidTypeDeclarationSQL($column);
    }

    public function convertToPHPValue($value, AbstractPlatform $platform): ?Id
    {
        if (empty($value)) {
            return null;
        }

        $idClass = $this->getIdClass();
        if ($value instanceof $idClass && $value instanceof Id) {
            return $value;
        }

        try {
            if (false === $value instanceof \Stringable) {
                throw new \InvalidArgumentException();
            }

            $id = $this->createIdFromString((string) $value);
        } catch (\Exception) {
            throw ConversionException::conversionFailed($value, $this->getName());
        }

        return $id;
    }

    public function convertToDatabaseValue($value, AbstractPlatform $platform): ?string
    {
        if (empty($value)) {
            return null;
        }

        $idClass = $this->getIdClass();
        if (
            $value instanceof $idClass
            || (
                (\is_string($value) || $value instanceof \Stringable)
                && $this->isValid((string) $value)
            )
        ) {
            if ($value instanceof \Stringable) {
                return (string) $value;
            }
        }

        throw ConversionException::conversionFailed($value, $this->getName());
    }

    public function requiresSQLCommentHint(AbstractPlatform $platform): bool
    {
        return true;
    }

    abstract protected function getIdClass(): string;

    abstract protected function createIdFromString(string $value): Id;

    abstract protected function isValid(string $value): bool;
}
