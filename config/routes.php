<?php
// config/routes.php

return [
    '/' => [
        'controller' => App\Controller\HomeController::class,
        'method' => 'index',
    ],
    '/home' => [
        'controller' => App\Controller\HomeController::class,
        'method' => 'index',
    ],
    '/art' => [
        'controller' => App\Controller\ArtController::class,
        'method' => 'index',
    ],
    '/art/photography' => [
        'controller' => App\Controller\ArtController::class,
        'method' => 'photography',
    ],
    '/art/{gallery}' => [
    'controller' => App\Controller\ArtController::class,
    'method'     => 'showGallery',   // reçoit $params['gallery']
    ],
    '/art/direction' => [
        'controller' => App\Controller\ArtController::class,
        'method' => 'direction',
    ],
    // '/books' => [
    //     'controller' => App\Controller\BookController::class,
    //     'method' => 'index',
    // ],
    '/contact' => [
        'controller' => App\Controller\ContactController::class,
        'method' => 'index',
    ],
];