<?php

use Psr\Container\ContainerInterface;
use Slim\Factory\AppFactory;
use Slim\App;

return [
    App::class => function (ContainerInterface $container) {
        AppFactory::setContainer($container);
        return AppFactory::create();
    },
];
