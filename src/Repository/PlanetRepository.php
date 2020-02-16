<?php

declare(strict_types=1);

namespace App\Repository;

use OutOfBoundsException;
use App\Repository\Domain\Planet;
use App\Repository\Domain\PlanetId;

class PlanetRepository
{

    /**
     * @var App\Repository\Persistence
     */
    private $persistence;

    public function __construct(Persistence $persistence)
    {
        $this->persistence = $persistence;
    }

    public function generateId(): PlanetId
    {
        return PlanetId::fromInt($this->persistence->generateId());
    }

    public function findById(PlanetId $id): Planet
    {
        try {
            $planet = $this->persistence->retrieve($id->toInt());
        } catch (OutOfBoundsException $e) {
            throw new OutOfBoundsException(sprintf('Planet with id %d does not exist', $id->toInt()), 0, $e);
        }

        return $planet;
    }

    public function findAll(): array
    {
        return $this->persistence->retrieveAll();
    }

    public function save(Planet $planet)
    {
        $planetId = $planet->setId($this->generateId());
        $this->persistence->persist([
            'id' => $planetId,
            'name' => $planet->getName(),
            'rotationPeriod' => $planet->getRotationPeriod(),
            'orbitalPeriod' => $planet->getOrbitalPeriod(),
            'climate' => $planet->getClimate(),
            'gravity' => $planet->getGravity(),
            'terrain' => $planet->getTerrain(),
            'surfaceWater' => $planet->getSurfaceWater(),
            'population' => $planet->getPopulation(),
        ]);
    }
}
