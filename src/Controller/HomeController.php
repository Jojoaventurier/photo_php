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
                ['label' => 'Accueil', 'route' => '/'],
                ['label' => 'Galerie', 'route' => '/gallery'],
                ['label' => 'Contact', 'route' => '/contact'],
            ],
        ]);
    }
}