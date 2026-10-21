<?php

class Env
{
    public static function load(string $filePath): void
    {

        if (!file_exists($filePath)) {
            throw new Exception(".env file does not exist in path :\"{$filePath}\"");
        }
        $data = parse_ini_file($filePath, false, INI_SCANNER_RAW);
        if ($data === false) {
            throw new Exception("Failed processing .Env file" . $filePath);
        }
        foreach ($data as $key => $value) {
            $_ENV[$key] = $value;
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
