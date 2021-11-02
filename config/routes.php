<?php
// Based on https://odan.github.io/2019/11/05/slim4-tutorial.html

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\App;

return function (App $app) {
    $app->get('/', \App\Action\HelloAction::class)->setName('hello');
    $app->post('/click_bubble', \App\Action\ClickBubbleAction::class)->setName('Click Bubble');
};
