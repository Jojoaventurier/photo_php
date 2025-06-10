<?php
// config/routes.php
return [
    '/' => [
        'controller' => App\Controller\HomeController::class,
        'method' => 'index'
    ],
    '/gallery' => [
        'controller' => App\Controller\GalleryController::class,
        'method' => 'index'
    ],
    // '/contact' => [
    //     'controller' => App\Controller\ContactController::class,
    //     'method' => 'index'
    // ],

];