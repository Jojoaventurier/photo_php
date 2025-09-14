<?php

// src/Controller/ExhibitionController.php

namespace App\Controller;

use App\Template\View;

class ContactController
{
    /* --------  MENU COMMUN  -------- */
    private function getMenu(): array
    {
        return [
            ['label' => 'Home', 'route' => '/home'],
            ['label' => 'Photography', 'route' => '/photography'], // Top-level now

            // ❌ Temporarily hidden
            /*
            [
                'label' => 'Art',
                'route' => '/art',
                'children' => [
                    ['label' => 'Photography (in Art)', 'route' => '/art/photography'],
                    ['label' => 'Art Direction',        'route' => '/art/direction'],
                ],
            ],
            */

            ['label' => 'Books & Exhibitions', 'route' => '/exhibitions-books'],
            ['label' => 'Contact',             'route' => '/contact'],
        ];
    }

    public function index(): string
    {
        return View::render('contact/contact', [
            'title'     => 'Contact',
            'menuItems' => $this->getMenu(),
        ]);
    }
}