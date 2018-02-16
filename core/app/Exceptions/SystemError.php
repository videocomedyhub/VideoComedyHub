<?php

namespace App\Exceptions;

/**
 * App\Exceptions\Base
 * Handle System Error
 * 
 * @source: http://php.net/manual/en/language.exceptions.php
 */
class SystemError extends Base {

    protected $message = 'System Failure';  // Default Exception message
    protected $code = 900;         // Default User-defined exception code

}
