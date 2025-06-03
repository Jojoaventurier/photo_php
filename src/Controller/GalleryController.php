<?php

namespace App\Controller;

use App\Template\View;

class GalleryController
{
    public function index(): string
    {
        $photos = glob(__DIR__ . '/../../public/images/*.jpg');

        return View::render('gallery', [
            'title' => 'Gallery',
            'photos' => $photos
        ]);
    }
}