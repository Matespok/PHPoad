<?php

class Env
{
    public static function fileExists(): void
    {

        $filePath = "../.env";

        if (!file_exists($filePath)) {
            throw new Exception(".env file does not exist in path :\"{$filePath}\"");
        } else {
            die("file doesn't exist");
        }
    }

    public static function get(string $key, mixed $default = null): mixed
    {

        $value = $_ENV[$key] ?? $default;

        return match (strtolower((string) $value)) {
            'true' => true,
            'false' => false,
            default => $value,
        };
    }
}
/*
$servername = '127.0.0.1';
$username = 'username';
$password = 'UserPass';
$dbname = 'mysqlPHPtoad';

*/
