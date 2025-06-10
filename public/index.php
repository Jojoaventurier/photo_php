<?php
require_once __DIR__ . '/../vendor/autoload.php';

// Get the requested URL path (e.g., "/gallery")
$url = $_GET['url'] ?? '/';  // Comes from .htaccess rewrite

// Load routes
$routes = require __DIR__ . '/../config/routes.php';

// Find matching route
if (!isset($routes[$url])) {
    http_response_code(404);
    echo "404 - Page not found";
    exit;
}

// Execute the route
$controller = new $routes[$url]['controller']();
$method = $routes[$url]['method'];
echo $controller->$method();