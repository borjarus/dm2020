<?php

use App\Controllers\PlanetController;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

require __DIR__ . '/../vendor/autoload.php';

$loader = new \Twig\Loader\FilesystemLoader(__DIR__.'/../src/Views');
$twig = new \Twig\Environment($loader, [
    'cache' => 'tmp/'
]);


$app = AppFactory::create();

// Add error middleware
$app->addErrorMiddleware(true, true, true);


// Add routes
$app->get('/', function (Request $request, Response $response) use ($twig){
    $planetController = new PlanetController();
    $planets = $planetController->getAllPlanet($request, $response);
    $renederedPage = $twig->render('index.html.twig', ['planets' => $planets]);
    $response->getBody()->write($renederedPage);

    return $response;
});


$app->run();