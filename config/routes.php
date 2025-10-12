<?php
require_once __DIR__ . '/../config.php'; 

return [
    // Homepage
    '/' => [
        'controller' => App\Controller\HomeController::class,
        'method' => 'index',
    ],
    '/home' => [
        'controller' => App\Controller\HomeController::class,
        'method' => 'index',
    ],

    '/photography' => [
        'controller' => App\Controller\ArtController::class,
        'method' => 'photographyList',
    ],
    '/photography/{gallery}' => [
        'controller' => App\Controller\ArtController::class,
        'method' => 'showPhotographyGallery',
    ],

    // Art Direction controller (if different from ArtController)
    '/art-direction' => [
        'controller' => App\Controller\ArtDirectionController::class,
        'method' => 'index',
    ],

    // Other pages
    '/contact' => [
        'controller' => App\Controller\ContactController::class,
        'method' => 'index',
    ],
    '/exhibitions-books' => [
        'controller' => App\Controller\ExhibitionController::class,
        'method' => 'index',
    ],
];
