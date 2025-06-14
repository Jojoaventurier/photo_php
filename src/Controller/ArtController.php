<?php
namespace App\Controller;

use App\Template\View;

class ArtController
{
    public function index(): string
    {
        return View::render('art/index', [
            'title' => 'Art',
        ]);
    }

    public function photography(): string
    {
        return View::render('art/photography', [
            'title' => 'Photography',
        ]);
    }

    public function direction(): string
    {
        return View::render('art/direction', [
            'title' => 'Art Direction',
        ]);
    }
}