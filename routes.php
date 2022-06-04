<?php

use App\Controllers\PagesController;
use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RouteCollection;

$routes = new RouteCollection();

$routes->add(
    'home',
    new Route('/home', [
        '_controller' => PagesController::class . '::home',
        'title' => 'home',
    ])
);
return $routes;
