<?php

use Slim\App;
use Slim\Views\TwigMiddleware;

return function (App $app) {
    $setting = $app->getContainer()->get('settings');

    $app->add(\App\Middleware\CorsMiddleware::class);

    $app->addRoutingMiddleware();

    $app->addErrorMiddleware(
        $setting['displayErrorDetails'],
        $setting['logErrors'],
        $setting['logErrorDetails']
    );

    $app->add(TwigMiddleware::createFromContainer($app));
};