<?php

namespace App\Foundation;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class App
{
    private Container $container;

    public function __construct()
    {
        $this->container = new Container([
            'request' => function () {
                return Request::createFromGlobals();
            },
            'response' => function () {
                return new Response;
            }
        ]);
    }

    public function run()
    {
        $request = $this->container->request;
        $response = $this->container->response;

        switch ($request->getPathInfo()) {
            case '/':
                $response->setContent('This is the website home');
                break;

            case '/about':
                $response->setContent('This is the about page');
                break;

            default:
                $response->setContent('Not found !');
                $response->setStatusCode(Response::HTTP_NOT_FOUND);
        }

        $response->send();
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
