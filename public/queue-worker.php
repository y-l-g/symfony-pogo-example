<?php

use App\Kernel;
use Symfony\Bundle\FrameworkBundle\Console\Application;
use Symfony\Component\Console\Input\ArrayInput;

if (!is_dir(__DIR__ . '/../vendor')) {
    throw new LogicException('Dependencies are missing. Try running "composer install".');
}

if (!is_file(__DIR__ . '/../vendor/autoload_runtime.php')) {
    throw new LogicException('Symfony Runtime is missing. Try running "composer require symfony/runtime".');
}

require_once __DIR__ . '/../vendor/autoload_runtime.php';

return function (array $context) {
    $kernel = new Kernel($context['APP_ENV'], (bool) $context['APP_DEBUG']);

    $app = new Application($kernel);

    // Set the default command to consume messages
    $app->setDefaultCommand('messenger:consume', true);

    $input = new ArrayInput([
        'receivers' => ['pogo'],
        '--limit' => 1000,
        '--time-limit' => 3600
    ]);

    $app->run($input);

    return $app;
};