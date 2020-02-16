<?php

declare(strict_types=1);

namespace App\Services;

use App\Repository\Domain\Planet;
use App\Repository\PlanetRepository;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class PlanetService
{
    /**
     * @var Symfony\Component\HttpClient\HttpClientInterface
     */
    private $httpClient;
    /**
     * @var App\Repository\PlanetRepository
     */
    private $repository;

    public function __construct(HttpClientInterface $httpClient, PlanetRepository $repository)
    {
        $this->httpClient = $httpClient;
        $this->repository = $repository;
    }

    public function getPlanets(): array
    {
        if (count($this->repository->findAll()) === 0){
            $planetsFromAPIResponse = $this->retrieveFromAPI();
            $this->save($planetsFromAPIResponse);
        }
        return $this->repository->findAll();
    }

    private function retrieveFromAPI()   
    {
        $response = $this->httpClient->request('GET', 'https://swapi.co/api/planets/');
        $code = $response->getStatusCode();
        if ($code === 200){
            return ['code' => $code, 'planets' => $response->toArray()['results']];

        } else {
            return ['code' => $code, 'planets' => []];
        }
    }

    private function save(array $response)
    {
        foreach($response['planets'] as $planet){
            $this->repository->save(Planet::fromState($planet));
        }
    }
}
