<?php

namespace spec\App\Services;

use PhpSpec\ObjectBehavior;
use App\Services\PlanetService;
use App\Repository\InMemoryPersistence;
use App\Repository\PlanetRepository;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class PlanetServiceSpec extends ObjectBehavior
{
    function let(HttpClientInterface $httpClient)
    {
        $httpClient = HttpClient::create();
        $repository = new PlanetRepository(new InMemoryPersistence());
        $this->beConstructedWith($httpClient, $repository);
    }
    function it_is_initializable()
    {
        $this->shouldHaveType(PlanetService::class);
    }

    function it_will_return_array_with_planets()
    {
        $this->getPlanets()->shouldBeArray();
    }
}
