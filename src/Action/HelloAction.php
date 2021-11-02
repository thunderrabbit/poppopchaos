<?php

namespace App\Action;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

final class HelloAction
{
    public function __invoke(
        ServerRequestInterface $request,
        ResponseInterface $response,
        $args
    ) {
        $version = $args['version'];
        $response->getBody()->write("Hello Action! version " . $version);

        return $response;
    }
}
