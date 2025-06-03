<?php

namespace App\Template;

class View
{
    public static function render(string $template, array $params = []): string
    {
        extract($params);
        ob_start();
        include __DIR__ . '/../../templates/' . $template . '.php';
        $content = ob_get_clean();

        ob_start();
        include __DIR__ . '/../../templates/base.php';
        return ob_get_clean();
    }
}