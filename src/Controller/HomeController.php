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

            // ❌ Temporarily hidden
            /*
            [
                'label' => 'Art',
                'route' => '/art',
                'children' => [
                    ['label' => 'Photography', 'route' => '/art/photography'],
                    ['label' => 'Art Direction', 'route' => '/art/direction'],
                ],
            ],
            */

            ['label' => 'Photography', 'route' => '/photography'], 
            ['label' => 'Art Direction', 'route' => '/'], 
            ['label' => 'Books & Exhibitions', 'route' => '/exhibitions-books'],
            ['label' => 'Contact', 'route' => '/contact'],
        ],
    ]);
}

    

}