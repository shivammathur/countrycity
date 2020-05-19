<?php
// Routes

use Slim\Http\Request;
use Slim\Http\Response;

$app->get('/countries', function (Request $request, Response $response, $args) {
    // Set up cache headers
    $setup = new SetupCache();
    $setup->addCacheHeaders($this->cache, $request, $response);

    // Render countries API
    return $this->renderer->render($response, 'countries.php', $args);
});

$app->get('/countries/{search}', function (Request $request, Response $response, $args) {
    // Set up cache headers
    $setup = new SetupCache();
    $setup->addCacheHeaders($this->cache, $request, $response);

    // Render countries API
    return $this->renderer->render($response, 'countries_search.php', $args);
});

$app->get('/cities/{countryName}', function (Request $request, Response $response, $args) {
    // Set up cache headers
    $setup = new SetupCache();
    $setup->addCacheHeaders($this->cache, $request, $response);

    // Render cities API
    return $this->renderer->render($response, 'cities.php', $args);
});

$app->get('/cities/{countryName}/{search}', function (Request $request, Response $response, $args) {
    // Set up cache headers
    $setup = new SetupCache();
    $setup->addCacheHeaders($this->cache, $request, $response);

    // Render cities API
    return $this->renderer->render($response, 'cities_search.php', $args);
});

$app->get('/', function (Request $request, Response $response, $args) {
    // Set up cache headers
    $setup = new SetupCache();
    $setup->addCacheHeaders($this->cache, $request, $response);

    // Render index view
    return $this->renderer->render($response, 'home.php', $args);
});
