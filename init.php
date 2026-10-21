<?php

include 'src/Env.php';
Env::load(__DIR__ . '/.env');

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
spl_autoload_register(function (string $className) {
    $file = __DIR__ . '/src/' . $className . '.php';
    if (file_exists($file)) {
        require_once($file);
    }
});
