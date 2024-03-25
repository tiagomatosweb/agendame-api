<?php

namespace App\Exceptions;

use App\Traits\RenderToJson;
use Exception;

class UserDoesntHaveRoleException extends Exception
{
    use RenderToJson;

    protected $message = 'User does not have role.';
    protected $code = 400;
}
