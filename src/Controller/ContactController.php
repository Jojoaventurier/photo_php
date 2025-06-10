<?php

namespace App\Controller;

use App\Template\View;

class ContactController
{
    public function index(): string
    {
        return View::render('contact', [
            'title' => 'Contact',
        ]);
    }
}