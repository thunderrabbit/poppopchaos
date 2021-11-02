<?php
// Based on https://odan.github.io/2019/11/05/slim4-tutorial.html

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\App;

return function (App $app) {
    $app->get('/', function (
        ServerRequestInterface $request,
        ResponseInterface $response,
        $args
    ) {
        $version = $args['version'];
        $response->getBody()->write("Hello world! version " . $version);

        return $response;
    });
};
