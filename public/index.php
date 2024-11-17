<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;
use App\Controllers\MessageController;
use App\Middleware\AuthMiddleware;

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../config/bootstrap.php';


// Load configuration
$config = require __DIR__ . '/../config/whatsapp.php';

// Create Slim app
$app = AppFactory::create();

// Add error middleware
$app->addErrorMiddleware(true, true, true);

// Add JSON parsing middleware
$app->addBodyParsingMiddleware();

// Add authentication middleware
$app->add(new AuthMiddleware($config['api_tokens']));

// Register routes
$app->post('/api/messages', [MessageController::class, 'send']);

// Run the app
$app->run();