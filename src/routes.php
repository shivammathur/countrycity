<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

$setup = new SetupCache();

$app->get('/countries', function (Request $request, Response $response) use ($setup) {
    $setup->addCacheHeaders($this->get('cache'), $request, $response);
    return $this->get('renderer')->render($response, 'countries.php');
});

$app->get('/countries/{search}', function (Request $request, Response $response, $args) use ($setup) {
    $setup->addCacheHeaders($this->get('cache'), $request, $response);
    return $this->get('renderer')->render($response, 'countries_search.php', $args);
});

$app->get('/cities/{countryName}', function (Request $request, Response $response, $args) use ($setup) {
    $setup->addCacheHeaders($this->get('cache'), $request, $response);
    return $this->get('renderer')->render($response, 'cities.php', $args);
});

$app->get('/cities/{countryName}/{search}', function (Request $request, Response $response, $args) use ($setup) {
    $setup->addCacheHeaders($this->get('cache'), $request, $response);
    return $this->get('renderer')->render($response, 'cities_search.php', $args);
});

$app->get('/', function (Request $request, Response $response) use ($setup) {
    $setup->addCacheHeaders($this->get('cache'), $request, $response);
    return $this->get('renderer')->render($response, 'home.php');
});
