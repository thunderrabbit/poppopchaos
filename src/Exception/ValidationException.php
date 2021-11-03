<?php

namespace App\Exception;

use RuntimeException;
use Throwable;

/*
  To validate the client's input we have to check the data and collect all errors
  into an array of errors. This pattern is called notification pattern.
  https://martinfowler.com/articles/replaceThrowWithNotification.html
*/
final class ValidationException extends RuntimeException
{
    private $errors;

    public function __construct(
        string $message,
        array $errors = [],
        int $code = 422,
        Throwable $previous = null
    ){
        parent::__construct($message, $code, $previous);

        $this->errors = $errors;
    }

    public function getErrors(): array
    {
        return $this->errors;
    }
}
