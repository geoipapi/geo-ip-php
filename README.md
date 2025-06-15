

<div align="center">

  <h1> 🌍 GeoIP PHP SDK</h1>
  
  <p><strong>Developer-friendly & type-safe PHP SDK for enterprise IP geolocation services</strong></p>
  
  <div>
    <a href="https://opensource.org/licenses/MIT">
      <img src="https://img.shields.io/badge/License-MIT-blue.svg" alt="MIT License" />
    </a>
    <img src="https://img.shields.io/badge/PHP-%3E%3D8.0-777BB4.svg" alt="PHP Version" />
    <img src="https://img.shields.io/badge/Composer-2.0%2B-orange.svg" alt="Composer" />
    <img src="https://img.shields.io/badge/Status-Beta-yellow.svg" alt="Development Status" />
  </div>
</div>

---

## 📖 Table of Contents

- [🌍 GeoIP PHP SDK](#-geoip-php-sdk)
  - [📖 Table of Contents](#-table-of-contents)
  - [🚀 Overview](#-overview)
  - [✨ Key Features](#-key-features)
  - [📦 Installation](#-installation)
  - [🔧 Quick Start](#-quick-start)
  - [📚 Usage Examples](#-usage-examples)
  - [🏗️ Project Structure](#️-project-structure)
  - [⚙️ Configuration](#️-configuration)
  - [🧪 Testing](#-testing)
  - [🔄 Available Resources and Operations](#-available-resources-and-operations)
  - [❌ Error Handling](#-error-handling)
  - [🌐 Server Configuration](#-server-configuration)
  - [🤝 Contributing](#-contributing)
  - [📄 License](#-license)
  - [🙏 Credits](#-credits)

---

## 🚀 Overview

The **GeoIP PHP SDK** is a high-performance, enterprise-grade library that provides real-time IP geolocation data for web applications. Built with modern PHP practices, this SDK offers type-safe interfaces and comprehensive error handling for seamless integration into your projects.

Perfect for applications requiring IP-based personalization, analytics, security monitoring, and geographic content delivery. The SDK supports multiple output formats including JSON, JSONP, XML, and YAML.

## ✨ Key Features

- 🔒 **Type-safe** - Full TypeScript-style type safety for PHP
- ⚡ **High Performance** - Optimized for enterprise-scale applications
- 🌐 **Multiple Formats** - JSON, JSONP, XML, and YAML support
- 🛡️ **Error Handling** - Comprehensive exception management
- 📦 **Composer Ready** - Easy installation via Composer
- 🔧 **Configurable** - Flexible server and endpoint configuration
- 📊 **Real-time Data** - Live IP geolocation information
- 🏢 **Enterprise Grade** - Built for production environments

## 📦 Installation

### Prerequisites

- PHP 8.0 or higher
- Composer 2.0+
- cURL extension enabled

### Install via Composer

Add the following to your `composer.json` file:

```json
{
    "repositories": [
        {
            "type": "github",
            "url": "https://github.com/geoip/geo-ip-php.git"
        }
    ],
    "require": {
        "geoipapi/sdk": "*"
    }
}
```

Then run:

```bash
composer install
```

Alternatively, install directly:

```bash
composer require geoipapi/sdk
```

## 🔧 Quick Start

Get up and running in under 2 minutes:

```php
<?php
declare(strict_types=1);

require 'vendor/autoload.php';

use geoipapi\geoipapi\GeoIp;

// Initialize the SDK
$sdk = GeoIp::builder()->build();

// Get current IP information
$response = $sdk->geoIPEndpoints->getIp();

if ($response->res !== null) {
    echo "Your IP: " . $response->res->ip . "\n";
    echo "Country: " . $response->res->country . "\n";
    echo "City: " . $response->res->city . "\n";
}
```

## 📚 Usage Examples

### Get Current IP Address

```php
$response = $sdk->geoIPEndpoints->getIp();

if ($response->res !== null) {
    $ipData = $response->res;
    echo "IP: {$ipData->ip}\n";
    echo "Country: {$ipData->country}\n";
    echo "Region: {$ipData->region}\n";
    echo "City: {$ipData->city}\n";
    echo "Timezone: {$ipData->timezone}\n";
}
```

### Get Specific IP Information

```php
try {
    $response = $sdk->geoIPEndpoints->getIpData([
        'ip' => '8.8.8.8',
        'format' => 'json'
    ]);
    
    if ($response->responseGetJsonDataJsonGet !== null) {
        $data = $response->responseGetJsonDataJsonGet;
        // Process geolocation data
    }
} catch (Errors\HTTPValidationErrorThrowable $e) {
    echo "Validation error: " . $e->getMessage();
} catch (Errors\APIException $e) {
    echo "API error: " . $e->getMessage();
}
```

### Custom Server Configuration

```php
$sdk = GeoIp::builder()
    ->setServerURL('https://api.geoipapi.com')
    ->build();
```

## 🏗️ Project Structure

```
geo-ip-php/
├── src/                    # Source code
│   ├── Models/            # Data models and DTOs
│   ├── Endpoints/         # API endpoint classes
│   ├── Errors/           # Exception classes
│   └── GeoIp.php         # Main SDK class
├── docs/                  # Documentation
│   └── sdks/             # SDK-specific docs
├── tests/                # Test suite
├── composer.json         # Composer configuration
├── LICENSE              # MIT License
└── README.md           # This file
```

### Key Components

- **`src/GeoIp.php`** - Main SDK entry point and builder
- **`src/Endpoints/`** - Contains all API endpoint implementations
- **`src/Models/`** - Data transfer objects and response models
- **`src/Errors/`** - Custom exception classes for error handling
- **`docs/`** - Comprehensive API documentation

## ⚙️ Configuration

### Environment Variables

```bash
# Optional: Custom API endpoint
GEOIP_API_URL=https://api.geoipapi.com

# Optional: Request timeout (seconds)
GEOIP_TIMEOUT=30

# Optional: Enable debug mode
GEOIP_DEBUG=false
```

### SDK Configuration Options

```php
$sdk = GeoIp::builder()
    ->setServerURL('https://custom-api.example.com')
    ->setTimeout(60)
    ->setDebugMode(true)
    ->build();
```

## 🧪 Testing

Run the test suite to ensure everything works correctly:

```bash
# Run all tests
composer test

# Run tests with coverage
composer test:coverage

# Run specific test file
vendor/bin/phpunit tests/Unit/GeoIpTest.php

# Run integration tests
composer test:integration
```

### Test Categories

- **Unit Tests** - Test individual components in isolation
- **Integration Tests** - Test API interactions and data flow
- **End-to-End Tests** - Test complete user workflows

## 🔄 Available Resources and Operations

### GeoIP Endpoints

| Method | Description | Parameters |
|--------|-------------|------------|
| `getIp()` | Get current IP address information | None |
| `getIpData(array $params)` | Get geolocation data for specific IP | `ip`, `format` |

### Response Formats

- **JSON** (default) - Structured data format
- **JSONP** - JSON with padding for cross-domain requests
- **XML** - Extensible markup language format
- **YAML** - Human-readable data serialization

For detailed API documentation, see [docs/sdks/geoipendpoints/README.md](docs/sdks/geoipendpoints/README.md).

## ❌ Error Handling

The SDK provides comprehensive error handling with specific exception types:

### Exception Types

| Exception | Status Code | Description |
|-----------|-------------|-------------|
| `APIException` | 4XX, 5XX | General API errors |
| `HTTPValidationError` | 422 | Request validation failures |
| `NetworkException` | N/A | Network connectivity issues |

### Error Handling Example

```php
use geoipapi\geoipapi\Models\Errors;

try {
    $response = $sdk->geoIPEndpoints->getIpData(['ip' => 'invalid-ip']);
} catch (Errors\HTTPValidationErrorThrowable $e) {
    // Handle validation errors
    error_log("Validation failed: " . $e->getMessage());
} catch (Errors\APIException $e) {
    // Handle API errors
    error_log("API error: " . $e->getMessage());
    error_log("Status code: " . $e->statusCode);
} catch (Exception $e) {
    // Handle unexpected errors
    error_log("Unexpected error: " . $e->getMessage());
}
```

## 🌐 Server Configuration

### Default Server

The SDK uses `https://api.geoipapi.com` as the default server endpoint.

### Custom Server

Override the default server globally:

```php
$sdk = GeoIp::builder()
    ->setServerURL('https://your-custom-api.com')
    ->build();
```

## 🤝 Contributing

We welcome contributions! Here's how to get started:

### Development Setup

1. **Fork and clone** the repository
2. **Install dependencies**: `composer install`
3. **Run tests**: `composer test`
4. **Create a feature branch**: `git checkout -b feature/amazing-feature`

### Code Standards

- Follow **PSR-12** coding standards
- Write **comprehensive tests** for new features
- Update **documentation** for API changes
- Use **type declarations** throughout

### Pull Request Process

1. Ensure all tests pass
2. Update documentation if needed
3. Add entries to CHANGELOG.md
4. Submit PR with clear description

### Development Commands

```bash
# Install dependencies
composer install

# Run code style checks
composer lint

# Fix code style issues
composer lint:fix

# Run static analysis
composer analyze

# Generate documentation
composer docs:generate
```

## 📄 License

This project is licensed under the **MIT License** - see the [LICENSE](LICENSE) file for details.

## 🙏 Credits

### Built With

- **PHP 8.0+** - Modern PHP features and performance
- **Composer** - Dependency management
- **PSR Standards** - PHP Standards Recommendations
- **PHPUnit** - Testing framework

### Acknowledgements

- Thanks to all contributors who help improve this SDK
- GeoIP data providers for accurate location information
- The PHP community for excellent tooling and standards

---

<div align="center">
  <p><strong>Ready to get started?</strong> ⭐ Star this repo and try the SDK today!</p>
  
  <p>
    <a href="https://github.com/geoip/geo-ip-php/issues">Report Bug</a> •
    <a href="https://github.com/geoip/geo-ip-php/issues">Request Feature</a> •
    <a href="https://github.com/geoip/geo-ip-php/discussions">Discussions</a>
  </p>
</div>
