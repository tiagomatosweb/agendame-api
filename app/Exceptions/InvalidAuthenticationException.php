<?php

namespace App\Exceptions;

use App\Traits\RenderToJson;
use Exception;

class InvalidAuthenticationException extends Exception
{
    use RenderToJson;

    protected $message = 'Your credentials don\'t match.';
    protected $code = 400;
}
