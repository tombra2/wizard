<?php

use Symfony\Component\Dotenv\Dotenv;

require dirname(__DIR__).'/vendor/autoload.php';

// .env laden (inkl. .env.test falls vorhanden)
if (method_exists(Dotenv::class, 'bootEnv')) {
    (new Dotenv())->bootEnv(dirname(__DIR__).'/.env');
}

$_SERVER['APP_DEBUG'] = $_SERVER['APP_DEBUG'] ?? true;

if ($_SERVER['APP_DEBUG']) {
    umask(0000);
}
