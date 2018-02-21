<?php

require __DIR__ . '/vendor/autoload.php';

try {
    $dotenv = new Dotenv\Dotenv(__DIR__);
    $dotenv->load();
} catch (\Exception $e) {
    // pass
}

use Symfony\Component\Console\Application;
use Example\PhpMySQLReplication;

$application = new Application();
$application->add(new PhpMySQLReplication());
$application->run();
