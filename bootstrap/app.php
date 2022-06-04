<?php

use Symfony\Component\HttpKernel\Controller\ArgumentResolver;
use Symfony\Component\HttpKernel\Controller\ControllerResolver;
use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\Routing\RequestContext;

$routes = require __DIR__ . '/../routes.php';
$context = new RequestContext();
$matcher = new UrlMatcher($routes, $context);

$controllerResolver = new ControllerResolver();
$argumentResolver = new ArgumentResolver();

$app = new App\Foundation\App($matcher, $controllerResolver, $argumentResolver);

$app->bind('config', function () {
	return require __DIR__ . '/../config.php';
});

$app->bind('routes', function () {
    return require __DIR__ . '/../routes.php';
});

return $app;
