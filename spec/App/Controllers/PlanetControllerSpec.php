<?php

namespace spec\App\Controllers;

use Slim\Psr7\Request;
use Slim\Psr7\Response;
use PhpSpec\ObjectBehavior;
use App\Controllers\PlanetController;

class PlanetControllerSpec extends ObjectBehavior
{
    function let(Request $request, Response $response)
    {
        $this->beConstructedWith($request, $response);
    }
    function it_is_initializable()
    {
        $this->shouldHaveType(PlanetController::class);
    }

    
}
