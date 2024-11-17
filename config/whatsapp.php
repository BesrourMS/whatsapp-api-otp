<?php

return [
    /*
    |--------------------------------------------------------------------------
    | WhatsApp API Configuration
    |--------------------------------------------------------------------------
    */

    'instance_id' => getenv('WHATSAPP_INSTANCE_ID') ?: 'your-whatsapp-instance-id',
    
    'api_key' => getenv('WHATSAPP_API_KEY') ?: 'your-whatsapp-api-key',
    
    'timeout' => getenv('WHATSAPP_TIMEOUT') ?: 30,

    /*
    |--------------------------------------------------------------------------
    | API Authentication
    |--------------------------------------------------------------------------
    |
    | List of valid API tokens that can access this service
    |
    */
    'api_tokens' => [
        getenv('API_TOKEN') ?: 'your-secure-api-token',
        // Add more tokens as needed
    ],
];