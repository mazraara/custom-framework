<?php

declare(strict_types=1);

use Symfony\Component\HttpFoundation\Request;

error_reporting(E_ALL);

$request = Request::createFromGlobals();

require __DIR__ . '/../vendor/autoload.php';

$app = require __DIR__ . '/../bootstrap/app.php';

$app->run($request);
