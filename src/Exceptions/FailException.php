<?php

namespace Jamasad\Crypt\Exceptions;

use Exception;
use Throwable;

/**
 * Class FailException
 */
class FailException extends Exception
{
    /**
     * @param string $message
     * @param int $code
     * @param Throwable|null $previous
     */
    public function __construct(string $message = "", int $code = 0, ?Throwable $previous = null)
    {
        parent::__construct(base64_decode($message), $code, $previous);
    }
}