<?php
namespace App\Controller;

use App\Template\View;

class ErrorController
{
    public static function notFound(): string
    {
        http_response_code(404);
        return View::render('error/404', [
            'title' => 'Page introuvable – Marianne Marić',
        ]);
    }
}
