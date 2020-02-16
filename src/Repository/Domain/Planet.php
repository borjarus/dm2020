<?php

declare(strict_types=1);

namespace App\Repository\Domain;


class Planet
{
    /**
     * @var App\Repository\Domain\PlanetId
     */
    private $id;
    /**
     * @var string
     */
    private $name;
    /**
     * @var int
     */
    private $rotationPeriod;
    /**
     * @var int
     */
    private $orbitalPeriod;
    /**
     * @var App\Repository\Domain\Climate
     */
    private $climate;
    /**
     * @var string
     */
    private $gravity;
    /**
     * @var App\Repository\Domain\Terrain
     */
    private $terrain;
    /**
     * @var int
     */
    private $surfaceWater;
    /**
     * @var int
     */
    private $population;

    public function __construct(
        string $name,
        int $rotationPeriod,
        int $orbitalPeriod,
        array $climate,
        string $gravity,
        array $terrain,
        int $surfaceWater,
        int $population
    ) {
        $this->name = $name;
        $this->rotationPeriod = $rotationPeriod;
        $this->orbitalPeriod = $orbitalPeriod;
        $this->climate = $climate;
        $this->gravity = $gravity;
        $this->terrain = $terrain;
        $this->surfaceWater = $surfaceWater;
        $this->population = $population;
    }

    public static function fromState(array $state): Planet
    {
        return new self(
            $state['name'],
            (int) $state['rotation_period'],
            (int) $state['orbital_period'],
            Climate::fromString($state['climate']),
            $state['gravity'],
            Terrain::fromString($state['terrain']),
            (int) $state['surface_water'],
            (int) $state['population']
        );
    }


    /**
     * @param  App\Repository\Domain\PlanetId  $id
     */
    public function setId(PlanetId $id)
    {
        $this->id = $id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getRotationPeriod()
    {
        return $this->rotationPeriod;
    }

    public function getOrbitalPeriod()
    {
        return $this->orbitalPeriod;
    }

    public function getClimate()
    {
        return $this->climate;
    }

    public function getGravity()
    {
        return $this->gravity;
    }

    public function getTerrain()
    {
        return $this->terrain;
    }

    public function getSurfaceWater()
    {
        return $this->surfaceWater;
    }

    public function getPopulation()
    {
        return $this->population;
    }

    public function toArray()
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'rotationPeriod' => $this->rotationPeriod,
            'orbitalPeriod' => $this->orbitalPeriod,
            'climate' => $this->climate,
            'gravity' => $this->gravity,
            'terrain' => $this->terrain,
            'surfaceWater' => $this->surfaceWater,
            'population' => $this->population,
        ];
    }
}
