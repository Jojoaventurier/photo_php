<?php

// src/Controller/ExhibitionController.php

namespace App\Controller;

use App\Template\View;

class ExhibitionController
{
    public function index(): string
    {
        return View::render('exhibitions/index', [
            'title'     => 'Books & Exhibitions',
            'menuItems' => [
                ['label' => 'Home', 'route' => '/home'],
                [
                    'label' => 'Art',
                    'route' => '/art',
                    'children' => [
                        ['label' => 'Photography', 'route' => '/art/photography'],
                        ['label' => 'Art Direction', 'route' => '/art/direction'],
                    ],
                ],
                ['label' => 'Books & Exhibitions', 'route' => '/exhibitions-books'],
                ['label' => 'Contact', 'route' => '/contact'],
            ],
        ]);
    }
}