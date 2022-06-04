<?php

$routes = require __DIR__ . '/../routes.php';

//$app->bind('config', function () {
//	return require __DIR__ . '/../config.php';
//});

return new App\Foundation\CustomApp($routes);
