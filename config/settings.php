<?php
use \Psr\Container\ContainerInterface;

// Timezone
date_default_timezone_set('Europe/Paris');

if($_ENV['ENV'] === 'DEV') {
    error_reporting(E_ALL);
    ini_set('display_errors', '1');
    $bool = true;
}
else {
    error_reporting(0);
    ini_set('display_errors', '0');
    $bool = false;
}


return function (ContainerInterface $container) {
    $container->set('settings', function () {
        if($_ENV['ENV'] === 'DEV') {
            $bool = true;
        }
        else {
            $bool = false;
        }

        return [
            'displayErrorDetails' => $bool,
            'logErrorDetails' => $bool,
            'logErrors' => $bool,
        ];
    });
};