<?php

/**
 * This file is part of HttpClient Package,
 * a Simple Http Client Package Built on Top of Guzzle.
 *
 * @license MIT
 * @package HttpHelper
 * @author Mustafa Ahmed
 */

return [
    /*
    |--------------------------------------------------------------------------
    | Verify SSL
    |--------------------------------------------------------------------------
    |
    | If true then it will Use the system's CA bundle.
    | If false it will disable ssl validation entirely.
    |
    */
    'verify_ssl' => env('VERIFY_SSL', false),

    /*
    |--------------------------------------------------------------------------
    | Connect Timeout
    |--------------------------------------------------------------------------
    |
    | Specify timeout in seconds if the client fails to connect to the server.
    |
    */
    'connect_timeout' =>  env('CONNECT_TIMEOUT', '10'),

];
