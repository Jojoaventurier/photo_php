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
                ['label' => 'Home', 'route' => '/photo_php/public/home'],
                [
                    'label' => 'Art',
                    'route' => '/photo_php/public/art',
                    'children' => [
                        ['label' => 'Photography', 'route' => '/photo_php/public/art/photography'],
                        ['label' => 'Art Direction', 'route' => '/photo_php/public/art/direction'],
                    ],
                ],
                ['label' => 'Books & Exhibitions', 'route' => '/photo_php/public/books'],
                ['label' => 'Contact', 'route' => '/photo_php/public/contact'],
            ],
        ]);
    }

}