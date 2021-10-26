<?php
use Psr\Container\ContainerInterface;

return function (ContainerInterface $container) {
    //empty
    $container->set('PDO', function() {
        $host = $_ENV['DB_HOST'];
        $name = $_ENV['DB_DATABASE'];
        $username = $_ENV['DB_USERNAME'];
        $password = $_ENV['DB_PASSWORD'];
        $flags = [
            PDO::ATTR_PERSISTENT => false,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_EMULATE_PREPARES => true,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8mb4 COLLATE utf8mb4_unicode_ci'
        ];
        
        return new PDO("mysql:host=$host;dbname=$name", $username, $password, $flags);
    });
};