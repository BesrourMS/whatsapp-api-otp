<?php

use Dotenv\Dotenv;

// Load Composer's autoloader
require_once __DIR__ . '/../vendor/autoload.php';

// Load environment variables
$dotenv = Dotenv::createImmutable(__DIR__ . '/..');
$dotenv->load();

// Required environment variables
$dotenv->required([
    'WHATSAPP_INSTANCE_ID',
    'WHATSAPP_API_KEY',
    'API_TOKEN'
]);

// Optional variables with defaults
$dotenv->ifPresent('WHATSAPP_TIMEOUT')->isInteger();
$dotenv->ifPresent('APP_DEBUG')->isBoolean();
$dotenv->ifPresent('RATE_LIMIT_REQUESTS')->isInteger();
$dotenv->ifPresent('RATE_LIMIT_PER_SECONDS')->isInteger();