<?php

return [
    // Set your Merchant ID
    'mercant_id' => env('MIDTRANS_MERCHAT_ID'),

    // Set your Client Key
    'client_key' => env('MIDTRANS_CLIENT_KEY'),

    // Set your Merchant Server Key
    'server_key' => env('MIDTRANS_SERVER_KEY'),

    // Set to Development/Sandbox Environment (default). 
    // Set to true for Production Environment (accept real transaction).
    'is_production' => false,

    // Set sanitization on (default)
    'is_sanitized' => true,

    // Set 3DS transaction for credit card to true
    'is_3ds' => true,
];