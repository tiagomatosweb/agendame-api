<?php

namespace App\Exceptions;

use App\Traits\RenderToJson;
use Exception;

class UserHasBeenTakenException extends Exception
{
    use RenderToJson;

    protected $message = 'This user has been taken.';
    protected $code = 400;
}
