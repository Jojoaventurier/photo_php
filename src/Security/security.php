<?php

namespace App\Security;

class Security
{
    public static function isAuthenticated(): bool
    {
        // TODO: Implement session-based auth
        return false;
    }

    public static function requireLogin(): void
    {
        if (!self::isAuthenticated()) {
            header('Location: /login');
            exit;
        }
    }
}