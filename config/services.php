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
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'google' => [
        'client_id' => '551496269488-rs0m042e7nufc77tfb5cqsbvlcdgcsru.apps.googleusercontent.com',
        'client_secret' => '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',
        'redirect' => 'http://127.0.0.1:8000/callback/google',
    ],

    'github' => [
        'client_id' => '7413611ec20fc6527a8c',
        'client_secret' => 'c4b421c25735c4e1bc4b44bf65c03cb4331f0af2',
        'redirect' => 'http://127.0.0.1:8000/callback/github',
    ],
];
