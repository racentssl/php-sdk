<?php

namespace Racent\Exceptions;

use Exception;
use Symfony\Component\HttpKernel\Exception\HttpExceptionInterface;

class RacentException extends Exception implements HttpExceptionInterface
{
    /**
     * Returns the status code.
     *
     * @return int An HTTP response status code
     */
    public function getStatusCode()
    {
        return $this->getCode();
    }

    /**
     * Returns response headers.
     *
     * @return array Response headers
     */
    public function getHeaders()
    {
        return [
            'Error' => $this->getMessage(),
        ];
    }
}
