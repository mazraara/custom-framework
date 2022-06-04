<?php

use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RouteCollection;

$routes = new RouteCollection();

$routes->add('hello', new Route('/hello/{name}', ['name' => 'World']));
$routes->add('bye', new Route('/bye'));

$routes->add(
    'homepage',
    new Route(
        '/{page}',
        ['controller' => 'HomeController', 'method' => 'index', 'page' => 1]
    )
);

return $routes;
