<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, SparkPost and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => 'us-east-1',
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],

    'paypal' => [
    'client_id' => 'AfHl2JfJHDAVI0SCLh6_3_sCML-nwH5CgNtElf-dwYD44ywCh96G6f93p-KsGm9i-kpnggC_XE-HEgOq',
    'secret' => 'EGGmPddcW5qFjdq9JJYHxds3sVoCLdShTuxZeU301AwRxc2t_Uu7_-U5ve7WmIizG03VdEczxD96K06S'
    ],

];
