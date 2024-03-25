<?php

namespace App\Exceptions;

use App\Traits\RenderToJson;
use Exception;

class MissingTeamException extends Exception
{
    use RenderToJson;

    protected $message = 'Team id is missing in the header.';
    protected $code = 400;
}
