<?php
// Application middleware

use Slim\HttpCache\Cache;
use Slim\Http\Request;
use Slim\Http\Response;

$app->add(new Cache('public', 86400));
$app->add(function(Request $request, Response $response, $next) {
    $route = $request->getAttribute("route");
    $methods = [];
    if (!empty($route)) {
        $pattern = $route->getPattern();
        foreach ($this->router->getRoutes() as $route) {
            if ($pattern === $route->getPattern()) {
                $methods = array_merge_recursive($methods, $route->getMethods());
            }
        }
    } else {
        $methods[] = $request->getMethod();
    }

    /**
     * @var Response $response
     */
    $response = $next($request, $response);
    return $response->withHeader('Access-Control-Allow-Origin', '*')
                    ->withHeader("Access-Control-Allow-Methods", implode(",", $methods));
});
