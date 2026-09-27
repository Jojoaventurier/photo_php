<?php
// src/Controller/ExhibitionController.php
namespace App\Controller;

use App\Template\View;

class ExhibitionController
{
    public function index(): string
    {
        return View::render('exhibitions/books_exhibitions', [
            'title' => 'Exhibitions & Books – Marianne Marić',
        ]);
    }
}
