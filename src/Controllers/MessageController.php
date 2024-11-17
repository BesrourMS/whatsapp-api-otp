<?php

namespace App\Controllers;

use App\Messaging\WhatsAppMessenger;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class MessageController
{
    private WhatsAppMessenger $messenger;

    public function __construct()
    {
        $config = require __DIR__ . '/../../config/whatsapp.php';
        $this->messenger = new WhatsAppMessenger(
            $config['instance_id'],
            $config['api_key'],
            $config['timeout']
        );
    }

    public function send(Request $request, Response $response): Response
    {
        $data = $request->getParsedBody();

        // Validate request
        if (!isset($data['phone_number']) || !isset($data['message'])) {
            return $this->jsonResponse($response, [
                'success' => false,
                'error' => 'Phone number and message are required'
            ], 400);
        }

        try {
            // Send message
            $result = $this->messenger->sendMessage(
                $data['phone_number'],
                $data['message']
            );

            return $this->jsonResponse($response, [
                'success' => true,
                'data' => $result
            ]);

        } catch (\Exception $e) {
            return $this->jsonResponse($response, [
                'success' => false,
                'error' => $e->getMessage()
            ], 500);
        }
    }

    private function jsonResponse(Response $response, array $data, int $status = 200): Response
    {
        $response->getBody()->write(json_encode($data));
        return $response
            ->withHeader('Content-Type', 'application/json')
            ->withStatus($status);
    }
}