<?php declare(strict_types=1);
namespace App\Controllers;

use App\Repository\InMemoryPersistence;
use App\Repository\PlanetRepository;
use App\Services\PlanetService;
use Symfony\Component\HttpClient\HttpClient;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class PlanetController {
    /**
     * @var Symfony\Component\HttpClient\HttpClient
     */
    private $httpClient;
    /**
     * @var App\Repository\PlanetRepository
     */
    private $repository;
    public function __construct() {
        $this->httpClient = HttpClient::create();
        $this->repository = new PlanetRepository(new InMemoryPersistence());
    }
    /** 
     * @param Request $request
     * @param Response $response
     * 
     * @return Response
     */
    public function getAllPlanet(Request $request, Response $response): Response {
        $planetService = new PlanetService($this->httpClient, $this->repository);
        $planets = $planetService->getPlanets();

        $response->getBody()->write('Star Wars Planet API');
        return $response;
    }
}

