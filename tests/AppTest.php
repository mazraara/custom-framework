<?php

use App\Foundation\App;
use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Controller\ArgumentResolver;
use Symfony\Component\HttpKernel\Controller\ControllerResolver;
use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\Routing\RequestContext;

class AppTest extends TestCase
{
    public function testNotFoundHandling()
    {
        $app = $this->getAppForException();

        $response = $app->run(new Request());

        $this->assertEquals(404, $response->getStatusCode());
    }

    private function getAppForException()
    {
        $routes = require __DIR__ . '/../routes.php';
        $context = new RequestContext();
        $matcher = new UrlMatcher($routes, $context);

        $controllerResolver = new ControllerResolver();
        $argumentResolver = new ArgumentResolver();

        return new App($matcher, $controllerResolver, $argumentResolver);
    }
}
