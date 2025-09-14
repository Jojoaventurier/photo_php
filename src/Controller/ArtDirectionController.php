<?php
// src/Controller/ArtDirectionController.php
namespace App\Controller;
use App\Template\View;

class ArtDirectionController
{
    /* --------  MENU COMMUN  -------- */
    private function getMenu(): array
    {
        return [
            ['label' => 'Home', 'route' => '/home'],
            ['label' => 'Photography', 'route' => '/photography'],
            ['label' => 'Art Direction', 'route' => '/art-direction'],
            ['label' => 'Books & Exhibitions', 'route' => '/exhibitions-books'],
            ['label' => 'Contact', 'route' => '/contact'],
        ];
    }

    public function index(): string
    {
        return View::render('art-direction/index', [
            'title' => 'Art Direction - Marianne Marić',
            'menuItems' => $this->getMenu(),
        ]);
    }
}