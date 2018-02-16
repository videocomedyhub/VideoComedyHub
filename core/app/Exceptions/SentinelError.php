<?php

namespace App\Exceptions;

/**
 * App\Exceptions\SentinelError
 * Handle Sentinel Errors
 *
 * */
class SentinelError extends Base {

    protected $message = 'Sentinel Error';  // Default Exception message
    protected $code = 800;               // Default User-defined exception code

}
