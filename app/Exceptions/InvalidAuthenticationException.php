<?php

namespace App\Exceptions;

use Exception;

class InvalidAuthenticationException extends Exception
{
    protected $message = 'Your credentials don\'t match.';

    public function render()
    {
        return response()->json([
            'error' => class_basename($this),
            'message' => $this->getMessage(),
        ], 400);
    }
}
