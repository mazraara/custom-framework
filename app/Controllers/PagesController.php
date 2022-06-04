<?php

namespace App\Controllers;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class PagesController
{
    public function home(Request $request): Response
    {
        return new Response('Custom framework..');
    }

    public function __invoke(Request $request): Response
    {
        return new Response('testing');
    }
}
