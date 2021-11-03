<?php

namespace App\Domain\Bubble\Service;

use App\Domain\Bubble\Repository\BubbleCreatorRepository;
use App\Exception\ValidationException;

/**
 * Service.
 */
final class BubbleCreator
{
    /**
     * @var BubbleCreatorRepository
     */
    private $repository;

    /**
     * The constructor.
     *
     * @param BubbleCreatorRepository $repository
     *         We have declared the BubbleCreatorRepository as a dependency,
     *         because the service can only interact with the database through the repository.
     */
    public function __construct(BubbleCreatorRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Create a new bubble.
     *
     * @param array $data The form data
     *
     * @return int The new bubble ID
     */
    public function createBubble(array $data): int
    {
        // Input validation
        $this->validateNewBubble($data);

        // Insert bubble
        $bubbleId = $this->repository->insertBubble($data);

        // Logging here: Bubble created successfully
        //$this->logger->info(sprintf('Bubble created successfully: %s', $bubbleId));

        return $bubbleId;
    }

    /**
     * Input validation.
     *
     * @param array $data The form data
     *
     * @throws ValidationException
     *
     * @return void
     */
    private function validateNewBubble(array $data): void
    {
        $errors = [];

        // Here you can also use your preferred validation library

        if (empty($data['bubblename'])) {
            $errors['bubblename'] = 'Input required';
        }

        if (empty($data['email'])) {
            $errors['email'] = 'Input required';
        } elseif (filter_var($data['email'], FILTER_VALIDATE_EMAIL) === false) {
            $errors['email'] = 'Invalid email address';
        }

        if ($errors) {
            throw new ValidationException('Please check your input', $errors);
        }
    }
}
