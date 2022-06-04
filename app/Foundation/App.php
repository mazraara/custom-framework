<?php

namespace App\Foundation;

use Exception;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Controller\ArgumentResolver;
use Symfony\Component\HttpKernel\Controller\ControllerResolver;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\Matcher\UrlMatcher;

class App
{
    private Container $container;
    private UrlMatcher $matcher;
    private ControllerResolver $controllerResolver;
    private ArgumentResolver $argumentResolver;

    public function __construct(
        UrlMatcher $matcher,
        ControllerResolver $controllerResolver,
        ArgumentResolver $argumentResolver
    ) {
        $this->matcher = $matcher;
        $this->controllerResolver = $controllerResolver;
        $this->argumentResolver = $argumentResolver;
        $this->container = new Container([]);
    }

    public function run(Request $request)
    {
        $this->matcher->getContext()->fromRequest($request);
        try {
            $request->attributes->add($this->matcher->match($request->getPathInfo()));
            $controller = $this->controllerResolver->getController($request);
            $arguments = $this->argumentResolver->getArguments($request, $controller);
            $response = call_user_func_array($controller, $arguments);
        } catch (ResourceNotFoundException $e) {
            $response = new Response('Not found!', Response::HTTP_NOT_FOUND);
        } catch (Exception $e) {
            $response = new Response('An error occurred. ' . $e->getMessage(), Response::HTTP_INTERNAL_SERVER_ERROR);
        }

        return $response->send();
    }

    public function bind($key, callable $callable)
    {
        $this->container[$key] = $callable;
    }

    public function __get($property)
    {
        return $this->container[$property];
    }

}
