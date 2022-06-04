<?php

declare(strict_types=1);

error_reporting(E_ALL);

require __DIR__ . '/../vendor/autoload.php';

use Symfony\Component\HttpFoundation\Request;

$request = Request::createFromGlobals();
$container = include __DIR__ . '/../container.php';

//$app = require __DIR__ . '/../bootstrap/app.php';

$response = $container->get('custom_app')->handle($request);
$response->send();

//$app->handle($request)->send();
