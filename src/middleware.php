<?php

use Psr\Http\Server\RequestHandlerInterface as RequestHandler;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Routing\RouteContext;
use Slim\HttpCache\Cache;

$app->add(new Cache('public', 86400));

$app->add(function(Request $request, RequestHandler $handler) use ($app) {
    $all_routes = $app->getRouteCollector()->getRoutes();

    // Get required methods
    $methods = [];
    if (! empty($routes)) {
        $routeContext = RouteContext::fromRequest($request);
        $current_route_pattern = $routeContext->getRoute()->getPattern();
        foreach ($all_routes as $route) {
            if ($current_route_pattern === $route->getPattern()) {
                $methods = array_merge_recursive($methods, $route->getMethods());
            }
        }
    } else {
        $methods[] = $request->getMethod();
    }

    return $handler->handle($request)
                ->withHeader('Access-Control-Allow-Origin', '*')
                ->withHeader("Access-Control-Allow-Methods", implode(",", $methods));
});

/**
 * Note: This middleware should be added last. 
 * It will not handle any exceptions/errors
 * for middleware added after it.
 */
$errorMiddleware = $app->addErrorMiddleware(
    $displayErrorDetails = true,
    $logErrors = true,
    $logErrorDetails = true,
);