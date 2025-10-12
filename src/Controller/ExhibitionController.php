<?php

// src/Controller/ExhibitionController.php

namespace App\Controller;

use App\Template\View;

class ExhibitionController
{
    /* --------  MENU COMMUN  -------- */
private function getMenu(): array
{
    return [
        ['label' => 'Home', 'route' => '/home'],
        ['label' => 'Photography', 'route' => '/photography'],
        ['label' => 'Art Direction', 'route' => '/art-direction'],
        ['label' => 'Exhibitions & Books', 'route' => '/exhibitions-books'],
        ['label' => 'Contact', 'route' => '/contact'],
    ];
}

    public function index(): string
    {
        return View::render('exhibitions/books_exhibitions', [
            'title'     => 'Books & Exhibitions',
            'menuItems' => $this->getMenu(),
        ]);
    }
}