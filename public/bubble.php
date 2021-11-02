<?php
THIS WAS public/index.php but I plan to not use it except as a reference
I plan instead to follow https://odan.github.io/2019/11/05/slim4-tutorial.html
and split the code below into a more modern directory structure

require __DIR__ . '/../vendor/autoload.php';

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

$app = AppFactory::create();

$app->setBasePath("/api/{version}"); // only respond to versioned /api requests https://www.slimframework.com/docs/v4/start/web-servers.html

$app->get('/click_bubble', function (Request $request, Response $response, $args) {
    $version = $args['version'];
    $response->getBody()->write("Bubble Clicked! version " . $version);
    $response->getBody()->write("<p>Use POST with bubble attached.");
    return $response;
});

$app->post('/click_bubble', function (Request $request, Response $response, $args) {
    $version = $args['version'];
    // We must json encode the return_data https://www.slimframework.com/docs/v4/objects/response.html#returning-json
    $return_data = array();
    $bubble_data = $request->getParsedBody();
    $bubble_array = json_decode($bubble_data["entry"]);
    $bubble_array->radius = $bubble_array->radius + 1;   // MUST check DB otherwise can be hacked from frontend
    $payload = json_encode($bubble_array);
    $response->getBody()->write($payload);
    return $response
              ->withHeader('Content-Type', 'application/json');
});

/**
 * https://www.slimframework.com/docs/v4/start/upgrade.html#new-error-handling-middleware
 * Add Error Handling Middleware
 *
 * @param bool $displayErrorDetails -> Should be set to false in production
 * @param bool $logErrors -> Parameter is passed to the default ErrorHandler
 * @param bool $logErrorDetails -> Display error details in error log
 * which can be replaced by a callable of your choice.

 * Note: This middleware should be added last. It will not handle any exceptions/errors
 * for middleware added after it.
 */
$app->addErrorMiddleware(false, true, true);

$app->run();
