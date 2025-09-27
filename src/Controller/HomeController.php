<?php

namespace App\Controller;

use App\Template\View;

class HomeController
{
    public function index(): string
    {
        return View::render('home', [
            'title' => 'Marianne Marić',
            'menuItems' => $this->getMenu(),
        ]);
    }

    /**
     * Build the navigation menu
     */
    private function getMenu(): array
    {
        return [
            ['label' => 'Home', 'route' => '/'], // ✅ use "/" for homepage
            ['label' => 'Photography', 'route' => '/photography'],
            ['label' => 'Art Direction', 'route' => '/art-direction'],
            ['label' => 'Exhibitions & Books', 'route' => '/exhibitions-books'],
            ['label' => 'Contact', 'route' => '/contact'],
        ];
    }
}