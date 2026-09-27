<?php
// src/Controller/ArtDirectionController.php
namespace App\Controller;
use App\Template\View;

class ArtDirectionController
{
    public function index(): string
    {
        return View::render('art-direction/index', [
            'title' => 'Art Direction – Marianne Marić',
        ]);
    }
}
