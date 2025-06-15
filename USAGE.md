<!-- Start SDK Example Usage [usage] -->
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
<!-- End SDK Example Usage [usage] -->