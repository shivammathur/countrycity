<?php
// Routes

$app->get('/get/countries', function ($request, $response, $args) {
    // log message 
    $this->logger->info("CountryCity 'countries' route");
    // Render countries API
    return $this->renderer->render($response, 'countries.php', $args);
});


$app->get('/get/cities/{countryName}', function ($request, $response, $args) {
    //log message
    $this->logger->info("CountryCity 'cities' route");
    // Render cities API
    return $this->renderer->render($response, 'cities.php', $args);
});

$app->get('/', function ($request, $response, $args) {
    // log message
    $this->logger->info("CountryCity '/' route");
    // Render index view
    return $this->renderer->render($response, 'home.php', $args);
});

