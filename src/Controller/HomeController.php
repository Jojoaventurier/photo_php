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
                ['label' => 'Accueil', 'route' => '/photo_php/public/home'],
                ['label' => 'Galerie', 'route' => '/photo_php/public/gallery'],
                ['label' => 'Contact', 'route' => '/photo_php/public/contact'],
            ],
        ]);
    }
}