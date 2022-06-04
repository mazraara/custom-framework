<?php

$app = new App\Foundation\App();

$app->bind('config', function () {
	return require __DIR__ . '/../config.php';
});

$app->bind('routes', function () {
    return require __DIR__ . '/../routes.php';
});

return $app;
