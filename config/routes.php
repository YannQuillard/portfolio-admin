<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\App;
use Slim\Views\Twig;
use Slim\Routing\RouteCollectorProxy;

return function (App $app) {
    
    $app->get('/', function ($request, $response, $args) {
        return $this->get('view')->render($response, 'app.twig');
    });

    $app->group('/api', function(RouteCollectorProxy $api) {
        $api->group('/project', function(RouteCollectorProxy $project) {
            $project->get('/', [\App\Controller\Api\ProjectController::class, 'allProject']);
            $project->get('/{id}', [\App\Controller\Api\ProjectController::class, 'oneProject']);
        });
    });
};


// API ROUTES
// /project/
// /project/id/
// /socials/