<?php

use App\Foundation\CustomApp;
use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpFoundation\Request;

class AppTest extends TestCase
{
    public function testNotFoundHandling()
    {
        $app = $this->getAppForException();

        $response = $app->handle(new Request());

        $this->assertEquals(404, $response->getStatusCode());
    }

    private function getAppForException()
    {
        $routes = require __DIR__ . '/../routes.php';

        return new CustomApp($routes);
    }
}
