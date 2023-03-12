<?php

require __DIR__.'/../vendor/autoload.php';

use Slim\Psr7\Response;
use Slim\App;

// Instantiate the app
$settings = require __DIR__ . '/../src/settings.php';
$app = new App($settings);

// Set up dependencies
require __DIR__ . '/../src/dependencies.php';
// Register middleware
require __DIR__ . '/../src/middleware.php';
// Register routes
require __DIR__ . '/../src/routes.php';


try {
    $app->run();
} catch (Throwable $e) {
    $response = new Response();
    $response->getBody()->write($e->getMessage());
    echo $response->getBody();
}

