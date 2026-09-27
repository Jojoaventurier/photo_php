<?php

namespace App\Controller;

use App\Template\View;

class HomeController
{
    public function index(): string
    {
        return View::render('home', [
            'title'   => 'Marianne Marić – Photographer',
            'ogImage' => '/images/homepage.jpg',
        ]);
    }
}
