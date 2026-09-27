<?php

return [
    // Homepage (/home is 301-redirected to / in public/.htaccess)
    '/' => [
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
