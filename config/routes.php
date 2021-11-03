<?php
use Slim\App;
use Slim\Routing\RouteCollectorProxy;

return function (App $app) {
    $app->options('/{routes:.+}', function ($request, $response, $args) {
        return $response;
    });
    
    $app->get('/', function ($request, $response, $args) {
        return $this->get('view')->render($response, 'app.twig');
    });

    $app->group('/project', function(RouteCollectorProxy $project) {
        $project->get('/', [\App\Controller\Api\ProjectController::class, 'allProject']);
        $project->get('/{id}/', [\App\Controller\Api\ProjectController::class, 'oneProject']);
    });

    $app->get('/contact/', [\App\Controller\Api\ContactController::class, 'allContact']);
};


// API ROUTES
// /project/
// /project/id/
// /socials/