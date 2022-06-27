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
    /*
    |--------------------------------------------------------------------------
    | SAP SERVICE CONFIGURATION
    |--------------------------------------------------------------------------
    |
    | This settings determines environment and parameters to use for
    | service information.
    | 
    |
    */

    'sap' => [
        'environment' => env('SAP_ENVIRONMENT'),
        'url_local' => env('SAP_URL_SERVICE_LOCAL'),
        'username_local' => env('SAP_SERVICE_USERNAME_LOCAL'),
        'password_local' => env('SAP_SERVICE_PASSWORD_LOCAL'),
        'url' => env('SAP_URL_SERVICE'),
        'username' => env('SAP_SERVICE_USERNAME'),
        'password' => env('SAP_SERVICE_PASSWORD'),
    ],

    /*
    |--------------------------------------------------------------------------
    | Token Security
    |--------------------------------------------------------------------------
    |
    | This settings determines login and token validation.
    |
    | 
    |
    */
    'security' => [
        'url' => env('APPS_CAMPESTRE_URL')
    ]

];
