<?php

namespace App\Action;

use App\Domain\Bubble\Service\BubbleCreator;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

final class BubbleCreateAction
{
    private $bubbleCreator;

    public function __construct(BubbleCreator $bubbleCreator)
    {
        $this->bubbleCreator = $bubbleCreator;
    }

    public function __invoke(
        ServerRequestInterface $request,
        ResponseInterface $response
    ): ResponseInterface {
        // Collect input from the HTTP request
        $data = (array)$request->getParsedBody();

        // Invoke the Domain with inputs and retain the result
        $bubbleId = $this->bubbleCreator->createBubble($data);

        // Transform the result into the JSON representation
        $result = [
            'bubble_id' => $bubbleId
        ];

        // Build the HTTP response
        $response->getBody()->write((string)json_encode($result));

        return $response
            ->withHeader('Content-Type', 'application/json')
            ->withStatus(201);
    }
}
