<?php
require_once __DIR__ . '/../vendor/autoload.php';

// Get the requested URL path
$url = $_GET['url'] ?? '/';
$url = '/' . trim($url, '/'); // Normalize url with leading slash, no trailing slash

// Load routes
$routes = require __DIR__ . '/../config/routes.php';

$matchedRoute = null;
$matchedParams = [];

foreach ($routes as $routePath => $route) {
    // Convert route path with {param} to regex
    $paramNames = [];
    $pattern = preg_replace_callback('/\{(\w+)\}/', function($matches) use (&$paramNames) {
        $paramNames[] = $matches[1];
        return '([^/]+)';
    }, $routePath);

    // Add start/end delimiters and enforce full match
    $pattern = "#^" . $pattern . "$#";

    if (preg_match($pattern, $url, $matches)) {
        array_shift($matches); // Remove full match
        $matchedParams = array_combine($paramNames, $matches);
        $matchedRoute = $route;
        break;
    }
}

if (!$matchedRoute) {
    http_response_code(404);
    echo "404 - Page not found (route not defined)";
    exit;
}

$controllerClass = $matchedRoute['controller'];
$method = $matchedRoute['method'];

if (!class_exists($controllerClass)) {
    http_response_code(500);
    echo "Error: Controller class '$controllerClass' not found.";
    exit;
}

$controller = new $controllerClass();

if (!method_exists($controller, $method)) {
    http_response_code(500);
    echo "Error: Method '$method' not found in controller '$controllerClass'.";
    exit;
}

// ✅ Best practice: method with typed, named parameters
echo call_user_func_array([$controller, $method], $matchedParams);