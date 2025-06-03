<?php

namespace App\Controller;

use App\Template\View;

class HomeController
{
    public function index(): string
    {
        return View::render('home', [
            'title' => 'Welcome to the Photography Site',
        ]);
    }
}