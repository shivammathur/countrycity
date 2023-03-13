<?php

namespace CountryCity;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Container\ContainerInterface;
use Slim\HttpCache\CacheProvider;
use Slim\Views\PhpRenderer;

$container = $app->getContainer();

// view renderer
$container->set('renderer', function (ContainerInterface $c) {
    $template_path = dirname(__DIR__) . '/templates/';
    return new PhpRenderer($template_path);
});

// API Cache
$container->set('cache', function () {
    return new CacheProvider();
});

class SetupCache
{
    public function addCacheHeaders(CacheProvider $cache, Request $request, Response &$response)
    {
        //set up cache headers
        $response = $cache->withEtag($response, $request->getUri()->getPath());
        $response = $cache->withExpires($response, time() + 3600);
        $response = $cache->withLastModified($response, time() - 3600);
    }
}
