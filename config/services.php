<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => env('SES_REGION'),
    ],
    'facebook' => [
        'client_id' => '695164261305541',
        'client_secret' => 'b775ee1fbdbd5b8dc42bc234a16ff312',
        'redirect' => 'http://localhost:8000/callback/facebook',
    ],
    'google' => [
        'client_id' => 'xxxx',
        'client_secret' => 'xxx',
        'redirect' => 'http://127.0.0.1:8000/callback/google',
      ],

];
