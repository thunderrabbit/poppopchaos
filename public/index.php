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
    // print_r($bubble_data["entry"]."\n\n");
    // print_r("\n\n");
    $bubble_array = json_decode($bubble_data["entry"]);
    // print_r($bubble_array);
    // print_r("\n\n");
    // print_r($bubble_array->radius."\n\n");
    $bubble_array->radius = 101;    // just try anything visible
    // $bubble_data["dogma"] = $bubble_data_event;
    // $bubble_data["radius"] = 50;
    // print_r($bubble_array->radius."\n"."\n");
    // print_r($bubble_array);
    // print_r("\n\n");
    $payload = json_encode($bubble_array);
    // print_r($payload."\n"."\n"); exit;
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
