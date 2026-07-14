<?php

$env = __DIR__ . '/../.env';
session_start();

if (file_exists($env)) {
    $lines = file($env, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

    foreach ($lines as $line) {
        if (strpos(trim($line), '#') === 0) {
            continue;
        }

        list($key, $value) = explode('=', $line, 2);
        $_ENV[trim($key)] = trim($value);
    }
}

define('LOCALHOST', $_ENV['DB_HOST']);
define('DB_USERNAME', $_ENV['DB_USERNAME']);
define('DB_PASSWORD', $_ENV['DB_PASSWORD']);
define('DB_NAME', $_ENV['DB_DATABASE']);

$conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD,  DB_NAME) or die(mysqli_connect_error());
?>
