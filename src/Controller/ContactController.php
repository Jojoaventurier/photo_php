<?php
// src/Controller/ContactController.php
namespace App\Controller;

use App\Template\View;

class ContactController
{
    public function index(): string
    {
        return View::render('contact/contact', [
            'title' => 'Contact – Marianne Marić',
        ]);
    }
}
