<?php
require_once __DIR__ . '/../vendor/autoload.php';

// Get the requested URL path
$url = $_GET['url'] ?? '/';

// Load routes
$routes = require __DIR__ . '/../config/routes.php';

// Find matching route
if (!isset($routes[$url])) {
    http_response_code(404);
    echo "404 - Page not found (route not defined)";
    exit;
}

$route = $routes[$url];
$controllerClass = $route['controller'];
$method = $route['method'];

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

echo $controller->$method();