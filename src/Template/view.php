<?php

namespace App\Template;

class View
{
    /** Main navigation, shared by every page */
    public const MENU = [
        ['label' => 'Home', 'route' => '/'],
        ['label' => 'Photography', 'route' => '/photography'],
        ['label' => 'Art Direction', 'route' => '/art-direction'],
        ['label' => 'Exhibitions & Books', 'route' => '/exhibitions-books'],
        ['label' => 'Contact', 'route' => '/contact'],
    ];

    public static function render(string $template, array $params = []): string
    {
        $params += [
            'title'       => 'Marianne Marić',
            'description' => 'Marianne Marić – photographer. Analog photography, art direction, exhibitions and books.',
            'menuItems'   => self::MENU,
        ];
        extract($params);

        ob_start();
        include __DIR__ . '/../../templates/' . $template . '.php';
        $content = ob_get_clean();

        ob_start();
        include __DIR__ . '/../../templates/base.php';
        return ob_get_clean();
    }

    /** Is this menu route the current page (or a parent of it)? */
    public static function isActive(string $route): bool
    {
        $path = rtrim(parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH) ?: '/', '/') ?: '/';

        if ($route === '/') {
            return $path === '/' || $path === '/home';
        }
        return $path === $route || str_starts_with($path, $route . '/');
    }

    public static function e(?string $value): string
    {
        return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
    }
}
