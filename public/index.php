<?php
use DI\Container;
use Slim\Factory\AppFactory;
use Slim\Views\Twig;

require __DIR__ . '/../vendor/autoload.php';

$container = new Container;

$settings = require __DIR__ . '/../config/settings.php';
$settings($container);

AppFactory::setContainer($container);
$app = AppFactory::create();

$container->set('view', function() {
    return Twig::create( __DIR__ .'/../resources/views', ['cache' => false]);
    // return Twig::create(__DIR__ .'/../resources/views', ['cache' => 'path/to/cache']);
});

// Register routes
(require __DIR__ . '/../config/routes.php')($app);

// Register middleware
(require __DIR__ . '/../config/middleware.php')($app);

// Register container
(require __DIR__ . '/../config/container.php')($app);

$app->run();