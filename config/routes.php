<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\App;
use Slim\Views\Twig;

return function (App $app) {
    
    $app->get('/', function ($request, $response, $args) {
        return $this->get('view')->render($response, 'app.twig');
    });
};