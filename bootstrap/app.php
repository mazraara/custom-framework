<?php

$app = new App\Foundation\App();

$app->bind('config', function () {
	return require __DIR__ . '/../config.php';
});

return $app;
