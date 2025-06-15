# GeoIPEndpoints
(*geoIPEndpoints*)

## Overview

Access IP geolocation data in various formats.

### Available Operations

* [getIp](#getip) - Get Current IP Address
* [getIpData](#getipdata) - Get Json Data from IP Address

## getIp

Get Current IP Address

### Example Usage

```php
declare(strict_types=1);

require 'vendor/autoload.php';

use geoipapi\geoipapi;

$sdk = geoipapi\GeoIp::builder()->build();



$response = $sdk->geoIPEndpoints->getIp(

);

if ($response->res !== null) {
    // handle response
}
```

### Response

**[?Operations\GetIpResponse](../../Models/Operations/GetIpResponse.md)**

### Errors

| Error Type          | Status Code         | Content Type        |
| ------------------- | ------------------- | ------------------- |
| Errors\APIException | 4XX, 5XX            | \*/\*               |

## getIpData

Get Json Data from IP Address

### Example Usage

```php
declare(strict_types=1);

require 'vendor/autoload.php';

use geoipapi\geoipapi;

$sdk = geoipapi\GeoIp::builder()->build();



$response = $sdk->geoIPEndpoints->getIpData(

);

if ($response->responseGetJsonDataJsonGet !== null) {
    // handle response
}
```

### Parameters

| Parameter          | Type               | Required           | Description        |
| ------------------ | ------------------ | ------------------ | ------------------ |
| `ipAddress`        | *?string*          | :heavy_minus_sign: | N/A                |

### Response

**[?Operations\GetIpDataResponse](../../Models/Operations/GetIpDataResponse.md)**

### Errors

| Error Type                 | Status Code                | Content Type               |
| -------------------------- | -------------------------- | -------------------------- |
| Errors\HTTPValidationError | 422                        | application/json           |
| Errors\APIException        | 4XX, 5XX                   | \*/\*                      |