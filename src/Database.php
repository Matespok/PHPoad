<?php

class Database
{
    private static ?PDO $instance = null;

    private function __construct() {}

    public static function getConnection(): PDO
    {
        if (self::$instance === null) {
            $config = require __DIR__ . '/../config/database.php';

            $dsn = "mysql:host={$config['host']};dbname={$config['dbname']};charset={$config['charset']}";

            $options = [
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES   => false,
            ];
            // Errors instead of silent crashes,
            // fetch mode->fetch_assoc,
            // turned off emulate prepared statements: it tries to do it automatically and it could be bypassed.

            try {
                self::$instance = new PDO(
                    $dsn,
                    $config['user'],
                    $config['password'],
                    $options,
                );
                return self::$instance;
            } catch (\Throwable $th) {
                die("error creating a connection: " . $th);
            }
        } else {
            return self::$instance;
        }
    }
}
