<?php
// DIC configuration

use Psr\Container\ContainerInterface;
use Slim\HttpCache\CacheProvider;
use Slim\Http\Request;
use Slim\Http\Response;

$container = $app->getContainer();

// view renderer
$container['renderer'] = function (ContainerInterface $c) {
    $settings = $c->get('settings')['renderer'];
    return new Slim\Views\PhpRenderer($settings['template_path']);
};

$container['cache'] = function () {
    return new CacheProvider();
};

Class SetupCache
{
    public function addCacheHeaders(CacheProvider $cache, Request $request, Response &$response)
    {
        //set up cache headers
        $response = $cache->withEtag($response, $request->getUri()->getPath());
        $response = $cache->withExpires($response, time() + 3600);
        $response = $cache->withLastModified($response, time() - 3600);
    }
}
