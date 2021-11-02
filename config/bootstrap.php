<?php
// Thanks to https://odan.github.io/2019/11/05/slim4-tutorial.html

use DI\ContainerBuilder;
use Slim\App;

require_once __DIR__ . '/../vendor/autoload.php';

$containerBuilder = new ContainerBuilder();

// Set up settings
$containerBuilder->addDefinitions(__DIR__ . '/container.php');

// Build PHP-DI Container instance
$container = $containerBuilder->build();

// Create App instance
$app = $container->get(App::class);

$app->setBasePath("/api/{version}"); // only respond to versioned /api requests https://www.slimframework.com/docs/v4/start/web-servers.html

// Register routes
(require __DIR__ . '/routes.php')($app);

// Register middleware
(require __DIR__ . '/middleware.php')($app);

return $app;
