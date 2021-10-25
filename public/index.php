<?php
require __DIR__ . '/../vendor/autoload.php';

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

$app = AppFactory::create();

$app->setBasePath("/api/{version}"); // only respond to versioned /api requests https://www.slimframework.com/docs/v4/start/web-servers.html

$app->get('/', function (Request $request, Response $response, $args) {
    $version = $args['version'];
    $response->getBody()->write("Hello world! version " . $version);
    return $response;
});

$app->run();
