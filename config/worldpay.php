<?php
return [
    'merchant_id' => env('WORLDPAY_MERCHANT_ID'),
    'service_key' => env('WORLDPAY_SERVICE_KEY'),
    'client_key' => env('WORLDPAY_CLIENT_KEY'),
    'api_url' => 'https://api.worldpay.com/v1', // Change if needed for sandbox/live
];
