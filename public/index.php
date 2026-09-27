<?php
require_once __DIR__ . '/../vendor/autoload.php';

use App\Controller\ErrorController;

// Get the requested URL path from htaccess
$url = $_GET['url'] ?? '';
$url = '/' . trim($url, '/'); // Normalize: always start with "/", no trailing "/"

// Load routes
$routes = require __DIR__ . '/../config/routes.php';

$matchedRoute = null;
$matchedParams = [];

foreach ($routes as $routePath => $route) {
    // Convert {param} placeholders to regex
    $paramNames = [];
    $pattern = preg_replace_callback('/\{(\w+)\}/', function($matches) use (&$paramNames) {
        $paramNames[] = $matches[1];
        return '([^/]+)';
    }, $routePath);

    // Match entire URL
    $pattern = "#^" . $pattern . "$#";

    if (preg_match($pattern, $url, $matches)) {
        array_shift($matches); // Remove full match
        $matchedParams = $paramNames ? array_combine($paramNames, $matches) : [];
        $matchedRoute = $route;
        break;
    }
}

if (!$matchedRoute) {
    echo ErrorController::notFound();
    exit;
}

$controllerClass = $matchedRoute['controller'];
$method = $matchedRoute['method'];

if (!class_exists($controllerClass) || !method_exists($controllerClass, $method)) {
    // Don't reveal internals to visitors; details go to the PHP error log
    error_log("Route misconfigured: $controllerClass::$method");
    http_response_code(500);
    echo "Erreur interne du serveur.";
    exit;
}

$controller = new $controllerClass();

// Call controller method with matched params
echo call_user_func_array([$controller, $method], $matchedParams);
