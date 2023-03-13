<?php

require __DIR__ . '/../vendor/autoload.php';

use DI\ContainerBuilder;
use Slim\Psr7\Response;
use Slim\App;

$containerBuilder = new ContainerBuilder();

$containerBuilder->addDefinitions(dirname(__DIR__) . '/src/settings.php');

$container = $containerBuilder->build();

$app = $container->get(App::class);

require dirname(__DIR__) . '/src/dependencies.php';
require dirname(__DIR__) . '/src/routes.php';
require dirname(__DIR__) . '/src/middleware.php';

$app->addRoutingMiddleware();

try {
    $app->run();
} catch (Throwable $e) {
    $response = new Response();
    $response->getBody()->write($e->getMessage());
    echo $response->getBody();
}
