<?php

declare(strict_types=1);

namespace App\Repository\Domain;

use InvalidArgumentException;

class PlanetId
{
    private int $id;

    public static function fromInt(int $id): PlanetId
    {
        self::ensureIsValid($id);

        return new self($id);
    }

    private function __construct(int $id)
    {
        $this->id = $id;
    }

    public function toInt(): int
    {
        return $this->id;
    }

    private static function ensureIsValid(int $id)
    {
        if ($id <= 0) {
            throw new InvalidArgumentException('Invalid PlanetId given');
        }
    }
}
