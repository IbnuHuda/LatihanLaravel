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
        'client_id' => '858702770024-h7li24hvjjc650puigkhec9r6cnen6i3.apps.googleusercontent.com', 
        'client_secret' => '1b5738aHFcnaCuOS4z8MksyR',
        'redirect' => 'http://localhost:8000/auth/google/callback',
        'scopes' => ['https://www.googleapis.com/auth/userinfo.email', 'https://www.googleapis.com/auth/userinfo.profile', 'openid'],
    ],

    'facebook' => [
        'client_id' => '658753818318847', 
        'client_secret' => 'cf52bc931b81bda44c181b0d5286ad72',
        'redirect' => 'http://localhost:8000/auth/facebook/callback',
        'scopes' => ['email', 'public_profile'],        
    ],

    'github' => [
        'client_id' => '32818e3a478912ddc524', 
        'client_secret' => 'b1e6abc10589590634d1e19501ef6f19d40e6021',
        'redirect' => 'http://localhost:8000/auth/github/callback',
        'scopes' => [],
    ],

];
