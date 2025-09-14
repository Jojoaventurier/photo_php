<?php
// config/routes.php

return [
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
        'method' => 'photographyList',
    ],
    '/art/photography/{gallery}' => [
        'controller' => App\Controller\ArtController::class,
        'method' => 'showPhotographyGallery',
    ],

    '/photography' => [
        'controller' => App\Controller\ArtController::class,
        'method' => 'photographyList',
    ],
    '/photography/{gallery}' => [
        'controller' => App\Controller\ArtController::class,
        'method' => 'showPhotographyGallery',
    ],

    '/art/direction' => [
        'controller' => App\Controller\ArtController::class,
        'method' => 'direction',
    ],
    '/contact' => [
        'controller' => App\Controller\ContactController::class,
        'method' => 'index',
    ],
    '/exhibitions-books' => [
        'controller' => App\Controller\ExhibitionController::class,
        'method' => 'index',
    ],
];