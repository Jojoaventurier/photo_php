<?php

namespace App\Database;

use PDO;
use PDOException;

class Database
{
    private static ?PDO $pdo = null;

    public static function getConnection(): PDO
    {
        if (self::$pdo === null) {
            $host = 'localhost';
            $dbname = 'photography';
            $user = 'your_db_user';
            $pass = 'your_db_password';
            $charset = 'utf8mb4';

            $dsn = "mysql:host=$host;dbname=$dbname;charset=$charset";

            try {
                self::$pdo = new PDO($dsn, $user, $pass, [
                    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                    PDO::ATTR_EMULATE_PREPARES   => false,
                ]);
            } catch (PDOException $e) {
                // You can log this and show a user-friendly message instead
                throw new \RuntimeException("Database connection failed: " . $e->getMessage());
            }
        }

        return self::$pdo;
    }
}