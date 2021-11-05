<?php

namespace App\Domain\Bubble\Service;

use App\Domain\Bubble\Repository\BubblesGetterRepository;

/**
 * Service.
 */
final class BubblesGetter
{
    /**
     * @var BubblesGetterRepository
     */
    private $repository;

    /**
     * The constructor.
     *
     * @param BubblesGetterRepository $repository
     *         We have declared the BubblesGetterRepository as a dependency,
     *         because the service can only interact with the database through the repository.
     */
    public function __construct(BubblesGetterRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Get bubbles for initial screen display
     *
     * Possible future param int Which level of bubbles to get, but maybe each level should be a separate function
     *
     * @return array List of bubbles
     */
    public function getBubbles(): array
    {
        // Get bubbles
        $array_of_bubbles = $this->repository->getBubbles();

        // Logging here: Bubble created successfully
        // UNDEFINED: $this->logger->info(sprintf('Bubbles gotten: %s', $array_of_bubbles));  // might break because %s vs array

        return $array_of_bubbles;
    }

}
