<?php
// Based on https://odan.github.io/2019/11/05/slim4-tutorial.html

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\App;

return function (App $app) {
    $app->get('/', \App\Action\HelloAction::class)->setName('hello');
    $app->get('/get_bubbles/', \App\Action\Bubbles\GetBubblesAction::class)->setName('what is this name anyway');
    $app->post('/users', \App\Action\UserCreateAction::class);
    $app->post('/bubbles', \App\Action\BubbleCreateAction::class);
    $app->post('/click_bubble', \App\Action\ClickBubbleAction::class)->setName('Click Bubble');
};
