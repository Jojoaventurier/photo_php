<?php

require_once __DIR__ . '/../vendor/autoload.php';

use App\Security\Security;

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$routes = require __DIR__ . '/../config/routes.php';

$route = $routes[$uri] ?? null;

if (!$route) {
    http_response_code(404);
    echo "404 Not Found";
    exit;
}

$controller = new $route['controller']();
$method = $route['method'];

echo $controller->$method();