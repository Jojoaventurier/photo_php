<?php

namespace App\Controller;

use App\Template\View;

class HomeController
{

    public function index(): string
    {
        return View::render('home', [
            'title' => 'Marianne Marić',
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
                ['label' => 'Books & Exhibitions', 'route' => '/books'],
                ['label' => 'Contact', 'route' => '/contact'],
            ],
        ]);
    }

}