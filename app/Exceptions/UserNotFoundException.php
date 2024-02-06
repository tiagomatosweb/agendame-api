<?php

namespace App\Exceptions;

use App\Traits\RenderToJson;
use Exception;

class UserNotFoundException extends Exception
{
    use RenderToJson;

    protected $message = 'User not found.';
    protected $code = 400;
}
