<?php

namespace App\Action\Bubbles;

use App\Domain\Bubble\Service\BubblesGetter;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

final class GetBubblesAction
{
    private $bubblesGetter;

    public function __construct(BubblesGetter $bubblesGetter)
    {
        $this->bubblesGetter = $bubblesGetter;
    }

    public function __invoke(
        ServerRequestInterface $request,
        ResponseInterface $response
    ): ResponseInterface {
        // Collect input from the HTTP request
        $data = (array)$request->getParsedBody();

        // Invoke the Domain with inputs and retain the result
        $bubbleId = $this->bubblesGetter->getBubbles($data);

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
