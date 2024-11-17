# WhatsApp API Integration

A robust PHP API service for sending WhatsApp messages using the Zaply API. This project provides a secure, scalable, and easy-to-use REST API for WhatsApp message integration.

## 📋 Features

- 🔒 Secure token-based authentication
- 📬 Simple REST API endpoint for sending messages
- ⚡ Built with Slim Framework for optimal performance
- 🛡️ Input validation and error handling
- 📝 Comprehensive logging
- ⚙️ Flexible configuration
- 🔍 Request rate limiting
- 🌐 CORS support

## 🚀 Getting Started

### Prerequisites

- PHP >= 7.4
- Composer
- Web server (Apache/Nginx)
- Zaply API credentials

### Installation

1. Clone the repository:
```bash
git clone https://github.com/BesrourMS/whatsapp-api-otp.git
cd whatsapp-api
```

2. Install dependencies:
```bash
composer install
```

3. Edit `.env` file with your credentials:
```env
WHATSAPP_INSTANCE_ID=your_instance_id
WHATSAPP_API_KEY=your_api_key
API_TOKEN=your_secure_api_token
```

4. Configure your web server to point to the `public` directory

### Web Server Configuration

#### Apache
The `.htaccess` file is already included in the `public` directory. Make sure `mod_rewrite` is enabled:

```apache
<IfModule mod_rewrite.c>
    RewriteEngine On
    RewriteCond %{REQUEST_FILENAME} !-f
    RewriteCond %{REQUEST_FILENAME} !-d
    RewriteRule ^ index.php [QSA,L]
</IfModule>
```

#### Nginx
Add this to your server configuration:

```nginx
location / {
    try_files $uri $uri/ /index.php?$query_string;
}
```

## 📚 API Documentation

### Send Message Endpoint

**POST** `/api/messages`

#### Headers
```
Content-Type: application/json
Authorization: Bearer your_api_token
```

#### Request Body
```json
{
    "phone_number": "21620179154",
    "message": "Hello from WhatsApp API! 🚀"
}
```

#### Success Response
```json
{
    "message_id": "3EB05EEAE4BE449A8639E3"
}
```

## 🔧 Configuration Options

### Environment Variables

| Variable | Description | Default |
|----------|-------------|---------|
| `APP_ENV` | Application environment | `production` |
| `APP_DEBUG` | Debug mode | `false` |
| `WHATSAPP_INSTANCE_ID` | Zaply instance ID | - |
| `WHATSAPP_API_KEY` | Zaply API key | - |
| `WHATSAPP_TIMEOUT` | API request timeout | `30` |
| `API_TOKEN` | API authentication token | - |
| `RATE_LIMIT_REQUESTS` | Max requests per time window | `100` |
| `RATE_LIMIT_PER_SECONDS` | Rate limit time window in seconds | `3600` |

## 📁 Project Structure

```
project-root/
├── composer.json
├── config/
│   ├── bootstrap.php
│   └── whatsapp.php
├── public/
│   ├── index.php
│   └── .htaccess
├── src/
│   ├── Controllers/
│   │   └── MessageController.php
│   ├── Middleware/
│   │   └── AuthMiddleware.php
│   └── Messaging/
│       └── WhatsAppMessenger.php
├── .env
├── .env.example
└── README.md
```

## 🔒 Security

- Never commit the `.env` file to version control
- Use strong, unique API tokens
- Keep your dependencies updated
- Enable HTTPS in production
- Implement rate limiting for production use

## 🧪 Testing

To run the tests (if implemented):
```bash
composer test
```

## 📝 Error Handling

The API uses standard HTTP status codes:
- `200`: Success
- `400`: Bad Request
- `401`: Unauthorized
- `429`: Too Many Requests
- `500`: Server Error

## 🤝 Contributing

1. Fork the repository
2. Create your feature branch: `git checkout -b feature/AmazingFeature`
3. Commit your changes: `git commit -m 'Add some AmazingFeature'`
4. Push to the branch: `git push origin feature/AmazingFeature`
5. Open a Pull Request

## 📄 License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

## 👥 Support

For support, create an issue in the repository.

## 🙏 Acknowledgments

- [Slim Framework](https://www.slimframework.com/)
- [Zaply API](https://zaply.dev/)

## 🔄 Version History

- 1.0.0
    - Initial Release
    - Basic message sending functionality
    - Authentication middleware
    - Error handling